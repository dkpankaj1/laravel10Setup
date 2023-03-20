<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UsersController extends BaseController
{
    protected $prevent_superUser = ['super admin'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alluser = User::all();

        $users = [];
        foreach ($alluser as $user) {
            $record = new User();
            $record->id = $user->id;
            $record->name = $user->name;
            $record->email = $user->email;
            $record->login_enable = $user->login_enable;
            $record->role = $user->getRoleNames()[0];

            array_push($users, $record);
        }
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'super admin')->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()],
            'role'          => ['required', Rule::notIn($this->prevent_superUser)],
            'login_enable'  => ['required', 'integer', 'digits_between: 0,1'],
        ]);


        try {
            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'login_enable'  => $request->login_enable,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ]);
            $user->assignRole($request->role);

            return Redirect::route('users.index')->with($this->sendWithSuccess('Users Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'super admin')->get();
        $user->role = $user->getRoleNames()[0];
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role'          => ['required'],
            'login_enable'  => ['required', 'integer', 'digits_between: 0,1'],
        ]);


        try {
            $user->update([
                'name'          => $request->name ?? $user->name,
                'email'         => $request->email ?? $user->email,
                'login_enable'  => $request->login_enable ?? $user->login_enable
            ]);

            $user->syncRoles($request->role);

            return Redirect::route('users.index')->with($this->sendWithSuccess('Users Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user): View
    {
        return view('users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return Redirect::back()->with($this->sendWithSuccess('Users Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}

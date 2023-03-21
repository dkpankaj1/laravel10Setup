<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsController extends BaseController
{
    // List Roles
    public function listRole(): View
    {
        $this->checkAuthorizetion('roles.show');
        
        // $roleList = Role::all();
        $roleList = Role::withCount('users')->get();
        return view('roles.list', ['roles' => $roleList]);
    }

    // Create Role
    public function createRole(): View
    {
         $this->checkAuthorizetion('roles.create');
        return view('roles.create');
    }

    // Store Role
    public function storeRole(Request $request): RedirectResponse
    {
         $this->checkAuthorizetion('roles.create');

        $validated = $request->validate([
            'name'          => ["required", "unique:roles,name"],
            'description'   => "required",
            'permission'    => 'nullable|array'
        ]);

        try {
            $role = Role::create($validated);
            $role->syncPermissions((array) $validated['permission']);
            return Redirect::route('roles.index')->with($this->sendWithSuccess('Role Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    // Edit Role
    public function editRole(Role $role): View
    {
         $this->checkAuthorizetion('roles.edit');

        $hasPermission = [];
        foreach ($role->permissions as $permission)
            $hasPermission[] = $permission->name;

        return view('roles.edit', compact('role', 'hasPermission'));
    }

    // Update Role
    public function updateRole(Request $request, Role $role): RedirectResponse
    {
        $this->checkAuthorizetion('roles.edit');

        $validated = $request->validate([
            'name'          => ["required", 'unique:roles,name,' . $role->id],
            'description'   => "required",
            'permission'    => 'nullable|array'
        ]);

        try {
            $role->update($validated);
            $role->syncPermissions((array) $validated['permission']);
            return Redirect::route('roles.index')->with($this->sendWithSuccess('Role Update Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    // delete Role
    public function deleteRole(Role $role): View
    {
         $this->checkAuthorizetion('roles.delete');      
        return view('roles.delete',compact('role'));
        
    }

    // destroy Role
    public function destroyRole(Role $role): RedirectResponse
    {
        $this->checkAuthorizetion('roles.delete');

        $prevent_role = ['super_admin','admin'];
        if(!in_array($role->name,$prevent_role)){
            try {
                $role->delete();
                return Redirect::route('roles.index')->with($this->sendWithSuccess('Role Delete Success.'));
            } catch (\Exception $e) {
                return Redirect::back()->with($this->sendWithError($e->getMessage()));
            }
        }
        return Redirect::back()->with($this->sendWithError("Role could not delete."));
        
    }
}

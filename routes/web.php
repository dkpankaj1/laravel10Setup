<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesAndPermissionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => ['auth']], function () {

    Route::resource('currency',CurrencyController::class)->only(['index','show','create','store','edit','update']);
    Route::get('currency/delete/{currency}',[CurrencyController::class,'delete'])->name('currency.delete');
    Route::delete('currency/delete/{currency}',[CurrencyController::class,'destroy'])->name('currency.delete');

    // :: Dashboard Route 
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // :: set appSession
    Route::get('/session/{appSession}', [BaseController::class, 'setAppSession'])->name('app.session.set');

    // :: Role And Permission
    Route::group(["prefix" => "roles"], function () {
        Route::get('/', [RolesAndPermissionsController::class, 'listRole'])->name('roles.index');
        Route::get('/create',[RolesAndPermissionsController::class, 'createRole'])->name('roles.create');
        Route::post('/create',[RolesAndPermissionsController::class, 'storeRole'])->name('roles.create');
        Route::get('/edit/{role:name}',[RolesAndPermissionsController::class, 'editRole'])->name('roles.edit');
        Route::put('/edit/{role:name}',[RolesAndPermissionsController::class, 'updateRole'])->name('roles.edit');
        Route::get('/delete/{role}',[RolesAndPermissionsController::class, 'deleteRole'])->name('roles.delete');
        Route::delete('/delete/{role}',[RolesAndPermissionsController::class, 'destroyRole'])->name('roles.delete');
    });


    // :: User Profile
    Route::group(["prefix" => "profile"], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.edit');
        Route::put('/', [PasswordController::class, 'update'])->name('profile.edit');
    });
});



require __DIR__ . '/auth.php';

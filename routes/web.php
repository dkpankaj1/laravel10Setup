<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProductUnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\SystemSettingController;
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

    //  :: begin currency route
    Route::resource('currency', CurrencyController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('currency/{currency}/delete', [CurrencyController::class, 'delete'])->name('currency.delete');
    Route::delete('currency/{currency}/delete', [CurrencyController::class, 'destroy'])->name('currency.delete');
    //  :: end currency route


    // :: Dashboard Route 
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // :: set appSession
    Route::get('/session/{appSession}', [BaseController::class, 'setAppSession'])->name('app.session.set');

    //  :: begin product unit route
    Route::resource('units', ProductUnitController::class)->only(['index', 'create', 'store']);
    Route::get('units/{productUnit}/edit', [ProductUnitController::class, 'edit'])->name('units.edit');
    Route::put('units/{productUnit}/edit', [ProductUnitController::class, 'update'])->name('units.update');
    Route::get('units/{productUnit}/delete', [ProductUnitController::class, 'delete'])->name('units.delete');
    Route::delete('units/{productUnit}/delete', [ProductUnitController::class, 'destroy'])->name('units.delete');
    //  :: end currency route


    // :: Role And Permission
    Route::group(["prefix" => "roles"], function () {
        Route::get('/', [RolesAndPermissionsController::class, 'listRole'])->name('roles.index');
        Route::get('/create', [RolesAndPermissionsController::class, 'createRole'])->name('roles.create');
        Route::post('/create', [RolesAndPermissionsController::class, 'storeRole'])->name('roles.create');
        Route::get('/{role:name}/edit', [RolesAndPermissionsController::class, 'editRole'])->name('roles.edit');
        Route::put('/{role:name}/edit', [RolesAndPermissionsController::class, 'updateRole'])->name('roles.edit');
        Route::get('/{role}/delete', [RolesAndPermissionsController::class, 'deleteRole'])->name('roles.delete');
        Route::delete('/{role}/delete', [RolesAndPermissionsController::class, 'destroyRole'])->name('roles.delete');
    });


    // :: User Profile
    Route::group(["prefix" => "profile"], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.edit');
        Route::put('/', [PasswordController::class, 'update'])->name('profile.edit');
    });

    // :: system settion 
    Route::get('setting/{systemSetting:name}/manage', [SystemSettingController::class, 'show'])->name('setting.system.manage');
    Route::put('setting/{systemSetting:name}/manage', [SystemSettingController::class, 'update'])->name('setting.system.manage');
});



require __DIR__ . '/auth.php';

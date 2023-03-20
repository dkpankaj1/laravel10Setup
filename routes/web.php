<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarehouseController;
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

    //  :: Begin warehouse 
    Route::resource('category', CategoryController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('category/{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::delete('category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    //  :: End warehouse 

    //  :: Begin currency 
    Route::resource('currency', CurrencyController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('currency/{currency}/delete', [CurrencyController::class, 'delete'])->name('currency.delete');
    Route::delete('currency/{currency}/delete', [CurrencyController::class, 'destroy'])->name('currency.destroy');
    //  :: End currency 

    //  :: Begin supplier 
    Route::resource('customer', CustomerController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('customer/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::delete('customer/{customer}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');
    //  :: End supplier 


    // :: Begin Dashboard Route 
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // :: End Dashboard Route 

    // :: Begin set-appSession 
    Route::get('/session/{appSession}', [BaseController::class, 'setAppSession'])->name('app.session.set');
    // :: End set-appSession 

    //  :: Begin product 
    Route::resource('product', ProductController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');
    Route::delete('product/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('export/xlsx/product', [ProductController::class, 'exportXlsx'])->name('product.export.excle');
    //  :: End  product 

    //  :: Begin product unit 
    Route::resource('units', ProductUnitController::class)->only(['index', 'create', 'store']);
    Route::get('units/{productUnit}/edit', [ProductUnitController::class, 'edit'])->name('units.edit');
    Route::put('units/{productUnit}/edit', [ProductUnitController::class, 'update'])->name('units.update');
    Route::get('units/{productUnit}/delete', [ProductUnitController::class, 'delete'])->name('units.delete');
    Route::delete('units/{productUnit}/delete', [ProductUnitController::class, 'destroy'])->name('units.destroy');
    //  :: End  product unit 

    // :: Begin Role And Permission
    Route::group(["prefix" => "roles"], function () {
        Route::get('/', [RolesAndPermissionsController::class, 'listRole'])->name('roles.index');
        Route::get('/create', [RolesAndPermissionsController::class, 'createRole'])->name('roles.create');
        Route::post('/create', [RolesAndPermissionsController::class, 'storeRole'])->name('roles.create');
        Route::get('/{role:name}/edit', [RolesAndPermissionsController::class, 'editRole'])->name('roles.edit');
        Route::put('/{role:name}/edit', [RolesAndPermissionsController::class, 'updateRole'])->name('roles.edit');
        Route::get('/{role}/delete', [RolesAndPermissionsController::class, 'deleteRole'])->name('roles.delete');
        Route::delete('/{role}/delete', [RolesAndPermissionsController::class, 'destroyRole'])->name('roles.destroy');
    });
    // :: End Role And Permission

    // :: Begin User Profile
    Route::group(["prefix" => "profile"], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.edit');
        Route::put('/', [PasswordController::class, 'update'])->name('profile.edit');
    });
    // :: End User Profile

    //  :: Begin supplier 
    Route::resource('supplier', SupplierController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('supplier/{supplier}/delete', [SupplierController::class, 'delete'])->name('supplier.delete');
    Route::delete('supplier/{supplier}/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    //  :: End supplier 

    // :: Begin system settion 
    Route::get('setting/{systemSetting:name}/manage', [SystemSettingController::class, 'show'])->name('setting.system.manage');
    Route::put('setting/{systemSetting:name}/manage', [SystemSettingController::class, 'update'])->name('setting.system.manage');
    // :: End system settion 

    //  :: Begin users 
    Route::resource('users', UsersController::class,)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('users/{user}/delete', [UsersController::class, 'delete'])->name('users.delete');
    Route::delete('users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    //  :: End users 

    //  :: Begin warehouse 
    Route::resource('warehouse', WarehouseController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('warehouse/all/pdf', [WarehouseController::class, 'generatePdf'])->name('warehouse.generatePdf');
    Route::get('warehouse/{warehouse}/delete', [WarehouseController::class, 'delete'])->name('warehouse.delete');
    Route::delete('warehouse/{warehouse}/delete', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');
    //  :: End warehouse 

});



require __DIR__ . '/auth.php';

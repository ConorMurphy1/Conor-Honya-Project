<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\ContractTypeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomerTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

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
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



Route::resource('categories', CategoryController::class);
Route::resource('contract-types', ContractTypeController::class);
Route::resource('customer-types', CustomerTypeController::class);
Route::resource('contracts', ContractController::class);
Route::resource('users', UserController::class);
Route::resource('authors', AuthorController::class);
Route::resource('roles', RoleController::class);
Route::resource('orders', OrderController::class);
Route::get('orders/detail/list', [OrderController::class, 'orderDetail'])->name('orders.detail');
Route::resource('contact-us', ContactUsController::class);
Route::resource('customers', CustomerController::class);
Route::resource('books', BookController::class);
Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/', [DashboardController::class, 'home'])->name('home');

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'expense-management/'], function(){
    Route::get('/expense-category',[App\Http\Controllers\ExpenseCategoryController::class, 'index']);
    Route::get('/expenses',[App\Http\Controllers\ExpenseController::class, 'index']);
});

Route::group(['prefix' => 'user-management/'], function(){
    Route::get('/roles',[App\Http\Controllers\AccountController::class, 'displayRolesPage']);
    Route::get('/users',[App\Http\Controllers\AccountController::class, 'displayUsersPage']);
});

Route::get('/expense-list',[App\Http\Controllers\ExpenseController::class, 'viewExpenseList']);
Route::get('/expense-category-list',[App\Http\Controllers\ExpenseCategoryController::class, 'viewExpenseCategoryList']);
Route::get('/user-list',[App\Http\Controllers\AccountController::class, 'viewUserList']);
Route::get('/role-list',[App\Http\Controllers\AccountController::class, 'viewRoleList']);
Route::get('/pie-chart-data',[App\Http\Controllers\DashboardController::class, 'getExpensePieChartData']);
Route::get('/expense-total-per-category',[App\Http\Controllers\DashboardController::class, 'expenseTotalPerCategoryList']);

Route::get('/expense-item/{id}',[App\Http\Controllers\ExpenseController::class, 'getExpenseItem']);
Route::post('/expense-item/create',[App\Http\Controllers\ExpenseController::class, 'createExpenseItem']);
Route::post('/expense-item/update/{id}',[App\Http\Controllers\ExpenseController::class, 'updateExpenseItem']);
Route::post('/expense-item/delete/{id}',[App\Http\Controllers\ExpenseController::class, 'deleteExpenseItem']);

Route::get('/category-item/{id}',[App\Http\Controllers\ExpenseCategoryController::class, 'getRoleItem']);
Route::post('/category-item/create',[App\Http\Controllers\ExpenseCategoryController::class, 'createCategoryItem']);
Route::post('/category-item/update/{id}',[App\Http\Controllers\ExpenseCategoryController::class, 'updateCategoryItem']);
Route::post('/category-item/delete/{id}',[App\Http\Controllers\ExpenseCategoryController::class, 'deleteCategoryItem']);

Route::get('/role/{id}',[App\Http\Controllers\AccountController::class, 'getRoleItem']);
Route::post('/role/create',[App\Http\Controllers\AccountController::class, 'createRoleItem']);
Route::post('/role/update/{id}',[App\Http\Controllers\AccountController::class, 'updateRoleItem']);
Route::post('/role/delete/{id}',[App\Http\Controllers\AccountController::class, 'deleteRoleItem']);

Route::get('/user/{id}',[App\Http\Controllers\AccountController::class, 'getUserItem']);
Route::post('/user/create',[App\Http\Controllers\AccountController::class, 'createUserItem']);
Route::post('/user/update/{id}',[App\Http\Controllers\AccountController::class, 'updateUserItem']);
Route::post('/user/delete/{id}',[App\Http\Controllers\AccountController::class, 'deleteUserItem']);
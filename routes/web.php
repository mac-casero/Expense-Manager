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
    return redirect()->intended('/home');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'expense-management/'], function(){
    Route::get('/expense-category','ExpenseCategoryController@index');
    Route::get('/expenses','ExpenseController@index');
});

Route::group(['prefix' => 'user-management/'], function(){
    Route::get('/roles','AccountController@displayRolesPage');
    Route::get('/users','AccountController@displayUsersPage');
});

Route::get('/expense-list','ExpenseController@viewExpenseList');
Route::get('/expense-category-list','ExpenseCategoryController@viewExpenseCategoryList');
Route::get('/user-list','AccountController@viewUserList');
Route::get('/role-list','AccountController@viewRoleList');
Route::get('/pie-chart-data','DashboardController@getExpensePieChartData');
Route::get('/expense-total-per-category','DashboardController@expenseTotalPerCategoryList');

Route::get('/expense-item/{id}','ExpenseController@getExpenseItem');
Route::post('/expense-item/create','ExpenseController@createExpenseItem');
Route::post('/expense-item/update/{id}','ExpenseController@updateExpenseItem');
Route::post('/expense-item/delete/{id}','ExpenseController@deleteExpenseItem');

Route::get('/category-item/{id}','ExpenseCategoryController@getCategoryItem');
Route::post('/category-item/create','ExpenseCategoryController@createCategoryItem');
Route::post('/category-item/update/{id}','ExpenseCategoryController@updateCategoryItem');
Route::post('/category-item/delete/{id}','ExpenseCategoryController@deleteCategoryItem');

Route::get('/role/{id}','AccountController@getRoleItem');
Route::post('/role/create','AccountController@createRoleItem');
Route::post('/role/update/{id}','AccountController@updateRoleItem');
Route::post('/role/delete/{id}','AccountController@deleteRoleItem');

Route::get('/user/{id}','AccountController@getUserItem');
Route::post('/user/create','AccountController@createUserItem');
Route::post('/user/update/{id}','AccountController@updateUserItem');
Route::post('/user/delete/{id}','AccountController@deleteUserItem');
<?php

use App\Supplier;
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


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'ifAdmin'], function (){
Route::resource('product','ProductController')->middleware('ifAdmin');
Route::resource('distribution','DistributionController');
Route::resource('purchase','PurchaseDetailsController');
Route::resource('department','DepartmentController');
Route::resource('supplier', 'SupplierController');
Route::resource('user', 'UserController');

Route::get('/delete-department/{id}', 'DepartmentController@del' )->name('del-department');
Route::get('/delete-supplier/{id}', 'SupplierController@del' )->name('del-supplier');
Route::get('/delete-product/{id}', 'ProductController@del' )->name('del-product');

Route::get('/productwpd/{id}', 'SummaryController@productwpd' )->name('product_detail');
Route::get('/supplierwpd/{id}', 'SummaryController@supplierwpd' )->name('supplierwpd');
Route::get('/orderNumberwdd/{id}', 'SummaryController@orderNumberwdd' )->name('orderNumberwdd');

Route::get('/productwdd/{id}', 'SummaryController@productwdd')->name('productwdd');
Route::get('/departmentwdd/{id}', 'SummaryController@departmentwdd')->name('departmentwdd');
Route::get('/ponwd{id}', 'SummaryController@ponwd')->name('ponwd');

Route::get('/products/archive', 'ProductController@archive' )->name('archive-product');
Route::get('/restore-product/{id}', 'ProductController@restore' )->name('restore-product');
Route::get('/delete-product/{id}', 'ProductController@delete' )->name('delete-product');

});


Route::get('/cp', function () {
    return view('cp');
});
Route::post('/change-passsword', 'HomeController@changePassword')->middleware('auth');

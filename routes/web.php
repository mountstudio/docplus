<?php

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

Route::get('/question', function () {
    return view('question.index');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about_us', function () {
    return view('about_us');
});
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/getdoctors', function () {
    return view('doctor.list');
});
Route::get('/getclinics', function () {
    return view('clinic.list');
});
Route::get('/getdoctor/{id}', function ($id) {
    return view('doctor.show', [
        'id' => $id,
    ]);
});
Route::get('/getclinic/{id}', function ($id) {
    return view('clinic.show', [
        'id' => $id,
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('options', 'AdminController@options')->name('options');
Route::get('datatable/getdoctors', 'AdminController@getDoctors')->name('datatable.getdoctors');
Route::get('datatable/getclinics', 'AdminController@getClinics')->name('datatable.getclinics');
Route::get('datatable/getservices', 'AdminController@getServices')->name('datatable.getservices');
Route::get('datatable/getcategories', 'AdminController@getCategories')->name('datatable.getcategories');
Route::resource('doctor', 'DoctorController');
Route::resource('clinic', 'ClinicController')->except([
    'show'
]);
Route::resource('service', 'ServiceController')->except([
    'show'
]);
Route::resource('category', 'CategoryController')->except([
    'show'
]);

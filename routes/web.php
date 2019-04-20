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
Route::get('/registration', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/registration-patient', function () {
    return view('auth.register-patient');
});

Route::get('/', 'MainController@index');


Route::get('/about_us', function () {
    return view('about_us');
});
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/getdoctors', function () {
    return view('doctor.index');
})->name('doctor.admin');
Route::get('/getclinics', function () {
    return view('clinic.index');
})->name('clinic.admin');
Route::get('/getservices', function () {
    return view('service.index');
})->name('service.admin');
Route::get('/getcategories', function () {
    return view('category.index');
})->name('category.admin');
Route::get('/getspecs', function () {
    return view('spec.index');
})->name('spec.admin');

Route::get('/diagnostic', 'ServiceController@show_diagnostic')->name('service.diagnostics');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/schedule/{schedule}/accept','RecordController@index')->name('schedule.accept');


Route::get('/notifications', 'UserController@notifications')->name('user.notifications');
Route::post('/notifications/{notification}/edit', 'UserController@DoctorEditmarkAsRead')->name('notification.edit');
Route::get('/notifications/{notification}/read', 'UserController@markAsRead')->name('notification.read');
Route::post('/edit.notifications/{doctor}', 'DoctorController@userUpdate')->name('edit.notifications');

Route::get('options', 'AdminController@options')->name('options');
Route::get('datatable/getdoctors', 'AdminController@getDoctors')->name('datatable.getdoctors');
Route::get('datatable/getclinics', 'AdminController@getClinics')->name('datatable.getclinics');
Route::get('datatable/getservices', 'AdminController@getServices')->name('datatable.getservices');
Route::get('datatable/getcategories', 'AdminController@getCategories')->name('datatable.getcategories');
Route::get('datatable/getspecs', 'AdminController@getSpecs')->name('datatable.getspecs');
Route::get('datatable/getlevels', 'AdminController@getLevels')->name('datatable.getlevels');
Route::resource('doctor', 'DoctorController');
Route::resource('clinic', 'ClinicController');
Route::resource('service', 'ServiceController');
Route::get('objects/{service}', 'ServiceController@objects')->name('objects.show');
Route::resource('spec', 'SpecController');
Route::resource('category', 'CategoryController');
Route::resource('schedule', 'ScheduleController');
Route::resource('record', 'RecordController');
Route::resource('feedback', 'FeedbackController');
Route::resource('question', 'QuestionController');
Route::resource('level', 'LevelController');
Route::get('/activation/question/{question}', 'QuestionController@activate')->name('question.activate');
Route::resource('answer', 'AnswerController');
Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/search', 'MainController@search')->name('search');
Route::get('/like/{type}/{id}', 'LikeController@like')->name('like');
Route::get('/activation/feedback/{feedback}', 'FeedbackController@activation')->name('feedback.activation');
Route::get('/getchildren/{id}', 'DoctorController@getChildren')->name('getchildren');
Route::get('/clinic.doctor/{id}/{spec}', 'SpecController@clinic')->name('clinic.doctor');
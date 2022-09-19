<?php

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


Route::get('/', 'App\Http\Controllers\Frontend\HomepageController@index');


//AdminLogin
Route::get('/admin', 'App\Http\Controllers\Admin\LoginController@index')->name('admin.login.page');
Route::post('/admin', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.post');

//Doctor Login
Route::get('/doctor-login', 'App\Http\Controllers\Doctor\LoginController@index')->name('doctor.login.page');
Route::post('/doctor-login', 'App\Http\Controllers\Doctor\LoginController@login')->name('doctor.login.post');
Route::get('/doctor-register', 'App\Http\Controllers\Doctor\LoginController@register')->name('doctor.register');
Route::post('/doctor-register', 'App\Http\Controllers\Doctor\LoginController@registerDoctor')->name('doctor.register.post');


Route::get('/doctor-profile/{id}', 'App\Http\Controllers\Frontend\SearchController@doctorProfile')->name('doctors.profile');


Route::get('/get-district/{city}', 'App\Http\Controllers\Admin\DoctorController@getDistrict')->name('get.district');


//Doctor Panel
Route::prefix('doctor')->middleware(['Doctor'])->group(function () {

    Route::get('/dashboard', 'App\Http\Controllers\Doctor\ProfileController@index')->name('doctor.dashboard');
    Route::get('/logout', 'App\Http\Controllers\Doctor\LoginController@logout')->name('doctor.logout');

    //Profile Settings
    Route::get('/profile-settings', 'App\Http\Controllers\Doctor\ProfileController@settings')->name('doctor.profile');
    Route::post('/profile-settings-save', 'App\Http\Controllers\Doctor\ProfileController@settingsSave')->name('doctor.profile.save');
    Route::get('/password', 'App\Http\Controllers\Doctor\ProfileController@password')->name('doctor.password');
    Route::post('/password/reset', 'App\Http\Controllers\Doctor\ProfileController@resetPassword')->name('doctor.password.reset');

    //Work Hours
    Route::get('/work-hours', 'App\Http\Controllers\Doctor\ProfileController@workHours')->name('doctor.workHours');
    Route::post('/work-hours-save', 'App\Http\Controllers\Doctor\ProfileController@workHoursSave')->name('doctor.workHours.save');

    //Blog
    Route::get('/blog', 'App\Http\Controllers\Doctor\BlogController@index')->name('doctor.blog.index');
    Route::get('/blog/create', 'App\Http\Controllers\Doctor\BlogController@create')->name('doctor.blog.create');
    Route::post('/blog/add', 'App\Http\Controllers\Doctor\BlogController@add')->name('doctor.blog.add');
    Route::get('/blog/edit/{id}', 'App\Http\Controllers\Doctor\BlogController@edit')->name('doctor.blog.edit');
    Route::post('/blog/update/{id}', 'App\Http\Controllers\Doctor\BlogController@update')->name('doctor.blog.update');
    Route::get('/blog/delete/{id}', 'App\Http\Controllers\Doctor\BlogController@delete')->name('doctor.blog.delete');

    Route::get('/services', 'App\Http\Controllers\Doctor\ServicesController@index')->name('doctor.services');


});


Route::prefix('admin')->middleware(['auth'])->group(function () {

    //Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');

    //Doctors
    Route::get('/doctor', 'App\Http\Controllers\Admin\DoctorController@index')->name('admin.doctors');
    Route::post('/doctors-create', 'App\Http\Controllers\Admin\DoctorController@create')->name('admin.doctor.create');
    Route::get('/doctor/delete/{id}', 'App\Http\Controllers\Admin\DoctorController@delete')->name('doctor.delete');
    Route::get('/doctor/edit/{id}', 'App\Http\Controllers\Admin\DoctorController@edit')->name('doctor.edit');
    Route::post('/update-doctor/{id}', 'App\Http\Controllers\Admin\DoctorController@update')->name('doctor.update');
    Route::get('/doctor/licance-end', 'App\Http\Controllers\Admin\DoctorController@licanceEnd')->name('doctor.licanceEnd');
    Route::post('/doctor/licance-update', 'App\Http\Controllers\Admin\DoctorController@licanceUpdate')->name('doctor.licance.update');
    Route::get('/doctor/wait', 'App\Http\Controllers\Admin\DoctorController@waitDoctor')->name('doctor.wait');
    Route::get('/doctor/approve/{id}', 'App\Http\Controllers\Admin\DoctorController@approveDoctor')->name('doctor.approve');
    Route::get('/doctor/stand-up/{type}/{id}', 'App\Http\Controllers\Admin\DoctorController@standUp')->name('doctor.stand');


    //Blog
    Route::get('/blog', 'App\Http\Controllers\Admin\BlogController@index')->name('admin.blog');
    Route::post('/blog', 'App\Http\Controllers\Admin\BlogController@index')->name('admin.blog.filter');
    Route::get('blog/detail/{id}', 'App\Http\Controllers\Admin\BlogController@review')->name('admin.blog.detail');
    Route::post('blog/status', 'App\Http\Controllers\Admin\BlogController@status')->name('admin.blog.status');
    Route::get('blog/wait', 'App\Http\Controllers\Admin\BlogController@wait')->name('admin.blog.wait');
    Route::get('blog/status/{type}/{id}', 'App\Http\Controllers\Admin\BlogController@accept')->name('admin.blog.accept');

    //Departments
    Route::get('departments', 'App\Http\Controllers\Admin\DepartmansController@index')->name('admin.departments');
    Route::get('departments/edit', 'App\Http\Controllers\Admin\DepartmansController@edit')->name('admin.department.edit');
    Route::post('departments/create', 'App\Http\Controllers\Admin\DepartmansController@create')->name('admin.department.create');
    Route::get('departments/edit/{id}', 'App\Http\Controllers\Admin\DepartmansController@edit')->name('admin.department.edit');
    Route::post('departments/update', 'App\Http\Controllers\Admin\DepartmansController@update')->name('admin.department.update');
    Route::get('departments/delete/{id}', 'App\Http\Controllers\Admin\DepartmansController@delete')->name('admin.department.delete');

});



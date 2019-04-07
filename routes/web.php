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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'Student\StudentHomeController@index')->name('home');
Route::get('/change/password', 'Student\ChangePasswordController@changePasswordView')->name('student.change.password');
Route::post('/change/password', 'Student\ChangePasswordController@changePassword')->name('student.change.password');


//admin login

Route::get('/admin/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
Route::get('/admin/index', 'Admin\AdminController@index')->name('admin.index');
Route::post('/admin/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
Route::post('/admin/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

//admin forget password
Route::get('admin/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//admin password reset

Route::get('admin/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');

//admin logout
Route::post('admin/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');


//admin
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('student', 'Admin\AdminController@student')->name('student');
        Route::post('addstudent', 'Admin\AdminController@addStudent')->name('add.student');
        Route::get('faculty', 'Admin\AdminController@faculty')->name('faculty');
        Route::post('addfaculty', 'Admin\AdminController@addFaculty')->name('add.faculty');
        Route::get('admin', 'Admin\AdminController@admin')->name('admin');
        Route::post('addadmin', 'Admin\AdminController@addAdmin')->name('add.admin');
        Route::get('course', 'Admin\AdminController@course')->name('course');
        Route::get('deletecourse/{id}', 'Admin\AdminController@deleteCourse')->name('course.delete');
        Route::get('updatecourse/{id}', 'Admin\AdminController@updateCourse')->name('course.update');
        Route::post('update/course/', 'Admin\AdminController@courseUpdate')->name('course.update.perform');
        Route::post('addcourse', 'Admin\AdminController@addCourse')->name('add.course');

        Route::get('assign_course', 'Admin\AdminController@assignCourse')->name('assign.course');
        Route::post('add_assing_course', 'Admin\AdminController@addAssignCourse')->name('add.assign.course');
    });

});


//student routes
Route::name('student.')->group(function () {
    Route::get('profile', 'Student\StudentHomeController@profile')->name('profile');
    Route::get('current/course', 'Student\StudentHomeController@currentCourse')->name('current.course');
    Route::get('course/history', 'Student\StudentHomeController@courseHistory')->name('course.history');
    Route::get('register/course', 'Student\StudentHomeController@registerCourse')->name('register.course');
    Route::get('register/course/{id}', 'Student\StudentHomeController@registerCoursePerform')->name('register.course.perform');
    Route::get('view/exam/mark/{id}', 'Student\StudentHomeController@examMark')->name('exam.mark');
    Route::get('/student/routine', 'Student\StudentHomeController@routine')->name('routine');
});

//faculty
//faculty login

Route::get('/faculty/login', 'Auth\Faculty\LoginController@showLoginForm')->name('faculty.login');
Route::get('/faculty/index', 'Faculty\FacultyController@index')->name('faculty.index');
Route::post('/faculty/login/submit', 'Auth\Faculty\LoginController@login')->name('faculty.login.submit');

//
////faculty forget password
//Route::get('faculty/password/reset', 'Auth\Faculty\ForgotPasswordController@showLinkRequestForm')->name('faculty.password.request');
//Route::post('faculty/password/email', 'Auth\Faculty\ForgotPasswordController@sendResetLinkEmail')->name('faculty.password.email');
////faculty password reset
//
//Route::get('faculty/password/reset/{token}', 'Auth\Faculty\ResetPasswordController@showResetForm' )->name('faculty.password.reset');
//Route::post('faculty/password/reset', 'Auth\Faculty\ResetPasswordController@reset')->name('faculty.password.update');
//
////faculty logout
Route::post('faculty/logout', 'Auth\Faculty\LoginController@logout')->name('faculty.logout');

Route::get('faculty/index', 'Faculty\FacultyController@index')->name('course.students');
Route::get('faculty/studentinfo/{id}', 'Faculty\FacultyController@coursesStudent')->name('faculty.student.info');

Route::post('faculty/submit/mark','Faculty\FacultyController@submitMark')->name('faculty.submit.mark');
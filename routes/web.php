<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use function Ramsey\Uuid\v1;

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

// routes/web.php
Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){
        Route::get('dashboard/', function()
        {
            return view('dashboard');
        });



        Route::group(['namespace' => 'App\Http\Controllers\Grades'], function () {
            Route::resource('Grades', 'GradeController');
        });

        Route::group(['namespace' => 'App\Http\Controllers\Classrooms'], function () {
            Route::resource('Classrooms', 'ClassroomController');
            Route::post('delete_all','ClassroomController@delete_all')->name('delete_all') ;
            Route::post('Filter_Classes','ClassroomController@Filter_Classes')->name('Filter_Classes') ;


        });

        Route::group(['namespace' =>'App\Http\Controllers\Sections'],function(){
            Route::resource('Sections','SectionController');
            Route::get('/classes/{id}', 'SectionController@getclasses');

        });


        Route::view('add_parent','livewire.show_form');

        Route::group(['namespace' =>'App\Http\Controllers\Teachers'],function(){
            Route::resource('Teachers','TeacherController') ;

        });

             Route::group(['namespace' =>'App\Http\Controllers\Students'],function(){
            Route::resource('Students','StudentController') ;
            Route::resource('Fees_Invoices','FeesInvoicesController') ;
            Route::resource('ProcessingFee','ProcessingFeeController') ;
            Route::resource('receipt_students','ReceiptStudentsController') ;
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::post('/Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
            Route::get('/Download_attachment/{studentname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::post('/Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');

        });

        Route::group(['namespace' => 'App\Http\Controllers\Students'],function(){
            Route::resource('Promotion','PromotionController');
        }) ;


        Route::group(['namespace' => 'App\Http\Controllers\Students'],function(){
            Route::resource('Graduated','GraduatedController');
        }) ;


        Route::group(['namespace' => 'App\Http\Controllers\Students'],function(){
            Route::resource('Fees','FeesController');
        }) ;
    });



/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/



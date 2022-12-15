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

Route::get('/', function () {
    return view('login', [
        'date_picker'   => false,
    ]);
})->name( 'login' );

Route::get( '/register', function () {
    return view( 'register', [
        'date_picker'   => true,
    ]);
})->name( 'register' );

Route::get( '/terms-and-conditions', function () {
    return view( 'terms-conditions', [
        'data_tables'   => false,
        'date_picker'   => false,
    ]);
})->name( 'terms-and-conditions' );

Route::get( '/dashboard', function () {
    return view( 'dashboard', [
        'data_tables'   => false,
        'date_picker'   => true,
        'moment'        => false
    ]);
})->name( 'dashboard' );

Route::get( '/documents', function () {
    return view( 'documents', [
        'data_tables'   => true,
        'date_picker'   => false,
        'moment'        => true
    ]);
})->name( 'documents' );

Route::get( '/employment-records', function () {
    return view( 'employment-records', [
        'data_tables'   => false,
        'date_picker'   => true,
        'moment'        => false
    ]);
})->name( 'employment-records' );

Route::get( '/resume', function () {
    return view( 'resume', [
        'data_tables'   => false,
        'date_picker'   => false,
        'moment'        => false
    ]);
})->name( 'resume' );

/** admin routes */

/** dashboard */
Route::get( '/admin/', function () {
    return view( 'admin.dashboard', [
        'charts'        => true,
        'data_tables'   => false,
        'date_picker'   => false,
        'moment'        => false
    ]);
})->name( 'admin-home' );

/** users */
Route::get( '/admin/users', function () {
    return view( 'candidates.users', [
        'charts'        => false,
        'data_tables'   => true,
        'date_picker'   => false,
        'moment'        => false
    ]);
})->name( 'users' );

/** users */
Route::get( '/admin/candidates', function () {
    return view( 'admin.candidates', [
        'charts'        => true,
        'data_tables'   => true,
        'date_picker'   => false,
        'moment'        => true,
        'js_file'       => 'candidates.js'
    ]);
})->name( 'candidates' );

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
        'date_picker'   => false,
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

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
    return view('welcome');
});

Route::post('/', function () {
    return view('welcome');
});

Route::get('delete-klanten', function () {
    return view('delete-klanten');
});

Route::post('delete-klanten', function () {
    return view('welcome');
});

// Het returned dezelfde view maar ik wil juist dat het refresht. Alleen werkt het dan niet.
Route::post('klant-toegevoegd', function () {
    return view('welcome');
});

Route::get('edit-klanten', function () {
    return view('edit-klanten');
});

Route::put('edit-klanten', function () {
    return view('edit-klanten');
});

// Het returned dezelfde view maar ik wil juist dat het redirect. Alleen werkt het dan niet.
Route::post('edit-klanten', function () {
    return view('edit-klanten');
});
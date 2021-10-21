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
//    throw new \Exception(json_encode(config('database.connections.tenant')));
    return  (new \App\Models\Tenant([
        'slug' => 'stock_test_1',
        'display' => 'test', 'descri' => 'test', 'tel1' => '774659453',
        'tel2' => '774659453', 'adresse' => 'hlm', 'email' => 'a@gmail.com']))->save();
});

/*Route::get('/{tenant?}', function () {
    return view('welcome');
});*/

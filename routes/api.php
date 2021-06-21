<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 
Route::prefix('/icard')-> group ( function()
{
    Route::get('/GetBrand','api\iCard@Brand');
    Route::get('/BrandDetails','api\iCard@BrandDetails');
    Route::get('/ValidateCard','api\iCard@ValidateCard');
    Route::post('/Purchase','api\iCard@pay');
    Route::get('/brandlogo','api\iCard@img');
  
});
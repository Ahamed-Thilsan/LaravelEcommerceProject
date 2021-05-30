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



//Business sector
Route::match(['get','post'],'/add', [App\Http\Controllers\BusinesssectorController::class, 'addBusinessSector']);
Route::get('/', [App\Http\Controllers\BusinesssectorController::class, 'viewBusinessSector']);
Route::match(['get','post'],'/edit/{id}', [App\Http\Controllers\BusinesssectorController::class, 'editBusinessSector']);
//Channel 

Route::match(['get','post'],'/add-channel', [App\Http\Controllers\ChannelController::class, 'addChannel']);
Route::get('/view-channel', [App\Http\Controllers\ChannelController::class, 'viewChannel']);
Route::match(['get','post'],'/edit-channel/{id}', [App\Http\Controllers\ChannelController::class, 'editChannel']);

//sub channel 
Route::match(['get','post'],'/add-sub-channel', [App\Http\Controllers\SubchannelController::class, 'addSubChannel']);
Route::get('/view-sub-channel', [App\Http\Controllers\SubchannelController::class, 'viewSubChannel']);
Route::match(['get','post'],'/edit-sub-channel/{id}', [App\Http\Controllers\SubchannelController::class, 'editSubChannel']);

//province
Route::match(['get','post'],'/add-province', [App\Http\Controllers\ProvinceController::class, 'addProvince']);
Route::get('/view-province', [App\Http\Controllers\ProvinceController::class, 'viewProvince']);
Route::match(['get','post'],'/edit-province/{id}', [App\Http\Controllers\ProvinceController::class, 'editProvince']);

//district 
Route::match(['get','post'],'/add-district', [App\Http\Controllers\DistrictController::class, 'addDistrict']);
Route::get('/view-district', [App\Http\Controllers\DistrictController::class, 'viewDistrict']);
Route::match(['get','post'],'/edit-district/{id}', [App\Http\Controllers\DistrictController::class, 'editDistrict']);

//town
Route::match(['get','post'],'/add-town', [App\Http\Controllers\TownController::class, 'addTown']);
Route::get('/view-town', [App\Http\Controllers\TownController::class, 'ViewTown']);
Route::match(['get','post'],'/edit-town/{id}', [App\Http\Controllers\TownController::class, 'editTown']);

//site
Route::match(['get','post'],'/add-site', [App\Http\Controllers\SiteController::class, 'addSite']);
Route::get('/view-site', [App\Http\Controllers\SiteController::class, 'viewSite']);
Route::match(['get','post'],'/edit-site/{id}', [App\Http\Controllers\SiteController::class, 'editSite']);
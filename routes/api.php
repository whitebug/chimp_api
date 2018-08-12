<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'MailingLists','prefix'=>'/mailing_lists'], function (){
    Route::get('/',['as'=>'mailing_lists','uses'=>'MailingListController@index']);
    Route::put('/',['as'=>'mailing_lists.store','uses'=>'MailingListController@store']);
    Route::get('/{mailing_list}',['as'=>'mailing_lists.show','uses'=>'MailingListController@show']);
    Route::post('/{mailing_list}',['as'=>'mailing_lists.update','uses'=>'MailingListController@update']);
    Route::delete('/{mailing_list}',['as'=>'mailing_lists.destroy','uses'=>'MailingListController@destroy']);
});
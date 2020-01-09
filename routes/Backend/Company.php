<?php

/*
 * Blogs Management
 */
Route::group(['namespace' => 'Company'], function () {
	Route::get('investment/detail/{id}','CompanyController@show')->name('company.show');
    Route::get('investment/requests','CompanyController@list')->name('investment.list');
    Route::get('investment/list','CompanyController@getTable')->name('investment.requests');
   
});
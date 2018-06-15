<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('contact_companies', 'ContactCompaniesController', ['except' => ['create', 'edit']]);

        Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);

        Route::resource('agents', 'AgentsController', ['except' => ['create', 'edit']]);

        Route::resource('categories', 'CategoriesController', ['except' => ['create', 'edit']]);

        Route::resource('ads', 'AdsController', ['except' => ['create', 'edit']]);

});

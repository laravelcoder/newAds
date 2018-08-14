<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('channel_servers', 'ChannelServersController', ['except' => ['create', 'edit']]);

        Route::resource('csis', 'CsisController', ['except' => ['create', 'edit']]);

        Route::resource('channels', 'ChannelsController', ['except' => ['create', 'edit']]);

        Route::resource('per_channel_configurations', 'PerChannelConfigurationsController', ['except' => ['create', 'edit']]);

        Route::resource('report_settings', 'ReportSettingsController', ['except' => ['create', 'edit']]);

        Route::resource('countries', 'CountriesController', ['except' => ['create', 'edit']]);

});

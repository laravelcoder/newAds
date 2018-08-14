<?php
// Route::middleware('auth')->group(function () {
    Route::get('/r', function () {
        function philsroutes()
        {
            $routeCollection = Route::getRoutes();
            echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
            echo "<div class='container'><div class='col-md-12'><table class='table table-striped' style='width:100%'>";
            echo '<tr>';
            echo "<td width='10%'><h4>HTTP Method</h4></td>";
            echo "<td width='30%'><h4>URL</h4></td>";
            echo "<td width='30%'><h4>Route</h4></td>";
            echo "<td width='30%'><h4>Corresponding Action</h4></td>";
            echo '</tr>';

            foreach ($routeCollection as $value) {
                echo '<tr>';
                echo '<td>'.$value->methods()[0].'</td>';
                echo "<td><a href='".$value->uri()."' target='_blank'>".$value->uri().'</a> </td>';
                echo '<td>'.$value->getName().'</td>';
                echo '<td>'.$value->getActionName().'</td>';
                echo '</tr>';
            }

            echo '</table></div></div>';
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
        }

        return philsroutes();
    });
// });


Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('channel_servers', 'Admin\ChannelServersController');
    Route::post('channel_servers_mass_destroy', ['uses' => 'Admin\ChannelServersController@massDestroy', 'as' => 'channel_servers.mass_destroy']);
    Route::post('channel_servers_restore/{id}', ['uses' => 'Admin\ChannelServersController@restore', 'as' => 'channel_servers.restore']);
    Route::delete('channel_servers_perma_del/{id}', ['uses' => 'Admin\ChannelServersController@perma_del', 'as' => 'channel_servers.perma_del']);
    Route::resource('csis', 'Admin\CsisController');
    Route::post('csis_mass_destroy', ['uses' => 'Admin\CsisController@massDestroy', 'as' => 'csis.mass_destroy']);
    Route::post('csis_restore/{id}', ['uses' => 'Admin\CsisController@restore', 'as' => 'csis.restore']);
    Route::delete('csis_perma_del/{id}', ['uses' => 'Admin\CsisController@perma_del', 'as' => 'csis.perma_del']);
    Route::resource('csos', 'Admin\CsosController');
    Route::post('csos_mass_destroy', ['uses' => 'Admin\CsosController@massDestroy', 'as' => 'csos.mass_destroy']);
    Route::post('csos_restore/{id}', ['uses' => 'Admin\CsosController@restore', 'as' => 'csos.restore']);
    Route::delete('csos_perma_del/{id}', ['uses' => 'Admin\CsosController@perma_del', 'as' => 'csos.perma_del']);
    Route::resource('protocols', 'Admin\ProtocolsController');
    Route::post('protocols_mass_destroy', ['uses' => 'Admin\ProtocolsController@massDestroy', 'as' => 'protocols.mass_destroy']);
    Route::post('protocols_restore/{id}', ['uses' => 'Admin\ProtocolsController@restore', 'as' => 'protocols.restore']);
    Route::delete('protocols_perma_del/{id}', ['uses' => 'Admin\ProtocolsController@perma_del', 'as' => 'protocols.perma_del']);
    Route::resource('channels', 'Admin\ChannelsController');
    Route::post('channels_mass_destroy', ['uses' => 'Admin\ChannelsController@massDestroy', 'as' => 'channels.mass_destroy']);
    Route::post('channels_restore/{id}', ['uses' => 'Admin\ChannelsController@restore', 'as' => 'channels.restore']);
    Route::delete('channels_perma_del/{id}', ['uses' => 'Admin\ChannelsController@perma_del', 'as' => 'channels.perma_del']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('sync_servers', 'Admin\SyncServersController');
    Route::post('sync_servers_mass_destroy', ['uses' => 'Admin\SyncServersController@massDestroy', 'as' => 'sync_servers.mass_destroy']);
    Route::post('sync_servers_restore/{id}', ['uses' => 'Admin\SyncServersController@restore', 'as' => 'sync_servers.restore']);
    Route::delete('sync_servers_perma_del/{id}', ['uses' => 'Admin\SyncServersController@perma_del', 'as' => 'sync_servers.perma_del']);
    Route::resource('ftps', 'Admin\FtpsController');
    Route::post('ftps_mass_destroy', ['uses' => 'Admin\FtpsController@massDestroy', 'as' => 'ftps.mass_destroy']);
    Route::post('ftps_restore/{id}', ['uses' => 'Admin\FtpsController@restore', 'as' => 'ftps.restore']);
    Route::delete('ftps_perma_del/{id}', ['uses' => 'Admin\FtpsController@perma_del', 'as' => 'ftps.perma_del']);
    Route::resource('general_settings', 'Admin\GeneralSettingsController');
    Route::post('general_settings_mass_destroy', ['uses' => 'Admin\GeneralSettingsController@massDestroy', 'as' => 'general_settings.mass_destroy']);
    Route::post('general_settings_restore/{id}', ['uses' => 'Admin\GeneralSettingsController@restore', 'as' => 'general_settings.restore']);
    Route::delete('general_settings_perma_del/{id}', ['uses' => 'Admin\GeneralSettingsController@perma_del', 'as' => 'general_settings.perma_del']);
    Route::resource('output_settings', 'Admin\OutputSettingsController');
    Route::post('output_settings_mass_destroy', ['uses' => 'Admin\OutputSettingsController@massDestroy', 'as' => 'output_settings.mass_destroy']);
    Route::post('output_settings_restore/{id}', ['uses' => 'Admin\OutputSettingsController@restore', 'as' => 'output_settings.restore']);
    Route::delete('output_settings_perma_del/{id}', ['uses' => 'Admin\OutputSettingsController@perma_del', 'as' => 'output_settings.perma_del']);
    Route::resource('realtime_notifications', 'Admin\RealtimeNotificationsController');
    Route::post('realtime_notifications_mass_destroy', ['uses' => 'Admin\RealtimeNotificationsController@massDestroy', 'as' => 'realtime_notifications.mass_destroy']);
    Route::post('realtime_notifications_restore/{id}', ['uses' => 'Admin\RealtimeNotificationsController@restore', 'as' => 'realtime_notifications.restore']);
    Route::delete('realtime_notifications_perma_del/{id}', ['uses' => 'Admin\RealtimeNotificationsController@perma_del', 'as' => 'realtime_notifications.perma_del']);
    Route::resource('per_channel_configurations', 'Admin\PerChannelConfigurationsController');
    Route::post('per_channel_configurations_mass_destroy', ['uses' => 'Admin\PerChannelConfigurationsController@massDestroy', 'as' => 'per_channel_configurations.mass_destroy']);
    Route::post('per_channel_configurations_restore/{id}', ['uses' => 'Admin\PerChannelConfigurationsController@restore', 'as' => 'per_channel_configurations.restore']);
    Route::delete('per_channel_configurations_perma_del/{id}', ['uses' => 'Admin\PerChannelConfigurationsController@perma_del', 'as' => 'per_channel_configurations.perma_del']);
    Route::resource('report_settings', 'Admin\ReportSettingsController');
    Route::post('report_settings_mass_destroy', ['uses' => 'Admin\ReportSettingsController@massDestroy', 'as' => 'report_settings.mass_destroy']);
    Route::post('report_settings_restore/{id}', ['uses' => 'Admin\ReportSettingsController@restore', 'as' => 'report_settings.restore']);
    Route::delete('report_settings_perma_del/{id}', ['uses' => 'Admin\ReportSettingsController@perma_del', 'as' => 'report_settings.perma_del']);
    Route::resource('countries', 'Admin\CountriesController');
    Route::post('countries_mass_destroy', ['uses' => 'Admin\CountriesController@massDestroy', 'as' => 'countries.mass_destroy']);
    Route::post('countries_restore/{id}', ['uses' => 'Admin\CountriesController@restore', 'as' => 'countries.restore']);
    Route::delete('countries_perma_del/{id}', ['uses' => 'Admin\CountriesController@perma_del', 'as' => 'countries.perma_del']);
    Route::resource('filters', 'Admin\FiltersController');
    Route::post('filters_mass_destroy', ['uses' => 'Admin\FiltersController@massDestroy', 'as' => 'filters.mass_destroy']);
    Route::post('filters_restore/{id}', ['uses' => 'Admin\FiltersController@restore', 'as' => 'filters.restore']);
    Route::delete('filters_perma_del/{id}', ['uses' => 'Admin\FiltersController@perma_del', 'as' => 'filters.perma_del']);



 
});

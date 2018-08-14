<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 22, 'title' => 'protocol_access',],
            ['id' => 23, 'title' => 'protocol_create',],
            ['id' => 24, 'title' => 'protocol_edit',],
            ['id' => 25, 'title' => 'protocol_view',],
            ['id' => 26, 'title' => 'protocol_delete',],
            ['id' => 27, 'title' => 'channel_access',],
            ['id' => 28, 'title' => 'channel_create',],
            ['id' => 29, 'title' => 'channel_edit',],
            ['id' => 30, 'title' => 'channel_view',],
            ['id' => 31, 'title' => 'channel_delete',],
            ['id' => 32, 'title' => 'csi_access',],
            ['id' => 33, 'title' => 'csi_create',],
            ['id' => 34, 'title' => 'csi_edit',],
            ['id' => 35, 'title' => 'csi_view',],
            ['id' => 36, 'title' => 'csi_delete',],
            ['id' => 37, 'title' => 'channel_server_access',],
            ['id' => 38, 'title' => 'channel_server_create',],
            ['id' => 39, 'title' => 'channel_server_edit',],
            ['id' => 40, 'title' => 'channel_server_view',],
            ['id' => 41, 'title' => 'channel_server_delete',],
            ['id' => 42, 'title' => 'cso_access',],
            ['id' => 43, 'title' => 'cso_create',],
            ['id' => 44, 'title' => 'cso_edit',],
            ['id' => 45, 'title' => 'cso_view',],
            ['id' => 46, 'title' => 'cso_delete',],
            ['id' => 47, 'title' => 'channel_servers_area_access',],
            ['id' => 48, 'title' => 'sync_server_area_access',],
            ['id' => 49, 'title' => 'sync_server_access',],
            ['id' => 50, 'title' => 'sync_server_create',],
            ['id' => 51, 'title' => 'sync_server_edit',],
            ['id' => 52, 'title' => 'sync_server_view',],
            ['id' => 53, 'title' => 'sync_server_delete',],
            ['id' => 59, 'title' => 'configuration_setting_access',],
            ['id' => 60, 'title' => 'ftp_access',],
            ['id' => 61, 'title' => 'ftp_create',],
            ['id' => 62, 'title' => 'ftp_edit',],
            ['id' => 63, 'title' => 'ftp_view',],
            ['id' => 64, 'title' => 'ftp_delete',],
            ['id' => 65, 'title' => 'general_setting_access',],
            ['id' => 66, 'title' => 'general_setting_create',],
            ['id' => 67, 'title' => 'general_setting_edit',],
            ['id' => 68, 'title' => 'general_setting_view',],
            ['id' => 69, 'title' => 'general_setting_delete',],
            ['id' => 70, 'title' => 'output_setting_access',],
            ['id' => 71, 'title' => 'output_setting_create',],
            ['id' => 72, 'title' => 'output_setting_edit',],
            ['id' => 73, 'title' => 'output_setting_view',],
            ['id' => 74, 'title' => 'output_setting_delete',],
            ['id' => 75, 'title' => 'realtime_notification_access',],
            ['id' => 76, 'title' => 'realtime_notification_create',],
            ['id' => 77, 'title' => 'realtime_notification_edit',],
            ['id' => 78, 'title' => 'realtime_notification_view',],
            ['id' => 79, 'title' => 'realtime_notification_delete',],
            ['id' => 80, 'title' => 'per_channel_configuration_access',],
            ['id' => 81, 'title' => 'per_channel_configuration_create',],
            ['id' => 82, 'title' => 'per_channel_configuration_edit',],
            ['id' => 83, 'title' => 'per_channel_configuration_view',],
            ['id' => 84, 'title' => 'per_channel_configuration_delete',],
            ['id' => 85, 'title' => 'report_setting_access',],
            ['id' => 86, 'title' => 'report_setting_create',],
            ['id' => 87, 'title' => 'report_setting_edit',],
            ['id' => 88, 'title' => 'report_setting_view',],
            ['id' => 89, 'title' => 'report_setting_delete',],
            ['id' => 90, 'title' => 'country_access',],
            ['id' => 91, 'title' => 'country_create',],
            ['id' => 92, 'title' => 'country_edit',],
            ['id' => 93, 'title' => 'country_view',],
            ['id' => 94, 'title' => 'country_delete',],
            ['id' => 95, 'title' => 'filter_access',],
            ['id' => 96, 'title' => 'filter_create',],
            ['id' => 97, 'title' => 'filter_edit',],
            ['id' => 98, 'title' => 'filter_view',],
            ['id' => 99, 'title' => 'filter_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}

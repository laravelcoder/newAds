@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            @can('channel_servers_area_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.channel-servers-area.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('channel_server_access')
                    <li>
                        <a href="{{ route('admin.channel_servers.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.channel-server.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('csi_access')
                    <li>
                        <a href="{{ route('admin.csis.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.csi.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('cso_access')
                    <li>
                        <a href="{{ route('admin.csos.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.cso.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('protocol_access')
            <li>
                <a href="{{ route('admin.protocols.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.protocols.title')</span>
                </a>
            </li>@endcan
            
            @can('channel_access')
            <li>
                <a href="{{ route('admin.channels.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.channels.title')</span>
                </a>
            </li>@endcan
            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('sync_server_area_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.sync-server-area.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('sync_server_access')
                    <li>
                        <a href="{{ route('admin.sync_servers.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.sync-servers.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('configuration_setting_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.configuration-settings.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('ftp_access')
                            <li>
                                <a href="{{ route('admin.ftps.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.ftp.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('general_setting_access')
                            <li>
                                <a href="{{ route('admin.general_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.general-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('output_setting_access')
                            <li>
                                <a href="{{ route('admin.output_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.output-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('realtime_notification_access')
                            <li>
                                <a href="{{ route('admin.realtime_notifications.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.realtime-notification.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('per_channel_configuration_access')
                            <li>
                                <a href="{{ route('admin.per_channel_configurations.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.per-channel-configurations.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('report_setting_access')
                            <li>
                                <a href="{{ route('admin.report_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.report-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('filter_access')
                            <li>
                                <a href="{{ route('admin.filters.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.filters.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('country_access')
            <li>
                <a href="{{ route('admin.countries.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.country.title')</span>
                </a>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
        <img src="{{ asset('images/sling_n_dish.png') }}" />
    </section>

</aside>


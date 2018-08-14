@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.sync-servers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.sync-servers.fields.name')</th>
                            <td field-key='name'>{{ $sync_server->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#general_settings" aria-controls="general_settings" role="tab" data-toggle="tab">General settings</a></li>
<li role="presentation" class=""><a href="#output_settings" aria-controls="output_settings" role="tab" data-toggle="tab">Output Settings</a></li>
<li role="presentation" class=""><a href="#realtime_notification" aria-controls="realtime_notification" role="tab" data-toggle="tab">Real-time Notification</a></li>
<li role="presentation" class=""><a href="#ftp" aria-controls="ftp" role="tab" data-toggle="tab">FTP DETAILS</a></li>
<li role="presentation" class=""><a href="#per_channel_configurations" aria-controls="per_channel_configurations" role="tab" data-toggle="tab">Per channel configurations</a></li>
<li role="presentation" class=""><a href="#report_settings" aria-controls="report_settings" role="tab" data-toggle="tab">Report settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="general_settings">
<table class="table table-bordered table-striped {{ count($general_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.general-settings.fields.transcoding-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($general_settings) > 0)
            @foreach ($general_settings as $general_setting)
                <tr data-entry-id="{{ $general_setting->id }}">
                    <td field-key='transcoding_server'>{{ $general_setting->transcoding_server }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.general_settings.restore', $general_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.general_settings.perma_del', $general_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('general_setting_view')
                                    <a href="{{ route('admin.general_settings.show',[$general_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('general_setting_edit')
                                    <a href="{{ route('admin.general_settings.edit',[$general_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('general_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.general_settings.destroy', $general_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="output_settings">
<table class="table table-bordered table-striped {{ count($output_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.output-settings.fields.report-time')</th>
                        <th>@lang('global.output-settings.fields.email')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($output_settings) > 0)
            @foreach ($output_settings as $output_setting)
                <tr data-entry-id="{{ $output_setting->id }}">
                    <td field-key='report_time'>{{ $output_setting->report_time }}</td>
                                <td field-key='email'>{{ $output_setting->email->email or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.output_settings.restore', $output_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.output_settings.perma_del', $output_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('output_setting_view')
                                    <a href="{{ route('admin.output_settings.show',[$output_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('output_setting_edit')
                                    <a href="{{ route('admin.output_settings.edit',[$output_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('output_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.output_settings.destroy', $output_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="realtime_notification">
<table class="table table-bordered table-striped {{ count($realtime_notifications) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.realtime-notification.fields.server-type')</th>
                        <th>@lang('global.realtime-notification.fields.r-urltn')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($realtime_notifications) > 0)
            @foreach ($realtime_notifications as $realtime_notification)
                <tr data-entry-id="{{ $realtime_notification->id }}">
                    <td field-key='server_type'>{{ $realtime_notification->server_type }}</td>
                                <td field-key='r_urltn'>{{ $realtime_notification->r_urltn }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.realtime_notifications.restore', $realtime_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.realtime_notifications.perma_del', $realtime_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('realtime_notification_view')
                                    <a href="{{ route('admin.realtime_notifications.show',[$realtime_notification->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('realtime_notification_edit')
                                    <a href="{{ route('admin.realtime_notifications.edit',[$realtime_notification->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('realtime_notification_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.realtime_notifications.destroy', $realtime_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="ftp">
<table class="table table-bordered table-striped {{ count($ftps) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.ftp.fields.ftp-server')</th>
                        <th>@lang('global.ftp.fields.ftp-directory')</th>
                        <th>@lang('global.ftp.fields.ftp-username')</th>
                        <th>@lang('global.ftp.fields.ftp-password')</th>
                        <th>@lang('global.ftp.fields.grab-time')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($ftps) > 0)
            @foreach ($ftps as $ftp)
                <tr data-entry-id="{{ $ftp->id }}">
                    <td field-key='ftp_server'>{{ $ftp->ftp_server }}</td>
                                <td field-key='ftp_directory'>{{ $ftp->ftp_directory }}</td>
                                <td field-key='ftp_username'>{{ $ftp->ftp_username }}</td>
                                <td>---</td>
                                <td field-key='grab_time'>{{ $ftp->grab_time }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ftps.restore', $ftp->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ftps.perma_del', $ftp->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('ftp_view')
                                    <a href="{{ route('admin.ftps.show',[$ftp->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('ftp_edit')
                                    <a href="{{ route('admin.ftps.edit',[$ftp->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('ftp_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ftps.destroy', $ftp->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="per_channel_configurations">
<table class="table table-bordered table-striped {{ count($per_channel_configurations) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.per-channel-configurations.fields.cid')</th>
                        <th>@lang('global.per-channel-configurations.fields.active')</th>
                        <th>@lang('global.per-channel-configurations.fields.notify-channel-id')</th>
                        <th>@lang('global.per-channel-configurations.fields.offset')</th>
                        <th>@lang('global.per-channel-configurations.fields.ad-lengths')</th>
                        <th>@lang('global.per-channel-configurations.fields.ad-spacing')</th>
                        <th>@lang('global.per-channel-configurations.fields.rtn')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($per_channel_configurations) > 0)
            @foreach ($per_channel_configurations as $per_channel_configuration)
                <tr data-entry-id="{{ $per_channel_configuration->id }}">
                    <td field-key='cid'>{{ $per_channel_configuration->cid }}</td>
                                <td field-key='active'>{{ Form::checkbox("active", 1, $per_channel_configuration->active == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='notify_channel_id'>{{ $per_channel_configuration->notify_channel_id }}</td>
                                <td field-key='offset'>{{ $per_channel_configuration->offset }}</td>
                                <td field-key='ad_lengths'>{{ $per_channel_configuration->ad_lengths }}</td>
                                <td field-key='ad_spacing'>{{ $per_channel_configuration->ad_spacing }}</td>
                                <td field-key='rtn'>{{ $per_channel_configuration->rtn->server_type or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.per_channel_configurations.restore', $per_channel_configuration->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.per_channel_configurations.perma_del', $per_channel_configuration->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('per_channel_configuration_view')
                                    <a href="{{ route('admin.per_channel_configurations.show',[$per_channel_configuration->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('per_channel_configuration_edit')
                                    <a href="{{ route('admin.per_channel_configurations.edit',[$per_channel_configuration->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('per_channel_configuration_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.per_channel_configurations.destroy', $per_channel_configuration->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="report_settings">
<table class="table table-bordered table-striped {{ count($report_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.report-settings.fields.millisecond-precision')</th>
                        <th>@lang('global.report-settings.fields.show-channel-button')</th>
                        <th>@lang('global.report-settings.fields.show-clip-button')</th>
                        <th>@lang('global.report-settings.fields.show-group-button')</th>
                        <th>@lang('global.report-settings.fields.show-live-button')</th>
                        <th>@lang('global.report-settings.fields.enable-evt')</th>
                        <th>@lang('global.report-settings.fields.enable-excel')</th>
                        <th>@lang('global.report-settings.fields.enable-evt-timing')</th>
                        <th>@lang('global.report-settings.fields.timezone')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($report_settings) > 0)
            @foreach ($report_settings as $report_setting)
                <tr data-entry-id="{{ $report_setting->id }}">
                    <td field-key='millisecond_precision'>{{ Form::checkbox("millisecond_precision", 1, $report_setting->millisecond_precision == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_channel_button'>{{ Form::checkbox("show_channel_button", 1, $report_setting->show_channel_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_clip_button'>{{ Form::checkbox("show_clip_button", 1, $report_setting->show_clip_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_group_button'>{{ Form::checkbox("show_group_button", 1, $report_setting->show_group_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_live_button'>{{ Form::checkbox("show_live_button", 1, $report_setting->show_live_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='enable_evt'>{{ Form::checkbox("enable_evt", 1, $report_setting->enable_evt == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='enable_excel'>{{ Form::checkbox("enable_excel", 1, $report_setting->enable_excel == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='enable_evt_timing'>{{ Form::checkbox("enable_evt_timing", 1, $report_setting->enable_evt_timing == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='timezone'>{{ $report_setting->timezone }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.report_settings.restore', $report_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.report_settings.perma_del', $report_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('report_setting_view')
                                    <a href="{{ route('admin.report_settings.show',[$report_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('report_setting_edit')
                                    <a href="{{ route('admin.report_settings.edit',[$report_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('report_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.report_settings.destroy', $report_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.sync_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

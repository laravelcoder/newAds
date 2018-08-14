@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.per-channel-configurations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.cid')</th>
                            <td field-key='cid'>{{ $per_channel_configuration->cid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.active')</th>
                            <td field-key='active'>{{ Form::checkbox("active", 1, $per_channel_configuration->active == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.notify-channel-id')</th>
                            <td field-key='notify_channel_id'>{{ $per_channel_configuration->notify_channel_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.offset')</th>
                            <td field-key='offset'>{{ $per_channel_configuration->offset }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.ad-lengths')</th>
                            <td field-key='ad_lengths'>{{ $per_channel_configuration->ad_lengths }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.ad-spacing')</th>
                            <td field-key='ad_spacing'>{{ $per_channel_configuration->ad_spacing }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.rtn')</th>
                            <td field-key='rtn'>{{ $per_channel_configuration->rtn->server_type or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.realtime-notification.fields.r-urltn')</th>
                            <td field-key='r_urltn'>{{ isset($per_channel_configuration->rtn) ? $per_channel_configuration->rtn->r_urltn : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.per-channel-configurations.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $per_channel_configuration->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.per_channel_configurations.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

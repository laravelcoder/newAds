@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.csi.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.csi.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $csi->channel_server->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.channel')</th>
                            <td field-key='channel'>{{ $csi->channel->channelid or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.protocol')</th>
                            <td field-key='protocol'>{{ $csi->protocol->protocol or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.ssm')</th>
                            <td field-key='ssm'>{{ $csi->ssm }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.imc')</th>
                            <td field-key='imc'>{{ $csi->imc }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.ip')</th>
                            <td field-key='ip'>{{ $csi->ip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.pid')</th>
                            <td field-key='pid'>{{ $csi->pid }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.csis.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

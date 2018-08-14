@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.general-settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.general-settings.fields.transcoding-server')</th>
                            <td field-key='transcoding_server'>{{ $general_setting->transcoding_server }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.general-settings.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $general_setting->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.general_settings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

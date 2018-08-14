@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.output-settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.output-settings.fields.report-time')</th>
                            <td field-key='report_time'>{{ $output_setting->report_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.output-settings.fields.email')</th>
                            <td field-key='email'>{{ $output_setting->email->email or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.name')</th>
                            <td field-key='name'>{{ isset($output_setting->email) ? $output_setting->email->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.output-settings.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $output_setting->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.output_settings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

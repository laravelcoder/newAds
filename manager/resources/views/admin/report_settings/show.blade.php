@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.report-settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.report-settings.fields.millisecond-precision')</th>
                            <td field-key='millisecond_precision'>{{ Form::checkbox("millisecond_precision", 1, $report_setting->millisecond_precision == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.show-channel-button')</th>
                            <td field-key='show_channel_button'>{{ Form::checkbox("show_channel_button", 1, $report_setting->show_channel_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.show-clip-button')</th>
                            <td field-key='show_clip_button'>{{ Form::checkbox("show_clip_button", 1, $report_setting->show_clip_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.show-group-button')</th>
                            <td field-key='show_group_button'>{{ Form::checkbox("show_group_button", 1, $report_setting->show_group_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.show-live-button')</th>
                            <td field-key='show_live_button'>{{ Form::checkbox("show_live_button", 1, $report_setting->show_live_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.enable-evt')</th>
                            <td field-key='enable_evt'>{{ Form::checkbox("enable_evt", 1, $report_setting->enable_evt == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.enable-excel')</th>
                            <td field-key='enable_excel'>{{ Form::checkbox("enable_excel", 1, $report_setting->enable_excel == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.enable-evt-timing')</th>
                            <td field-key='enable_evt_timing'>{{ Form::checkbox("enable_evt_timing", 1, $report_setting->enable_evt_timing == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.timezone')</th>
                            <td field-key='timezone'>{{ $report_setting->timezone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.country')</th>
                            <td field-key='country'>{{ $report_setting->country->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.synce-server')</th>
                            <td field-key='synce_server'>{{ $report_setting->synce_server->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.report-settings.fields.filters')</th>
                            <td field-key='filters'>{{ $report_setting->filters->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.report_settings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

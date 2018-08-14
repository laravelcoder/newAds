@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.country.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.country.fields.shortcode')</th>
                            <td field-key='shortcode'>{{ $country->shortcode }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.country.fields.title')</th>
                            <td field-key='title'>{{ $country->title }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#report_settings" aria-controls="report_settings" role="tab" data-toggle="tab">Report settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="report_settings">
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

            <a href="{{ route('admin.countries.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

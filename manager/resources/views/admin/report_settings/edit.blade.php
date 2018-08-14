@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.report-settings.title')</h3>
    
    {!! Form::model($report_setting, ['method' => 'PUT', 'route' => ['admin.report_settings.update', $report_setting->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('millisecond_precision', trans('global.report-settings.fields.millisecond-precision').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('millisecond_precision', 0) !!}
                    {!! Form::checkbox('millisecond_precision', 1, old('millisecond_precision', old('millisecond_precision')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('millisecond_precision'))
                        <p class="help-block">
                            {{ $errors->first('millisecond_precision') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_channel_button', trans('global.report-settings.fields.show-channel-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_channel_button', 0) !!}
                    {!! Form::checkbox('show_channel_button', 1, old('show_channel_button', old('show_channel_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_channel_button'))
                        <p class="help-block">
                            {{ $errors->first('show_channel_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_clip_button', trans('global.report-settings.fields.show-clip-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_clip_button', 0) !!}
                    {!! Form::checkbox('show_clip_button', 1, old('show_clip_button', old('show_clip_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_clip_button'))
                        <p class="help-block">
                            {{ $errors->first('show_clip_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_group_button', trans('global.report-settings.fields.show-group-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_group_button', 0) !!}
                    {!! Form::checkbox('show_group_button', 1, old('show_group_button', old('show_group_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_group_button'))
                        <p class="help-block">
                            {{ $errors->first('show_group_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_live_button', trans('global.report-settings.fields.show-live-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_live_button', 0) !!}
                    {!! Form::checkbox('show_live_button', 1, old('show_live_button', old('show_live_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_live_button'))
                        <p class="help-block">
                            {{ $errors->first('show_live_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enable_evt', trans('global.report-settings.fields.enable-evt').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('enable_evt', 0) !!}
                    {!! Form::checkbox('enable_evt', 1, old('enable_evt', old('enable_evt')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('enable_evt'))
                        <p class="help-block">
                            {{ $errors->first('enable_evt') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enable_excel', trans('global.report-settings.fields.enable-excel').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('enable_excel', 0) !!}
                    {!! Form::checkbox('enable_excel', 1, old('enable_excel', old('enable_excel')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('enable_excel'))
                        <p class="help-block">
                            {{ $errors->first('enable_excel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enable_evt_timing', trans('global.report-settings.fields.enable-evt-timing').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('enable_evt_timing', 0) !!}
                    {!! Form::checkbox('enable_evt_timing', 1, old('enable_evt_timing', old('enable_evt_timing')), []) !!}
                    <p class="help-block">Enable EVT timing (03:00 -> 27:00)</p>
                    @if($errors->has('enable_evt_timing'))
                        <p class="help-block">
                            {{ $errors->first('enable_evt_timing') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('timezone', trans('global.report-settings.fields.timezone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('timezone', old('timezone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('timezone'))
                        <p class="help-block">
                            {{ $errors->first('timezone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country_id', trans('global.report-settings.fields.country').'', ['class' => 'control-label']) !!}
                    {!! Form::select('country_id', $countries, old('country_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country_id'))
                        <p class="help-block">
                            {{ $errors->first('country_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('synce_server_id', trans('global.report-settings.fields.synce-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('synce_server_id', $synce_servers, old('synce_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('synce_server_id'))
                        <p class="help-block">
                            {{ $errors->first('synce_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('filters_id', trans('global.report-settings.fields.filters').'', ['class' => 'control-label']) !!}
                    {!! Form::select('filters_id', $filters, old('filters_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('filters_id'))
                        <p class="help-block">
                            {{ $errors->first('filters_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


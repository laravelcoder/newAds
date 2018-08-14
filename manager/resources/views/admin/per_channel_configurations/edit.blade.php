@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.per-channel-configurations.title')</h3>
    
    {!! Form::model($per_channel_configuration, ['method' => 'PUT', 'route' => ['admin.per_channel_configurations.update', $per_channel_configuration->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cid', trans('global.per-channel-configurations.fields.cid').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cid', old('cid'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cid'))
                        <p class="help-block">
                            {{ $errors->first('cid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('active', trans('global.per-channel-configurations.fields.active').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, old('active', old('active')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('active'))
                        <p class="help-block">
                            {{ $errors->first('active') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notify_channel_id', trans('global.per-channel-configurations.fields.notify-channel-id').'', ['class' => 'control-label']) !!}
                    {!! Form::text('notify_channel_id', old('notify_channel_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notify_channel_id'))
                        <p class="help-block">
                            {{ $errors->first('notify_channel_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('offset', trans('global.per-channel-configurations.fields.offset').'', ['class' => 'control-label']) !!}
                    {!! Form::text('offset', old('offset'), ['class' => 'form-control', 'placeholder' => 'Time offset for notifications in milliseconds']) !!}
                    <p class="help-block">Time offset for notifications in milliseconds</p>
                    @if($errors->has('offset'))
                        <p class="help-block">
                            {{ $errors->first('offset') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ad_lengths', trans('global.per-channel-configurations.fields.ad-lengths').'', ['class' => 'control-label']) !!}
                    {!! Form::number('ad_lengths', old('ad_lengths'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ad_lengths'))
                        <p class="help-block">
                            {{ $errors->first('ad_lengths') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ad_spacing', trans('global.per-channel-configurations.fields.ad-spacing').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ad_spacing', old('ad_spacing'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ad_spacing'))
                        <p class="help-block">
                            {{ $errors->first('ad_spacing') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rtn_id', trans('global.per-channel-configurations.fields.rtn').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rtn_id', $rtns, old('rtn_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rtn_id'))
                        <p class="help-block">
                            {{ $errors->first('rtn_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.per-channel-configurations.fields.sync-server').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('sync_server_id', $sync_servers, old('sync_server_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sync_server_id'))
                        <p class="help-block">
                            {{ $errors->first('sync_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


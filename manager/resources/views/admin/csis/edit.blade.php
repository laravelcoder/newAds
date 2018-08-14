@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.csi.title')</h3>
    
    {!! Form::model($csi, ['method' => 'PUT', 'route' => ['admin.csis.update', $csi->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_server_id', trans('global.csi.fields.channel-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_server_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_id', trans('global.csi.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_id', $channels, old('channel_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('protocol_id', trans('global.csi.fields.protocol').'', ['class' => 'control-label']) !!}
                    {!! Form::select('protocol_id', $protocols, old('protocol_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('protocol_id'))
                        <p class="help-block">
                            {{ $errors->first('protocol_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ssm', trans('global.csi.fields.ssm').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ssm', old('ssm'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ssm'))
                        <p class="help-block">
                            {{ $errors->first('ssm') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('imc', trans('global.csi.fields.imc').'', ['class' => 'control-label']) !!}
                    {!! Form::text('imc', old('imc'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('imc'))
                        <p class="help-block">
                            {{ $errors->first('imc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ip', trans('global.csi.fields.ip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ip', old('ip'), ['class' => 'form-control', 'placeholder' => 'PORT']) !!}
                    <p class="help-block">PORT</p>
                    @if($errors->has('ip'))
                        <p class="help-block">
                            {{ $errors->first('ip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pid', trans('global.csi.fields.pid').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pid', old('pid'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pid'))
                        <p class="help-block">
                            {{ $errors->first('pid') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


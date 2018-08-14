@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.general-settings.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.general_settings.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('transcoding_server', trans('global.general-settings.fields.transcoding-server').'', ['class' => 'control-label']) !!}
                    {!! Form::text('transcoding_server', old('transcoding_server'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transcoding_server'))
                        <p class="help-block">
                            {{ $errors->first('transcoding_server') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.general-settings.fields.sync-server').'*', ['class' => 'control-label']) !!}
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

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


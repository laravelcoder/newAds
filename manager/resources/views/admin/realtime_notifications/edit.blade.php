@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.realtime-notification.title')</h3>
    
    {!! Form::model($realtime_notification, ['method' => 'PUT', 'route' => ['admin.realtime_notifications.update', $realtime_notification->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_type', trans('global.realtime-notification.fields.server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('server_type', $enum_server_type, old('server_type'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('server_type'))
                        <p class="help-block">
                            {{ $errors->first('server_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('r_urltn', trans('global.realtime-notification.fields.r-urltn').'', ['class' => 'control-label']) !!}
                    {!! Form::text('r_urltn', old('r_urltn'), ['class' => 'form-control', 'placeholder' => 'For server-type Caipy the call will provide the following parameters http://yoururl?clip=XXX&channel=XXX&time=XXX&duration=XXX to notify you']) !!}
                    <p class="help-block">For server-type Caipy the call will provide the following parameters http://yoururl?clip=XXX&channel=XXX&time=XXX&duration=XXX to notify you</p>
                    @if($errors->has('r_urltn'))
                        <p class="help-block">
                            {{ $errors->first('r_urltn') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.realtime-notification.fields.sync-server').'*', ['class' => 'control-label']) !!}
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


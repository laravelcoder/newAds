@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.ftp.title')</h3>
    
    {!! Form::model($ftp, ['method' => 'PUT', 'route' => ['admin.ftps.update', $ftp->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_server', trans('global.ftp.fields.ftp-server').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ftp_server', old('ftp_server'), ['class' => 'form-control', 'placeholder' => 'HOST']) !!}
                    <p class="help-block">HOST</p>
                    @if($errors->has('ftp_server'))
                        <p class="help-block">
                            {{ $errors->first('ftp_server') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_directory', trans('global.ftp.fields.ftp-directory').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ftp_directory', old('ftp_directory'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ftp_directory'))
                        <p class="help-block">
                            {{ $errors->first('ftp_directory') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_username', trans('global.ftp.fields.ftp-username').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ftp_username', old('ftp_username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ftp_username'))
                        <p class="help-block">
                            {{ $errors->first('ftp_username') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ftp_password', trans('global.ftp.fields.ftp-password').'', ['class' => 'control-label']) !!}
                    {!! Form::password('ftp_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ftp_password'))
                        <p class="help-block">
                            {{ $errors->first('ftp_password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('grab_time', trans('global.ftp.fields.grab-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('grab_time', old('grab_time'), ['class' => 'form-control timepicker', 'placeholder' => '23:00:00']) !!}
                    <p class="help-block">23:00:00</p>
                    @if($errors->has('grab_time'))
                        <p class="help-block">
                            {{ $errors->first('grab_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.ftp.fields.sync-server').'*', ['class' => 'control-label']) !!}
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

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop
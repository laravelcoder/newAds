@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.output-settings.title')</h3>
    
    {!! Form::model($output_setting, ['method' => 'PUT', 'route' => ['admin.output_settings.update', $output_setting->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('report_time', trans('global.output-settings.fields.report-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('report_time', old('report_time'), ['class' => 'form-control timepicker', 'placeholder' => '08:00:00']) !!}
                    <p class="help-block">08:00:00</p>
                    @if($errors->has('report_time'))
                        <p class="help-block">
                            {{ $errors->first('report_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email_id', trans('global.output-settings.fields.email').'', ['class' => 'control-label']) !!}
                    {!! Form::select('email_id', $emails, old('email_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">mark.hurst@dish.com</p>
                    @if($errors->has('email_id'))
                        <p class="help-block">
                            {{ $errors->first('email_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.output-settings.fields.sync-server').'*', ['class' => 'control-label']) !!}
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
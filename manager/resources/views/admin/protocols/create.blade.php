@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.protocols.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.protocols.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('protocol', trans('global.protocols.fields.protocol').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('protocol', old('protocol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('protocol'))
                        <p class="help-block">
                            {{ $errors->first('protocol') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('real_name', trans('global.protocols.fields.real-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('real_name', old('real_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('real_name'))
                        <p class="help-block">
                            {{ $errors->first('real_name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


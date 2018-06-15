@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.phones.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.phones.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone_number', trans('global.phones.fields.phone-number').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone_number'))
                        <p class="help-block">
                            {{ $errors->first('phone_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('advertiser_id', trans('global.phones.fields.advertiser').'', ['class' => 'control-label']) !!}
                    {!! Form::select('advertiser_id', $advertisers, old('advertiser_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('advertiser_id'))
                        <p class="help-block">
                            {{ $errors->first('advertiser_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('agent_id', trans('global.phones.fields.agent').'', ['class' => 'control-label']) !!}
                    {!! Form::select('agent_id', $agents, old('agent_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('agent_id'))
                        <p class="help-block">
                            {{ $errors->first('agent_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('advertisers_id', trans('global.phones.fields.advertisers').'', ['class' => 'control-label']) !!}
                    {!! Form::select('advertisers_id', $advertisers, old('advertisers_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('advertisers_id'))
                        <p class="help-block">
                            {{ $errors->first('advertisers_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


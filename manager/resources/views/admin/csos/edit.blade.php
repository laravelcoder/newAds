@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cso.title')</h3>
    
    {!! Form::model($cso, ['method' => 'PUT', 'route' => ['admin.csos.update', $cso->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_server_id', trans('global.cso.fields.channel-server').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('cid_id', trans('global.cso.fields.cid').'', ['class' => 'control-label']) !!}
                    {!! Form::select('cid_id', $cids, old('cid_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cid_id'))
                        <p class="help-block">
                            {{ $errors->first('cid_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ocloud_a', trans('global.cso.fields.ocloud-a').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ocloud_a', old('ocloud_a'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ocloud_a'))
                        <p class="help-block">
                            {{ $errors->first('ocloud_a') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ocp_a', trans('global.cso.fields.ocp-a').'', ['class' => 'control-label']) !!}
                    {!! Form::number('ocp_a', old('ocp_a'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ocp_a'))
                        <p class="help-block">
                            {{ $errors->first('ocp_a') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ocloud_b', trans('global.cso.fields.ocloud-b').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ocloud_b', old('ocloud_b'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ocloud_b'))
                        <p class="help-block">
                            {{ $errors->first('ocloud_b') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ocp_b', trans('global.cso.fields.ocp-b').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ocp_b', old('ocp_b'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ocp_b'))
                        <p class="help-block">
                            {{ $errors->first('ocp_b') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


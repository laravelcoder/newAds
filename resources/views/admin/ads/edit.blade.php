@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.ads.title')</h3>
    
    {!! Form::model($ad, ['method' => 'PUT', 'route' => ['admin.ads.update', $ad->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ad_label', trans('global.ads.fields.ad-label').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('ad_label', old('ad_label'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ad_label'))
                        <p class="help-block">
                            {{ $errors->first('ad_label') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ad_description', trans('global.ads.fields.ad-description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('ad_description', old('ad_description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ad_description'))
                        <p class="help-block">
                            {{ $errors->first('ad_description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_impressions', trans('global.ads.fields.total-impressions').'', ['class' => 'control-label']) !!}
                    {!! Form::number('total_impressions', old('total_impressions'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_impressions'))
                        <p class="help-block">
                            {{ $errors->first('total_impressions') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_networks', trans('global.ads.fields.total-networks').'', ['class' => 'control-label']) !!}
                    {!! Form::number('total_networks', old('total_networks'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_networks'))
                        <p class="help-block">
                            {{ $errors->first('total_networks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_channels', trans('global.ads.fields.total-channels').'', ['class' => 'control-label']) !!}
                    {!! Form::number('total_channels', old('total_channels'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_channels'))
                        <p class="help-block">
                            {{ $errors->first('total_channels') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_id', trans('global.ads.fields.category-id').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-category_id">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-category_id">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('category_id[]', $category_ids, old('category_id') ? old('category_id') : $ad->category_id->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-category_id' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
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

    <script>
        $("#selectbtn-category_id").click(function(){
            $("#selectall-category_id > option").prop("selected","selected");
            $("#selectall-category_id").trigger("change");
        });
        $("#deselectbtn-category_id").click(function(){
            $("#selectall-category_id > option").prop("selected","");
            $("#selectall-category_id").trigger("change");
        });
    </script>
@stop
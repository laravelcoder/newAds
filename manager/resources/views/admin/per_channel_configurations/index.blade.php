@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.per-channel-configurations.title')</h3>
    @can('per_channel_configuration_create')
    <p>
        <a href="{{ route('admin.per_channel_configurations.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.per_channel_configurations.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.per_channel_configurations.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($per_channel_configurations) > 0 ? 'datatable' : '' }} @can('per_channel_configuration_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('per_channel_configuration_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.per-channel-configurations.fields.cid')</th>
                        <th>@lang('global.per-channel-configurations.fields.active')</th>
                        <th>@lang('global.per-channel-configurations.fields.notify-channel-id')</th>
                        <th>@lang('global.per-channel-configurations.fields.offset')</th>
                        <th>@lang('global.per-channel-configurations.fields.ad-lengths')</th>
                        <th>@lang('global.per-channel-configurations.fields.ad-spacing')</th>
                        <th>@lang('global.per-channel-configurations.fields.rtn')</th>
                        <th>@lang('global.realtime-notification.fields.r-urltn')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($per_channel_configurations) > 0)
                        @foreach ($per_channel_configurations as $per_channel_configuration)
                            <tr data-entry-id="{{ $per_channel_configuration->id }}">
                                @can('per_channel_configuration_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='cid'>{{ $per_channel_configuration->cid }}</td>
                                <td field-key='active'>{{ Form::checkbox("active", 1, $per_channel_configuration->active == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='notify_channel_id'>{{ $per_channel_configuration->notify_channel_id }}</td>
                                <td field-key='offset'>{{ $per_channel_configuration->offset }}</td>
                                <td field-key='ad_lengths'>{{ $per_channel_configuration->ad_lengths }}</td>
                                <td field-key='ad_spacing'>{{ $per_channel_configuration->ad_spacing }}</td>
                                <td field-key='rtn'>{{ $per_channel_configuration->rtn->server_type or '' }}</td>
<td field-key='r_urltn'>{{ isset($per_channel_configuration->rtn) ? $per_channel_configuration->rtn->r_urltn : '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.per_channel_configurations.restore', $per_channel_configuration->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.per_channel_configurations.perma_del', $per_channel_configuration->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('per_channel_configuration_view')
                                    <a href="{{ route('admin.per_channel_configurations.show',[$per_channel_configuration->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('per_channel_configuration_edit')
                                    <a href="{{ route('admin.per_channel_configurations.edit',[$per_channel_configuration->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('per_channel_configuration_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.per_channel_configurations.destroy', $per_channel_configuration->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('per_channel_configuration_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.per_channel_configurations.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.alerts.title')</h3>
    @can('alert_create')
    <p>
        <a href="{{ route('admin.alerts.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('alert_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('alert_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.alerts.fields.title')</th>
                        <th>@lang('global.alerts.fields.alert-type')</th>
                        <th>@lang('global.alerts.fields.contact')</th>
                        <th>@lang('global.contacts.fields.last-name')</th>
                        <th>@lang('global.alerts.fields.user')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('alert_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.alerts.mass_destroy') }}';
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.alerts.index') !!}';
            window.dtDefaultOptions.columns = [@can('alert_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan{data: 'title', name: 'title'},
                {data: 'alert_type', name: 'alert_type'},
                {data: 'contact.first_name', name: 'contact.first_name'},
                {data: 'contact.last_name', name: 'contact.last_name'},
                {data: 'user.name', name: 'user.name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
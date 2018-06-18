@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.networks.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.networks.fields.network')</th>
                            <td field-key='network'>{{ $network->network }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.networks.fields.network-affiliate')</th>
                            <td field-key='network_affiliate'>{{ $network->network_affiliate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.networks.fields.created-by')</th>
                            <td field-key='created_by'>{{ $network->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.networks.fields.created-by-team')</th>
                            <td field-key='created_by_team'>{{ $network->created_by_team->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.networks.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

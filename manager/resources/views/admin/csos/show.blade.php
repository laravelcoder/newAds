@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cso.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.cso.fields.cid')</th>
                            <td field-key='cid'>{{ $cso->cid->channelid or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocloud-a')</th>
                            <td field-key='ocloud_a'>{{ $cso->ocloud_a }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocp-a')</th>
                            <td field-key='ocp_a'>{{ $cso->ocp_a }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocloud-b')</th>
                            <td field-key='ocloud_b'>{{ $cso->ocloud_b }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocp-b')</th>
                            <td field-key='ocp_b'>{{ $cso->ocp_b }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.csos.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

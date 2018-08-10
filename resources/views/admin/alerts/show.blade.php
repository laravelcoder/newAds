@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.alerts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.alerts.fields.title')</th>
                            <td field-key='title'>{{ $alert->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.alerts.fields.content')</th>
                            <td field-key='content'>{!! $alert->content !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.alerts.fields.alert-type')</th>
                            <td field-key='alert_type'>{{ $alert->alert_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.alerts.fields.contact')</th>
                            <td field-key='contact'>{{ $alert->contact->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contacts.fields.last-name')</th>
                            <td field-key='last_name'>{{ isset($alert->contact) ? $alert->contact->last_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.alerts.fields.user')</th>
                            <td field-key='user'>{{ $alert->user->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.alerts.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

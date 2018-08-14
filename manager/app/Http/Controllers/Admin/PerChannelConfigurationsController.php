<?php

namespace App\Http\Controllers\Admin;

use App\PerChannelConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePerChannelConfigurationsRequest;
use App\Http\Requests\Admin\UpdatePerChannelConfigurationsRequest;

class PerChannelConfigurationsController extends Controller
{
    /**
     * Display a listing of PerChannelConfiguration.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('per_channel_configuration_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('per_channel_configuration_delete')) {
                return abort(401);
            }
            $per_channel_configurations = PerChannelConfiguration::onlyTrashed()->get();
        } else {
            $per_channel_configurations = PerChannelConfiguration::all();
        }

        return view('admin.per_channel_configurations.index', compact('per_channel_configurations'));
    }

    /**
     * Show the form for creating new PerChannelConfiguration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('per_channel_configuration_create')) {
            return abort(401);
        }
        
        $rtns = \App\RealtimeNotification::get()->pluck('server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.per_channel_configurations.create', compact('rtns', 'sync_servers'));
    }

    /**
     * Store a newly created PerChannelConfiguration in storage.
     *
     * @param  \App\Http\Requests\StorePerChannelConfigurationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerChannelConfigurationsRequest $request)
    {
        if (! Gate::allows('per_channel_configuration_create')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::create($request->all());



        return redirect()->route('admin.per_channel_configurations.index');
    }


    /**
     * Show the form for editing PerChannelConfiguration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('per_channel_configuration_edit')) {
            return abort(401);
        }
        
        $rtns = \App\RealtimeNotification::get()->pluck('server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);

        return view('admin.per_channel_configurations.edit', compact('per_channel_configuration', 'rtns', 'sync_servers'));
    }

    /**
     * Update PerChannelConfiguration in storage.
     *
     * @param  \App\Http\Requests\UpdatePerChannelConfigurationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerChannelConfigurationsRequest $request, $id)
    {
        if (! Gate::allows('per_channel_configuration_edit')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);
        $per_channel_configuration->update($request->all());



        return redirect()->route('admin.per_channel_configurations.index');
    }


    /**
     * Display PerChannelConfiguration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('per_channel_configuration_view')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);

        return view('admin.per_channel_configurations.show', compact('per_channel_configuration'));
    }


    /**
     * Remove PerChannelConfiguration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);
        $per_channel_configuration->delete();

        return redirect()->route('admin.per_channel_configurations.index');
    }

    /**
     * Delete all selected PerChannelConfiguration at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PerChannelConfiguration::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore PerChannelConfiguration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::onlyTrashed()->findOrFail($id);
        $per_channel_configuration->restore();

        return redirect()->route('admin.per_channel_configurations.index');
    }

    /**
     * Permanently delete PerChannelConfiguration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('per_channel_configuration_delete')) {
            return abort(401);
        }
        $per_channel_configuration = PerChannelConfiguration::onlyTrashed()->findOrFail($id);
        $per_channel_configuration->forceDelete();

        return redirect()->route('admin.per_channel_configurations.index');
    }
}

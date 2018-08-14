<?php

namespace App\Http\Controllers\Admin;

use App\SyncServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSyncServersRequest;
use App\Http\Requests\Admin\UpdateSyncServersRequest;

class SyncServersController extends Controller
{
    /**
     * Display a listing of SyncServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('sync_server_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('sync_server_delete')) {
                return abort(401);
            }
            $sync_servers = SyncServer::onlyTrashed()->get();
        } else {
            $sync_servers = SyncServer::all();
        }

        return view('admin.sync_servers.index', compact('sync_servers'));
    }

    /**
     * Show the form for creating new SyncServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('sync_server_create')) {
            return abort(401);
        }
        return view('admin.sync_servers.create');
    }

    /**
     * Store a newly created SyncServer in storage.
     *
     * @param  \App\Http\Requests\StoreSyncServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSyncServersRequest $request)
    {
        if (! Gate::allows('sync_server_create')) {
            return abort(401);
        }
        $sync_server = SyncServer::create($request->all());



        return redirect()->route('admin.sync_servers.index');
    }


    /**
     * Show the form for editing SyncServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('sync_server_edit')) {
            return abort(401);
        }
        $sync_server = SyncServer::findOrFail($id);

        return view('admin.sync_servers.edit', compact('sync_server'));
    }

    /**
     * Update SyncServer in storage.
     *
     * @param  \App\Http\Requests\UpdateSyncServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSyncServersRequest $request, $id)
    {
        if (! Gate::allows('sync_server_edit')) {
            return abort(401);
        }
        $sync_server = SyncServer::findOrFail($id);
        $sync_server->update($request->all());



        return redirect()->route('admin.sync_servers.index');
    }


    /**
     * Display SyncServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('sync_server_view')) {
            return abort(401);
        }
        $general_settings = \App\GeneralSetting::where('sync_server_id', $id)->get();$output_settings = \App\OutputSetting::where('sync_server_id', $id)->get();$realtime_notifications = \App\RealtimeNotification::where('sync_server_id', $id)->get();$ftps = \App\Ftp::where('sync_server_id', $id)->get();$per_channel_configurations = \App\PerChannelConfiguration::where('sync_server_id', $id)->get();$report_settings = \App\ReportSetting::where('synce_server_id', $id)->get();

        $sync_server = SyncServer::findOrFail($id);

        return view('admin.sync_servers.show', compact('sync_server', 'general_settings', 'output_settings', 'realtime_notifications', 'ftps', 'per_channel_configurations', 'report_settings'));
    }


    /**
     * Remove SyncServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('sync_server_delete')) {
            return abort(401);
        }
        $sync_server = SyncServer::findOrFail($id);
        $sync_server->delete();

        return redirect()->route('admin.sync_servers.index');
    }

    /**
     * Delete all selected SyncServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('sync_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SyncServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SyncServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('sync_server_delete')) {
            return abort(401);
        }
        $sync_server = SyncServer::onlyTrashed()->findOrFail($id);
        $sync_server->restore();

        return redirect()->route('admin.sync_servers.index');
    }

    /**
     * Permanently delete SyncServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('sync_server_delete')) {
            return abort(401);
        }
        $sync_server = SyncServer::onlyTrashed()->findOrFail($id);
        $sync_server->forceDelete();

        return redirect()->route('admin.sync_servers.index');
    }
}

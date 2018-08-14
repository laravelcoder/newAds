<?php

namespace App\Http\Controllers\Admin;

use App\RealtimeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRealtimeNotificationsRequest;
use App\Http\Requests\Admin\UpdateRealtimeNotificationsRequest;

class RealtimeNotificationsController extends Controller
{
    /**
     * Display a listing of RealtimeNotification.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('realtime_notification_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('realtime_notification_delete')) {
                return abort(401);
            }
            $realtime_notifications = RealtimeNotification::onlyTrashed()->get();
        } else {
            $realtime_notifications = RealtimeNotification::all();
        }

        return view('admin.realtime_notifications.index', compact('realtime_notifications'));
    }

    /**
     * Show the form for creating new RealtimeNotification.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('realtime_notification_create')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_server_type = RealtimeNotification::$enum_server_type;
            
        return view('admin.realtime_notifications.create', compact('enum_server_type', 'sync_servers'));
    }

    /**
     * Store a newly created RealtimeNotification in storage.
     *
     * @param  \App\Http\Requests\StoreRealtimeNotificationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealtimeNotificationsRequest $request)
    {
        if (! Gate::allows('realtime_notification_create')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::create($request->all());



        return redirect()->route('admin.realtime_notifications.index');
    }


    /**
     * Show the form for editing RealtimeNotification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('realtime_notification_edit')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_server_type = RealtimeNotification::$enum_server_type;
            
        $realtime_notification = RealtimeNotification::findOrFail($id);

        return view('admin.realtime_notifications.edit', compact('realtime_notification', 'enum_server_type', 'sync_servers'));
    }

    /**
     * Update RealtimeNotification in storage.
     *
     * @param  \App\Http\Requests\UpdateRealtimeNotificationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealtimeNotificationsRequest $request, $id)
    {
        if (! Gate::allows('realtime_notification_edit')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::findOrFail($id);
        $realtime_notification->update($request->all());



        return redirect()->route('admin.realtime_notifications.index');
    }


    /**
     * Display RealtimeNotification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('realtime_notification_view')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$per_channel_configurations = \App\PerChannelConfiguration::where('rtn_id', $id)->get();

        $realtime_notification = RealtimeNotification::findOrFail($id);

        return view('admin.realtime_notifications.show', compact('realtime_notification', 'per_channel_configurations'));
    }


    /**
     * Remove RealtimeNotification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::findOrFail($id);
        $realtime_notification->delete();

        return redirect()->route('admin.realtime_notifications.index');
    }

    /**
     * Delete all selected RealtimeNotification at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = RealtimeNotification::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore RealtimeNotification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::onlyTrashed()->findOrFail($id);
        $realtime_notification->restore();

        return redirect()->route('admin.realtime_notifications.index');
    }

    /**
     * Permanently delete RealtimeNotification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('realtime_notification_delete')) {
            return abort(401);
        }
        $realtime_notification = RealtimeNotification::onlyTrashed()->findOrFail($id);
        $realtime_notification->forceDelete();

        return redirect()->route('admin.realtime_notifications.index');
    }
}

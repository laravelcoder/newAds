<?php

namespace App\Http\Controllers\Admin;

use App\ChannelServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelServersRequest;
use App\Http\Requests\Admin\UpdateChannelServersRequest;

class ChannelServersController extends Controller
{
    /**
     * Display a listing of ChannelServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('channel_server_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('channel_server_delete')) {
                return abort(401);
            }
            $channel_servers = ChannelServer::onlyTrashed()->get();
        } else {
            $channel_servers = ChannelServer::all();
        }

        return view('admin.channel_servers.index', compact('channel_servers'));
    }

    /**
     * Show the form for creating new ChannelServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }
        return view('admin.channel_servers.create');
    }

    /**
     * Store a newly created ChannelServer in storage.
     *
     * @param  \App\Http\Requests\StoreChannelServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelServersRequest $request)
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }
        $channel_server = ChannelServer::create($request->all());

        foreach ($request->input('csos', []) as $data) {
            $channel_server->csos()->create($data);
        }


        return redirect()->route('admin.channel_servers.index');
    }


    /**
     * Show the form for editing ChannelServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.edit', compact('channel_server'));
    }

    /**
     * Update ChannelServer in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelServersRequest $request, $id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->update($request->all());

        $csos           = $channel_server->csos;
        $currentCsoData = [];
        foreach ($request->input('csos', []) as $index => $data) {
            if (is_integer($index)) {
                $channel_server->csos()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentCsoData[$id] = $data;
            }
        }
        foreach ($csos as $item) {
            if (isset($currentCsoData[$item->id])) {
                $item->update($currentCsoData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.channel_servers.index');
    }


    /**
     * Display ChannelServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channel_server_view')) {
            return abort(401);
        }
        $csis = \App\Csi::where('channel_server_id', $id)->get();$csos = \App\Cso::where('channel_server_id', $id)->get();

        $channel_server = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.show', compact('channel_server', 'csis', 'csos'));
    }


    /**
     * Remove ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->delete();

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Delete all selected ChannelServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ChannelServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::onlyTrashed()->findOrFail($id);
        $channel_server->restore();

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Permanently delete ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::onlyTrashed()->findOrFail($id);
        $channel_server->forceDelete();

        return redirect()->route('admin.channel_servers.index');
    }
}

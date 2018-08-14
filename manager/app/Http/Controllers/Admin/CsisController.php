<?php

namespace App\Http\Controllers\Admin;

use App\Csi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsisRequest;
use App\Http\Requests\Admin\UpdateCsisRequest;

class CsisController extends Controller
{
    /**
     * Display a listing of Csi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('csi_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('csi_delete')) {
                return abort(401);
            }
            $csis = Csi::onlyTrashed()->get();
        } else {
            $csis = Csi::all();
        }

        return view('admin.csis.index', compact('csis'));
    }

    /**
     * Show the form for creating new Csi.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('csi_create')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.csis.create', compact('channel_servers', 'channels', 'protocols'));
    }

    /**
     * Store a newly created Csi in storage.
     *
     * @param  \App\Http\Requests\StoreCsisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsisRequest $request)
    {
        if (! Gate::allows('csi_create')) {
            return abort(401);
        }
        $csi = Csi::create($request->all());



        return redirect()->route('admin.csis.index');
    }


    /**
     * Show the form for editing Csi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('csi_edit')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');

        $csi = Csi::findOrFail($id);

        return view('admin.csis.edit', compact('csi', 'channel_servers', 'channels', 'protocols'));
    }

    /**
     * Update Csi in storage.
     *
     * @param  \App\Http\Requests\UpdateCsisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsisRequest $request, $id)
    {
        if (! Gate::allows('csi_edit')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);
        $csi->update($request->all());



        return redirect()->route('admin.csis.index');
    }


    /**
     * Display Csi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('csi_view')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);

        return view('admin.csis.show', compact('csi'));
    }


    /**
     * Remove Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);
        $csi->delete();

        return redirect()->route('admin.csis.index');
    }

    /**
     * Delete all selected Csi at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Csi::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::onlyTrashed()->findOrFail($id);
        $csi->restore();

        return redirect()->route('admin.csis.index');
    }

    /**
     * Permanently delete Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::onlyTrashed()->findOrFail($id);
        $csi->forceDelete();

        return redirect()->route('admin.csis.index');
    }
}

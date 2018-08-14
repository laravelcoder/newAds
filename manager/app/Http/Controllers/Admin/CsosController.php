<?php

namespace App\Http\Controllers\Admin;

use App\Cso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsosRequest;
use App\Http\Requests\Admin\UpdateCsosRequest;

class CsosController extends Controller
{
    /**
     * Display a listing of Cso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cso_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('cso_delete')) {
                return abort(401);
            }
            $csos = Cso::onlyTrashed()->get();
        } else {
            $csos = Cso::all();
        }

        return view('admin.csos.index', compact('csos'));
    }

    /**
     * Show the form for creating new Cso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cso_create')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $cids = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.csos.create', compact('channel_servers', 'cids'));
    }

    /**
     * Store a newly created Cso in storage.
     *
     * @param  \App\Http\Requests\StoreCsosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsosRequest $request)
    {
        if (! Gate::allows('cso_create')) {
            return abort(401);
        }
        $cso = Cso::create($request->all());



        return redirect()->route('admin.csos.index');
    }


    /**
     * Show the form for editing Cso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cso_edit')) {
            return abort(401);
        }
        
        $channel_servers = \App\ChannelServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $cids = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');

        $cso = Cso::findOrFail($id);

        return view('admin.csos.edit', compact('cso', 'channel_servers', 'cids'));
    }

    /**
     * Update Cso in storage.
     *
     * @param  \App\Http\Requests\UpdateCsosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsosRequest $request, $id)
    {
        if (! Gate::allows('cso_edit')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);
        $cso->update($request->all());



        return redirect()->route('admin.csos.index');
    }


    /**
     * Display Cso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cso_view')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);

        return view('admin.csos.show', compact('cso'));
    }


    /**
     * Remove Cso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);
        $cso->delete();

        return redirect()->route('admin.csos.index');
    }

    /**
     * Delete all selected Cso at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cso::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Cso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::onlyTrashed()->findOrFail($id);
        $cso->restore();

        return redirect()->route('admin.csos.index');
    }

    /**
     * Permanently delete Cso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::onlyTrashed()->findOrFail($id);
        $cso->forceDelete();

        return redirect()->route('admin.csos.index');
    }
}

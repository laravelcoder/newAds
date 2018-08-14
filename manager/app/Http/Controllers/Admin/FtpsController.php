<?php

namespace App\Http\Controllers\Admin;

use App\Ftp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFtpsRequest;
use App\Http\Requests\Admin\UpdateFtpsRequest;

class FtpsController extends Controller
{
    /**
     * Display a listing of Ftp.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ftp_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('ftp_delete')) {
                return abort(401);
            }
            $ftps = Ftp::onlyTrashed()->get();
        } else {
            $ftps = Ftp::all();
        }

        return view('admin.ftps.index', compact('ftps'));
    }

    /**
     * Show the form for creating new Ftp.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ftp_create')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.ftps.create', compact('sync_servers'));
    }

    /**
     * Store a newly created Ftp in storage.
     *
     * @param  \App\Http\Requests\StoreFtpsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFtpsRequest $request)
    {
        if (! Gate::allows('ftp_create')) {
            return abort(401);
        }
        $ftp = Ftp::create($request->all());



        return redirect()->route('admin.ftps.index');
    }


    /**
     * Show the form for editing Ftp.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ftp_edit')) {
            return abort(401);
        }
        
        $sync_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $ftp = Ftp::findOrFail($id);

        return view('admin.ftps.edit', compact('ftp', 'sync_servers'));
    }

    /**
     * Update Ftp in storage.
     *
     * @param  \App\Http\Requests\UpdateFtpsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFtpsRequest $request, $id)
    {
        if (! Gate::allows('ftp_edit')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);
        $ftp->update($request->all());



        return redirect()->route('admin.ftps.index');
    }


    /**
     * Display Ftp.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ftp_view')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);

        return view('admin.ftps.show', compact('ftp'));
    }


    /**
     * Remove Ftp from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        $ftp = Ftp::findOrFail($id);
        $ftp->delete();

        return redirect()->route('admin.ftps.index');
    }

    /**
     * Delete all selected Ftp at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ftp::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Ftp from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        $ftp = Ftp::onlyTrashed()->findOrFail($id);
        $ftp->restore();

        return redirect()->route('admin.ftps.index');
    }

    /**
     * Permanently delete Ftp from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ftp_delete')) {
            return abort(401);
        }
        $ftp = Ftp::onlyTrashed()->findOrFail($id);
        $ftp->forceDelete();

        return redirect()->route('admin.ftps.index');
    }
}

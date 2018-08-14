<?php

namespace App\Http\Controllers\Admin;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelsRequest;
use App\Http\Requests\Admin\UpdateChannelsRequest;

class ChannelsController extends Controller
{
    /**
     * Display a listing of Channel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('channel_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('channel_delete')) {
                return abort(401);
            }
            $channels = Channel::onlyTrashed()->get();
        } else {
            $channels = Channel::all();
        }

        return view('admin.channels.index', compact('channels'));
    }

    /**
     * Show the form for creating new Channel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('channel_create')) {
            return abort(401);
        }        $enum_type = Channel::$enum_type;
            
        return view('admin.channels.create', compact('enum_type'));
    }

    /**
     * Store a newly created Channel in storage.
     *
     * @param  \App\Http\Requests\StoreChannelsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelsRequest $request)
    {
        if (! Gate::allows('channel_create')) {
            return abort(401);
        }
        $channel = Channel::create($request->all());



        return redirect()->route('admin.channels.index');
    }


    /**
     * Show the form for editing Channel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('channel_edit')) {
            return abort(401);
        }        $enum_type = Channel::$enum_type;
            
        $channel = Channel::findOrFail($id);

        return view('admin.channels.edit', compact('channel', 'enum_type'));
    }

    /**
     * Update Channel in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelsRequest $request, $id)
    {
        if (! Gate::allows('channel_edit')) {
            return abort(401);
        }
        $channel = Channel::findOrFail($id);
        $channel->update($request->all());



        return redirect()->route('admin.channels.index');
    }


    /**
     * Display Channel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channel_view')) {
            return abort(401);
        }
        $csos = \App\Cso::where('cid_id', $id)->get();$csis = \App\Csi::where('channel_id', $id)->get();

        $channel = Channel::findOrFail($id);

        return view('admin.channels.show', compact('channel', 'csos', 'csis'));
    }


    /**
     * Remove Channel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        $channel = Channel::findOrFail($id);
        $channel->delete();

        return redirect()->route('admin.channels.index');
    }

    /**
     * Delete all selected Channel at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Channel::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Channel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        $channel = Channel::onlyTrashed()->findOrFail($id);
        $channel->restore();

        return redirect()->route('admin.channels.index');
    }

    /**
     * Permanently delete Channel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        $channel = Channel::onlyTrashed()->findOrFail($id);
        $channel->forceDelete();

        return redirect()->route('admin.channels.index');
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\ChannelServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelServersRequest;
use App\Http\Requests\Admin\UpdateChannelServersRequest;

class ChannelServersController extends Controller
{
    public function index()
    {
        return ChannelServer::all();
    }

    public function show($id)
    {
        return ChannelServer::findOrFail($id);
    }

    public function update(UpdateChannelServersRequest $request, $id)
    {
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

        return $channel_server;
    }

    public function store(StoreChannelServersRequest $request)
    {
        $channel_server = ChannelServer::create($request->all());
        
        foreach ($request->input('csos', []) as $data) {
            $channel_server->csos()->create($data);
        }

        return $channel_server;
    }

    public function destroy($id)
    {
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->delete();
        return '';
    }
}

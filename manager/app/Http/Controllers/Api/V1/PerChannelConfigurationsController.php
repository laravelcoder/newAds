<?php

namespace App\Http\Controllers\Api\V1;

use App\PerChannelConfiguration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePerChannelConfigurationsRequest;
use App\Http\Requests\Admin\UpdatePerChannelConfigurationsRequest;

class PerChannelConfigurationsController extends Controller
{
    public function index()
    {
        return PerChannelConfiguration::all();
    }

    public function show($id)
    {
        return PerChannelConfiguration::findOrFail($id);
    }

    public function update(UpdatePerChannelConfigurationsRequest $request, $id)
    {
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);
        $per_channel_configuration->update($request->all());
        

        return $per_channel_configuration;
    }

    public function store(StorePerChannelConfigurationsRequest $request)
    {
        $per_channel_configuration = PerChannelConfiguration::create($request->all());
        

        return $per_channel_configuration;
    }

    public function destroy($id)
    {
        $per_channel_configuration = PerChannelConfiguration::findOrFail($id);
        $per_channel_configuration->delete();
        return '';
    }
}

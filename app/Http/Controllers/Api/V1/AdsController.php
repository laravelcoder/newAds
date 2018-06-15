<?php

namespace App\Http\Controllers\Api\V1;

use App\Ad;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdsRequest;
use App\Http\Requests\Admin\UpdateAdsRequest;

class AdsController extends Controller
{
    public function index()
    {
        return Ad::all();
    }

    public function show($id)
    {
        return Ad::findOrFail($id);
    }

    public function update(UpdateAdsRequest $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

        return $ad;
    }

    public function store(StoreAdsRequest $request)
    {
        $ad = Ad::create($request->all());

        return $ad;
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return '';
    }
}
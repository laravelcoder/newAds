<?php

namespace App\Http\Controllers\Api\V1;

use App\Csi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsisRequest;
use App\Http\Requests\Admin\UpdateCsisRequest;

class CsisController extends Controller
{
    public function index()
    {
        return Csi::all();
    }

    public function show($id)
    {
        return Csi::findOrFail($id);
    }

    public function update(UpdateCsisRequest $request, $id)
    {
        $csi = Csi::findOrFail($id);
        $csi->update($request->all());
        

        return $csi;
    }

    public function store(StoreCsisRequest $request)
    {
        $csi = Csi::create($request->all());
        

        return $csi;
    }

    public function destroy($id)
    {
        $csi = Csi::findOrFail($id);
        $csi->delete();
        return '';
    }
}

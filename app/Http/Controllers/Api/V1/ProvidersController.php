<?php

namespace App\Http\Controllers\Api\V1;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProvidersRequest;
use App\Http\Requests\Admin\UpdateProvidersRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProvidersController extends Controller
{
    public function index()
    {
        return Provider::all();
    }

    public function show($id)
    {
        return Provider::findOrFail($id);
    }

    public function update(UpdateProvidersRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $provider->update($request->all());
        

        return $provider;
    }

    public function store(StoreProvidersRequest $request)
    {
        $provider = Provider::create($request->all());
        

        return $provider;
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();
        return '';
    }
}

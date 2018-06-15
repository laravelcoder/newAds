<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class NetworksController extends Controller
{
    public function index()
    {
        if (!Gate::allows('network_access')) {
            return abort(401);
        }

        return view('admin.networks.index');
    }
}

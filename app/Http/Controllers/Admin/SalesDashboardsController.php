<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SalesDashboardsController extends Controller
{
    public function index()
    {
        if (!Gate::allows('sales_dashboard_access')) {
            return abort(401);
        }

        return view('admin.sales_dashboards.index');
    }
}

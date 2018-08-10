<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class SalesDashboardsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('sales_dashboard_access')) {
            return abort(401);
        }
        return view('admin.sales_dashboards.index');
    }
}

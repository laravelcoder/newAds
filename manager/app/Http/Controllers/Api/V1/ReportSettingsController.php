<?php

namespace App\Http\Controllers\Api\V1;

use App\ReportSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReportSettingsRequest;
use App\Http\Requests\Admin\UpdateReportSettingsRequest;

class ReportSettingsController extends Controller
{
    public function index()
    {
        return ReportSetting::all();
    }

    public function show($id)
    {
        return ReportSetting::findOrFail($id);
    }

    public function update(UpdateReportSettingsRequest $request, $id)
    {
        $report_setting = ReportSetting::findOrFail($id);
        $report_setting->update($request->all());
        

        return $report_setting;
    }

    public function store(StoreReportSettingsRequest $request)
    {
        $report_setting = ReportSetting::create($request->all());
        

        return $report_setting;
    }

    public function destroy($id)
    {
        $report_setting = ReportSetting::findOrFail($id);
        $report_setting->delete();
        return '';
    }
}

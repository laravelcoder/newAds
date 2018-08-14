<?php

namespace App\Http\Controllers\Admin;

use App\ReportSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReportSettingsRequest;
use App\Http\Requests\Admin\UpdateReportSettingsRequest;

class ReportSettingsController extends Controller
{
    /**
     * Display a listing of ReportSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('report_setting_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('report_setting_delete')) {
                return abort(401);
            }
            $report_settings = ReportSetting::onlyTrashed()->get();
        } else {
            $report_settings = ReportSetting::all();
        }

        return view('admin.report_settings.index', compact('report_settings'));
    }

    /**
     * Show the form for creating new ReportSetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('report_setting_create')) {
            return abort(401);
        }
        
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $synce_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $filters = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.report_settings.create', compact('countries', 'synce_servers', 'filters'));
    }

    /**
     * Store a newly created ReportSetting in storage.
     *
     * @param  \App\Http\Requests\StoreReportSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportSettingsRequest $request)
    {
        if (! Gate::allows('report_setting_create')) {
            return abort(401);
        }
        $report_setting = ReportSetting::create($request->all());



        return redirect()->route('admin.report_settings.index');
    }


    /**
     * Show the form for editing ReportSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('report_setting_edit')) {
            return abort(401);
        }
        
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $synce_servers = \App\SyncServer::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $filters = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $report_setting = ReportSetting::findOrFail($id);

        return view('admin.report_settings.edit', compact('report_setting', 'countries', 'synce_servers', 'filters'));
    }

    /**
     * Update ReportSetting in storage.
     *
     * @param  \App\Http\Requests\UpdateReportSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportSettingsRequest $request, $id)
    {
        if (! Gate::allows('report_setting_edit')) {
            return abort(401);
        }
        $report_setting = ReportSetting::findOrFail($id);
        $report_setting->update($request->all());



        return redirect()->route('admin.report_settings.index');
    }


    /**
     * Display ReportSetting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('report_setting_view')) {
            return abort(401);
        }
        $report_setting = ReportSetting::findOrFail($id);

        return view('admin.report_settings.show', compact('report_setting'));
    }


    /**
     * Remove ReportSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        $report_setting = ReportSetting::findOrFail($id);
        $report_setting->delete();

        return redirect()->route('admin.report_settings.index');
    }

    /**
     * Delete all selected ReportSetting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ReportSetting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ReportSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        $report_setting = ReportSetting::onlyTrashed()->findOrFail($id);
        $report_setting->restore();

        return redirect()->route('admin.report_settings.index');
    }

    /**
     * Permanently delete ReportSetting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('report_setting_delete')) {
            return abort(401);
        }
        $report_setting = ReportSetting::onlyTrashed()->findOrFail($id);
        $report_setting->forceDelete();

        return redirect()->route('admin.report_settings.index');
    }
}

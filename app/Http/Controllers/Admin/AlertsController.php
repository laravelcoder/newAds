<?php

namespace App\Http\Controllers\Admin;

use App\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAlertsRequest;
use App\Http\Requests\Admin\UpdateAlertsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class AlertsController extends Controller
{
    /**
     * Display a listing of Alert.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('alert_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Alert::query();
            $query->with('contact');
            $query->with('user');
            $template = 'actionsTemplate';

            $query->select([
                'alerts.id',
                'alerts.title',
                'alerts.content',
                'alerts.alert_type',
                'alerts.contact_id',
                'alerts.user_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey = 'alert_';
                $routeKey = 'admin.alerts';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('content', function ($row) {
                return $row->content ? $row->content : '';
            });
            $table->editColumn('alert_type', function ($row) {
                return $row->alert_type ? $row->alert_type : '';
            });
            $table->editColumn('contact.first_name', function ($row) {
                return $row->contact ? $row->contact->first_name : '';
            });
            $table->editColumn('user.name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'massDelete']);

            return $table->make(true);
        }

        return view('admin.alerts.index');
    }

    /**
     * Show the form for creating new Alert.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('alert_create')) {
            return abort(401);
        }

        $contacts = \App\Contact::get()->pluck('first_name', 'id')->prepend(trans('global.app_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_alert_type = Alert::$enum_alert_type;

        return view('admin.alerts.create', compact('enum_alert_type', 'contacts', 'users'));
    }

    /**
     * Store a newly created Alert in storage.
     *
     * @param \App\Http\Requests\StoreAlertsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlertsRequest $request)
    {
        if (!Gate::allows('alert_create')) {
            return abort(401);
        }
        $alert = Alert::create($request->all());

        return redirect()->route('admin.alerts.index');
    }

    /**
     * Show the form for editing Alert.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('alert_edit')) {
            return abort(401);
        }

        $contacts = \App\Contact::get()->pluck('first_name', 'id')->prepend(trans('global.app_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_alert_type = Alert::$enum_alert_type;

        $alert = Alert::findOrFail($id);

        return view('admin.alerts.edit', compact('alert', 'enum_alert_type', 'contacts', 'users'));
    }

    /**
     * Update Alert in storage.
     *
     * @param \App\Http\Requests\UpdateAlertsRequest $request
     * @param int                                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlertsRequest $request, $id)
    {
        if (!Gate::allows('alert_edit')) {
            return abort(401);
        }
        $alert = Alert::findOrFail($id);
        $alert->update($request->all());

        return redirect()->route('admin.alerts.index');
    }

    /**
     * Display Alert.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('alert_view')) {
            return abort(401);
        }
        $alert = Alert::findOrFail($id);

        return view('admin.alerts.show', compact('alert'));
    }

    /**
     * Remove Alert from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('alert_delete')) {
            return abort(401);
        }
        $alert = Alert::findOrFail($id);
        $alert->delete();

        return redirect()->route('admin.alerts.index');
    }

    /**
     * Delete all selected Alert at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('alert_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Alert::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}

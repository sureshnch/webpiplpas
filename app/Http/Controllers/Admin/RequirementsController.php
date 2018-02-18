<?php

namespace App\Http\Controllers\Admin;

use App\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequirementsRequest;
use App\Http\Requests\Admin\UpdateRequirementsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RequirementsController extends Controller
{
    /**
     * Display a listing of Requirement.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Requirement.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Requirement.filter', 'my');
            }
        }

        
        if (request()->ajax()) {
            $query = Requirement::query();
            $query->with("assigned_to_users");
            $query->with("created_by");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'requirements.id',
                'requirements.customer_name',
                'requirements.job_id',
                'requirements.job_title',
                'requirements.job_type',
                'requirements.description',
                'requirements.location',
                'requirements.department',
                'requirements.industry',
                'requirements.job_function',
                'requirements.closing_date',
                'requirements.positions',
                'requirements.skills',
                'requirements.experience_from_years',
                'requirements.experience_from_months',
                'requirements.experience_to_years',
                'requirements.experience_to_months',
                'requirements.salary_range',
                'requirements.availabity',
                'requirements.referal_fee',
                'requirements.point_of_contact',
                'requirements.email',
                'requirements.code',
                'requirements.phone_number',
                'requirements.skype_id',
                'requirements.comment_box',
                'requirements.created_by_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'requirement_';
                $routeKey = 'admin.requirements';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('customer_name', function ($row) {
                return $row->customer_name ? $row->customer_name : '';
            });
            $table->editColumn('job_id', function ($row) {
                return $row->job_id ? $row->job_id : '';
            });
            $table->editColumn('job_title', function ($row) {
                return $row->job_title ? $row->job_title : '';
            });
            $table->editColumn('job_type', function ($row) {
                return $row->job_type ? $row->job_type : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : '';
            });
            $table->editColumn('department', function ($row) {
                return $row->department ? $row->department : '';
            });
            $table->editColumn('industry', function ($row) {
                return $row->industry ? $row->industry : '';
            });
            $table->editColumn('job_function', function ($row) {
                return $row->job_function ? $row->job_function : '';
            });
            $table->editColumn('closing_date', function ($row) {
                return $row->closing_date ? $row->closing_date : '';
            });
            $table->editColumn('positions', function ($row) {
                return $row->positions ? $row->positions : '';
            });
            $table->editColumn('skills', function ($row) {
                return $row->skills ? $row->skills : '';
            });
            $table->editColumn('experience_from_years', function ($row) {
                return $row->experience_from_years ? $row->experience_from_years : '';
            });
            $table->editColumn('experience_from_months', function ($row) {
                return $row->experience_from_months ? $row->experience_from_months : '';
            });
            $table->editColumn('experience_to_years', function ($row) {
                return $row->experience_to_years ? $row->experience_to_years : '';
            });
            $table->editColumn('experience_to_months', function ($row) {
                return $row->experience_to_months ? $row->experience_to_months : '';
            });
            $table->editColumn('salary_range', function ($row) {
                return $row->salary_range ? $row->salary_range : '';
            });
            $table->editColumn('availabity', function ($row) {
                return $row->availabity ? $row->availabity : '';
            });
            $table->editColumn('referal_fee', function ($row) {
                return $row->referal_fee ? $row->referal_fee : '';
            });
            $table->editColumn('point_of_contact', function ($row) {
                return $row->point_of_contact ? $row->point_of_contact : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('skype_id', function ($row) {
                return $row->skype_id ? $row->skype_id : '';
            });
            $table->editColumn('assigned_to_users.name', function ($row) {
                if(count($row->assigned_to_users) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->assigned_to_users->pluck('name')->toArray()) . '</span>';
            });
            $table->editColumn('comment_box', function ($row) {
                return $row->comment_box ? $row->comment_box : '';
            });
            $table->editColumn('created_by.name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions','assigned_to_users.name']);

            return $table->make(true);
        }

        return view('admin.requirements.index');
    }

    /**
     * Show the form for creating new Requirement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $assigned_to_users = \App\User::get()->pluck('name', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_customer_name = Requirement::$enum_customer_name;
                    $enum_job_type = Requirement::$enum_job_type;
                    $enum_location = Requirement::$enum_location;
                    $enum_department = Requirement::$enum_department;
                    $enum_industry = Requirement::$enum_industry;
                    $enum_job_function = Requirement::$enum_job_function;
                    $enum_experience_from_years = Requirement::$enum_experience_from_years;
                    $enum_experience_from_months = Requirement::$enum_experience_from_months;
                    $enum_experience_to_years = Requirement::$enum_experience_to_years;
                    $enum_experience_to_months = Requirement::$enum_experience_to_months;
                    $enum_salary_range = Requirement::$enum_salary_range;
                    $enum_availabity = Requirement::$enum_availabity;
            
        return view('admin.requirements.create', compact('enum_customer_name', 'enum_job_type', 'enum_location', 'enum_department', 'enum_industry', 'enum_job_function', 'enum_experience_from_years', 'enum_experience_from_months', 'enum_experience_to_years', 'enum_experience_to_months', 'enum_salary_range', 'enum_availabity', 'assigned_to_users', 'created_bies'));
    }

    /**
     * Store a newly created Requirement in storage.
     *
     * @param  \App\Http\Requests\StoreRequirementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequirementsRequest $request)
    {
        $requirement = Requirement::create($request->all());
        $requirement->assigned_to_users()->sync(array_filter((array)$request->input('assigned_to_users')));



        return redirect()->route('admin.requirements.index');
    }


    /**
     * Show the form for editing Requirement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $assigned_to_users = \App\User::get()->pluck('name', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_customer_name = Requirement::$enum_customer_name;
                    $enum_job_type = Requirement::$enum_job_type;
                    $enum_location = Requirement::$enum_location;
                    $enum_department = Requirement::$enum_department;
                    $enum_industry = Requirement::$enum_industry;
                    $enum_job_function = Requirement::$enum_job_function;
                    $enum_experience_from_years = Requirement::$enum_experience_from_years;
                    $enum_experience_from_months = Requirement::$enum_experience_from_months;
                    $enum_experience_to_years = Requirement::$enum_experience_to_years;
                    $enum_experience_to_months = Requirement::$enum_experience_to_months;
                    $enum_salary_range = Requirement::$enum_salary_range;
                    $enum_availabity = Requirement::$enum_availabity;
            
        $requirement = Requirement::findOrFail($id);

        return view('admin.requirements.edit', compact('requirement', 'enum_customer_name', 'enum_job_type', 'enum_location', 'enum_department', 'enum_industry', 'enum_job_function', 'enum_experience_from_years', 'enum_experience_from_months', 'enum_experience_to_years', 'enum_experience_to_months', 'enum_salary_range', 'enum_availabity', 'assigned_to_users', 'created_bies'));
    }

    /**
     * Update Requirement in storage.
     *
     * @param  \App\Http\Requests\UpdateRequirementsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequirementsRequest $request, $id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->update($request->all());
        $requirement->assigned_to_users()->sync(array_filter((array)$request->input('assigned_to_users')));



        return redirect()->route('admin.requirements.index');
    }


    /**
     * Display Requirement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requirement = Requirement::findOrFail($id);

        return view('admin.requirements.show', compact('requirement'));
    }


    /**
     * Remove Requirement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->delete();

        return redirect()->route('admin.requirements.index');
    }

    /**
     * Delete all selected Requirement at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Requirement::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Requirement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $requirement = Requirement::onlyTrashed()->findOrFail($id);
        $requirement->restore();

        return redirect()->route('admin.requirements.index');
    }

    /**
     * Permanently delete Requirement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $requirement = Requirement::onlyTrashed()->findOrFail($id);
        $requirement->forceDelete();

        return redirect()->route('admin.requirements.index');
    }
}

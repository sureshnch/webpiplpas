<?php

namespace App\Http\Controllers\Admin;

use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResumesRequest;
use App\Http\Requests\Admin\UpdateResumesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ResumesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Resume.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Resume.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Resume.filter', 'my');
            }
        }

        
        if (request()->ajax()) {
            $query = Resume::query();
            $query->with("created_by");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'resumes.id',
                'resumes.first_name',
                'resumes.last_name',
                'resumes.email',
                'resumes.code',
                'resumes.mobile_number',
                'resumes.pancard',
                'resumes.address',
                'resumes.city',
                'resumes.state',
                'resumes.country',
                'resumes.educational_qualification',
                'resumes.primary_skills',
                'resumes.sub_skills',
                'resumes.work_experience_years',
                'resumes.work_experience_months',
                'resumes.relevant_experience',
                'resumes.notice_period',
                'resumes.prefered_location',
                'resumes.current_ctc_lacks',
                'resumes.current_ctc_thousands',
                'resumes.expected_ctc_lacks',
                'resumes.expected_ctc_thousands',
                'resumes.upload_resume',
                'resumes.comment_box',
                'resumes.created_by_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'resume_';
                $routeKey = 'admin.resumes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('mobile_number', function ($row) {
                return $row->mobile_number ? $row->mobile_number : '';
            });
            $table->editColumn('pancard', function ($row) {
                return $row->pancard ? $row->pancard : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('educational_qualification', function ($row) {
                return $row->educational_qualification ? $row->educational_qualification : '';
            });
            $table->editColumn('primary_skills', function ($row) {
                return $row->primary_skills ? $row->primary_skills : '';
            });
            $table->editColumn('sub_skills', function ($row) {
                return $row->sub_skills ? $row->sub_skills : '';
            });
            $table->editColumn('work_experience_years', function ($row) {
                return $row->work_experience_years ? $row->work_experience_years : '';
            });
            $table->editColumn('work_experience_months', function ($row) {
                return $row->work_experience_months ? $row->work_experience_months : '';
            });
            $table->editColumn('relevant_experience', function ($row) {
                return $row->relevant_experience ? $row->relevant_experience : '';
            });
            $table->editColumn('notice_period', function ($row) {
                return $row->notice_period ? $row->notice_period : '';
            });
            $table->editColumn('prefered_location', function ($row) {
                return $row->prefered_location ? $row->prefered_location : '';
            });
            $table->editColumn('current_ctc_lacks', function ($row) {
                return $row->current_ctc_lacks ? $row->current_ctc_lacks : '';
            });
            $table->editColumn('current_ctc_thousands', function ($row) {
                return $row->current_ctc_thousands ? $row->current_ctc_thousands : '';
            });
            $table->editColumn('expected_ctc_lacks', function ($row) {
                return $row->expected_ctc_lacks ? $row->expected_ctc_lacks : '';
            });
            $table->editColumn('expected_ctc_thousands', function ($row) {
                return $row->expected_ctc_thousands ? $row->expected_ctc_thousands : '';
            });
            $table->editColumn('upload_resume', function ($row) {
                if($row->upload_resume) { return '<a href="'.asset(env('UPLOAD_PATH').'/'.$row->upload_resume) .'" target="_blank">Download file</a>'; };
            });
            $table->editColumn('comment_box', function ($row) {
                return $row->comment_box ? $row->comment_box : '';
            });
            $table->editColumn('created_by.name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions','upload_resume']);

            return $table->make(true);
        }

        return view('admin.resumes.index');
    }

    /**
     * Show the form for creating new Resume.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_primary_skills = Resume::$enum_primary_skills;
                    $enum_work_experience_years = Resume::$enum_work_experience_years;
                    $enum_work_experience_months = Resume::$enum_work_experience_months;
                    $enum_current_ctc_lacks = Resume::$enum_current_ctc_lacks;
                    $enum_current_ctc_thousands = Resume::$enum_current_ctc_thousands;
                    $enum_expected_ctc_lacks = Resume::$enum_expected_ctc_lacks;
                    $enum_expected_ctc_thousands = Resume::$enum_expected_ctc_thousands;
            
        return view('admin.resumes.create', compact('enum_primary_skills', 'enum_work_experience_years', 'enum_work_experience_months', 'enum_current_ctc_lacks', 'enum_current_ctc_thousands', 'enum_expected_ctc_lacks', 'enum_expected_ctc_thousands', 'created_bies'));
    }

    /**
     * Store a newly created Resume in storage.
     *
     * @param  \App\Http\Requests\StoreResumesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResumesRequest $request)
    {
        $request = $this->saveFiles($request);
        $resume = Resume::create($request->all());



        return redirect()->route('admin.resumes.index');
    }


    /**
     * Show the form for editing Resume.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_primary_skills = Resume::$enum_primary_skills;
                    $enum_work_experience_years = Resume::$enum_work_experience_years;
                    $enum_work_experience_months = Resume::$enum_work_experience_months;
                    $enum_current_ctc_lacks = Resume::$enum_current_ctc_lacks;
                    $enum_current_ctc_thousands = Resume::$enum_current_ctc_thousands;
                    $enum_expected_ctc_lacks = Resume::$enum_expected_ctc_lacks;
                    $enum_expected_ctc_thousands = Resume::$enum_expected_ctc_thousands;
            
        $resume = Resume::findOrFail($id);

        return view('admin.resumes.edit', compact('resume', 'enum_primary_skills', 'enum_work_experience_years', 'enum_work_experience_months', 'enum_current_ctc_lacks', 'enum_current_ctc_thousands', 'enum_expected_ctc_lacks', 'enum_expected_ctc_thousands', 'created_bies'));
    }

    /**
     * Update Resume in storage.
     *
     * @param  \App\Http\Requests\UpdateResumesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResumesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $resume = Resume::findOrFail($id);
        $resume->update($request->all());



        return redirect()->route('admin.resumes.index');
    }


    /**
     * Display Resume.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resume = Resume::findOrFail($id);

        return view('admin.resumes.show', compact('resume'));
    }


    /**
     * Remove Resume from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
        $resume->delete();

        return redirect()->route('admin.resumes.index');
    }

    /**
     * Delete all selected Resume at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Resume::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Resume from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $resume = Resume::onlyTrashed()->findOrFail($id);
        $resume->restore();

        return redirect()->route('admin.resumes.index');
    }

    /**
     * Permanently delete Resume from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $resume = Resume::onlyTrashed()->findOrFail($id);
        $resume->forceDelete();

        return redirect()->route('admin.resumes.index');
    }
}

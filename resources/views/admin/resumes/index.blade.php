@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.resumes.title')</h3>
    @can('resume_create')
    <p>
        <a href="{{ route('admin.resumes.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Resume'])
        
        @if(!is_null(Auth::getUser()->role_id) && config('global.can_see_all_records_role_id') == Auth::getUser()->role_id)
            @if(Session::get('Resume.filter', 'all') == 'my')
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            @else
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            @endif
        @endif
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.resumes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.resumes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('resume_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('resume_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.resumes.fields.first-name')</th>
                        <th>@lang('global.resumes.fields.last-name')</th>
                        <th>@lang('global.resumes.fields.email')</th>
                        <th>@lang('global.resumes.fields.code')</th>
                        <th>@lang('global.resumes.fields.mobile-number')</th>
                        <th>@lang('global.resumes.fields.pancard')</th>
                        <th>@lang('global.resumes.fields.address')</th>
                        <th>@lang('global.resumes.fields.city')</th>
                        <th>@lang('global.resumes.fields.state')</th>
                        <th>@lang('global.resumes.fields.country')</th>
                        <th>@lang('global.resumes.fields.educational-qualification')</th>
                        <th>@lang('global.resumes.fields.primary-skills')</th>
                        <th>@lang('global.resumes.fields.sub-skills')</th>
                        <th>@lang('global.resumes.fields.work-experience-years')</th>
                        <th>@lang('global.resumes.fields.work-experience-months')</th>
                        <th>@lang('global.resumes.fields.relevant-experience')</th>
                        <th>@lang('global.resumes.fields.notice-period')</th>
                        <th>@lang('global.resumes.fields.prefered-location')</th>
                        <th>@lang('global.resumes.fields.current-ctc-lacks')</th>
                        <th>@lang('global.resumes.fields.current-ctc-thousands')</th>
                        <th>@lang('global.resumes.fields.expected-ctc-lacks')</th>
                        <th>@lang('global.resumes.fields.expected-ctc-thousands')</th>
                        <th>@lang('global.resumes.fields.upload-resume')</th>
                        <th>@lang('global.resumes.fields.comment-box')</th>
                        <th>@lang('global.resumes.fields.created-by')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('resume_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.resumes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.resumes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('resume_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'code', name: 'code'},
                {data: 'mobile_number', name: 'mobile_number'},
                {data: 'pancard', name: 'pancard'},
                {data: 'address', name: 'address'},
                {data: 'city', name: 'city'},
                {data: 'state', name: 'state'},
                {data: 'country', name: 'country'},
                {data: 'educational_qualification', name: 'educational_qualification'},
                {data: 'primary_skills', name: 'primary_skills'},
                {data: 'sub_skills', name: 'sub_skills'},
                {data: 'work_experience_years', name: 'work_experience_years'},
                {data: 'work_experience_months', name: 'work_experience_months'},
                {data: 'relevant_experience', name: 'relevant_experience'},
                {data: 'notice_period', name: 'notice_period'},
                {data: 'prefered_location', name: 'prefered_location'},
                {data: 'current_ctc_lacks', name: 'current_ctc_lacks'},
                {data: 'current_ctc_thousands', name: 'current_ctc_thousands'},
                {data: 'expected_ctc_lacks', name: 'expected_ctc_lacks'},
                {data: 'expected_ctc_thousands', name: 'expected_ctc_thousands'},
                {data: 'upload_resume', name: 'upload_resume'},
                {data: 'comment_box', name: 'comment_box'},
                {data: 'created_by.name', name: 'created_by.name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
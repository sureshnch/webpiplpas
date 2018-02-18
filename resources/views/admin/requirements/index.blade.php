@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.requirement.title')</h3>
    @can('requirement_create')
    <p>
        <a href="{{ route('admin.requirements.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Requirement'])
        
        @if(!is_null(Auth::getUser()->role_id) && config('global.can_see_all_records_role_id') == Auth::getUser()->role_id)
            @if(Session::get('Requirement.filter', 'all') == 'my')
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            @else
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            @endif
        @endif
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.requirements.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.requirements.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('requirement_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('requirement_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.requirement.fields.customer-name')</th>
                        <th>@lang('global.requirement.fields.job-id')</th>
                        <th>@lang('global.requirement.fields.job-title')</th>
                        <th>@lang('global.requirement.fields.job-type')</th>
                        <th>@lang('global.requirement.fields.description')</th>
                        <th>@lang('global.requirement.fields.location')</th>
                        <th>@lang('global.requirement.fields.department')</th>
                        <th>@lang('global.requirement.fields.industry')</th>
                        <th>@lang('global.requirement.fields.job-function')</th>
                        <th>@lang('global.requirement.fields.closing-date')</th>
                        <th>@lang('global.requirement.fields.positions')</th>
                        <th>@lang('global.requirement.fields.skills')</th>
                        <th>@lang('global.requirement.fields.experience-from-years')</th>
                        <th>@lang('global.requirement.fields.experience-from-months')</th>
                        <th>@lang('global.requirement.fields.experience-to-years')</th>
                        <th>@lang('global.requirement.fields.experience-to-months')</th>
                        <th>@lang('global.requirement.fields.salary-range')</th>
                        <th>@lang('global.requirement.fields.availabity')</th>
                        <th>@lang('global.requirement.fields.referal-fee')</th>
                        <th>@lang('global.requirement.fields.point-of-contact')</th>
                        <th>@lang('global.requirement.fields.email')</th>
                        <th>@lang('global.requirement.fields.code')</th>
                        <th>@lang('global.requirement.fields.phone-number')</th>
                        <th>@lang('global.requirement.fields.skype-id')</th>
                        <th>@lang('global.requirement.fields.assigned-to-users')</th>
                        <th>@lang('global.requirement.fields.comment-box')</th>
                        <th>@lang('global.requirement.fields.created-by')</th>
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
        @can('requirement_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.requirements.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.requirements.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('requirement_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'customer_name', name: 'customer_name'},
                {data: 'job_id', name: 'job_id'},
                {data: 'job_title', name: 'job_title'},
                {data: 'job_type', name: 'job_type'},
                {data: 'description', name: 'description'},
                {data: 'location', name: 'location'},
                {data: 'department', name: 'department'},
                {data: 'industry', name: 'industry'},
                {data: 'job_function', name: 'job_function'},
                {data: 'closing_date', name: 'closing_date'},
                {data: 'positions', name: 'positions'},
                {data: 'skills', name: 'skills'},
                {data: 'experience_from_years', name: 'experience_from_years'},
                {data: 'experience_from_months', name: 'experience_from_months'},
                {data: 'experience_to_years', name: 'experience_to_years'},
                {data: 'experience_to_months', name: 'experience_to_months'},
                {data: 'salary_range', name: 'salary_range'},
                {data: 'availabity', name: 'availabity'},
                {data: 'referal_fee', name: 'referal_fee'},
                {data: 'point_of_contact', name: 'point_of_contact'},
                {data: 'email', name: 'email'},
                {data: 'code', name: 'code'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'skype_id', name: 'skype_id'},
                {data: 'assigned_to_users.name', name: 'assigned_to_users.name'},
                {data: 'comment_box', name: 'comment_box'},
                {data: 'created_by.name', name: 'created_by.name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
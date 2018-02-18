@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.requirement.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.requirement.fields.customer-name')</th>
                            <td field-key='customer_name'>{{ $requirement->customer_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.job-id')</th>
                            <td field-key='job_id'>{{ $requirement->job_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.job-title')</th>
                            <td field-key='job_title'>{{ $requirement->job_title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.job-type')</th>
                            <td field-key='job_type'>{{ $requirement->job_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.description')</th>
                            <td field-key='description'>{!! $requirement->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.location')</th>
                            <td field-key='location'>{{ $requirement->location }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.department')</th>
                            <td field-key='department'>{{ $requirement->department }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.industry')</th>
                            <td field-key='industry'>{{ $requirement->industry }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.job-function')</th>
                            <td field-key='job_function'>{{ $requirement->job_function }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.closing-date')</th>
                            <td field-key='closing_date'>{{ $requirement->closing_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.positions')</th>
                            <td field-key='positions'>{{ $requirement->positions }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.skills')</th>
                            <td field-key='skills'>{{ $requirement->skills }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.experience-from-years')</th>
                            <td field-key='experience_from_years'>{{ $requirement->experience_from_years }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.experience-from-months')</th>
                            <td field-key='experience_from_months'>{{ $requirement->experience_from_months }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.experience-to-years')</th>
                            <td field-key='experience_to_years'>{{ $requirement->experience_to_years }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.experience-to-months')</th>
                            <td field-key='experience_to_months'>{{ $requirement->experience_to_months }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.salary-range')</th>
                            <td field-key='salary_range'>{{ $requirement->salary_range }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.availabity')</th>
                            <td field-key='availabity'>{{ $requirement->availabity }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.referal-fee')</th>
                            <td field-key='referal_fee'>{{ $requirement->referal_fee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.point-of-contact')</th>
                            <td field-key='point_of_contact'>{{ $requirement->point_of_contact }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.email')</th>
                            <td field-key='email'>{{ $requirement->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.code')</th>
                            <td field-key='code'>{{ $requirement->code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.phone-number')</th>
                            <td field-key='phone_number'>{{ $requirement->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.skype-id')</th>
                            <td field-key='skype_id'>{{ $requirement->skype_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.assigned-to-users')</th>
                            <td field-key='assigned_to_users'>
                                @foreach ($requirement->assigned_to_users as $singleAssignedToUsers)
                                    <span class="label label-info label-many">{{ $singleAssignedToUsers->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.comment-box')</th>
                            <td field-key='comment_box'>{!! $requirement->comment_box !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.requirement.fields.created-by')</th>
                            <td field-key='created_by'>{{ $requirement->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.requirements.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

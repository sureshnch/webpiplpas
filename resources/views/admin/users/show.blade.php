@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.role')</th>
                            <td field-key='role'>
                                @foreach ($user->role as $singleRole)
                                    <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.approved')</th>
                            <td field-key='approved'>{{ Form::checkbox("approved", 1, $user->approved == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.created-by')</th>
                            <td field-key='created_by'>{{ $user->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#permissions" aria-controls="permissions" role="tab" data-toggle="tab">Permissions</a></li>
<li role="presentation" class=""><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
<li role="presentation" class=""><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
<li role="presentation" class=""><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Tasks</a></li>
<li role="presentation" class=""><a href="#resumes" aria-controls="resumes" role="tab" data-toggle="tab">Resumes</a></li>
<li role="presentation" class=""><a href="#requirement" aria-controls="requirement" role="tab" data-toggle="tab">Requirements</a></li>
<li role="presentation" class=""><a href="#requirement" aria-controls="requirement" role="tab" data-toggle="tab">Requirements</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="permissions">
<table class="table table-bordered table-striped {{ count($permissions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.permissions.fields.title')</th>
                        <th>@lang('global.permissions.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($permissions) > 0)
            @foreach ($permissions as $permission)
                <tr data-entry-id="{{ $permission->id }}">
                    <td field-key='title'>{{ $permission->title }}</td>
                                <td field-key='created_by'>{{ $permission->created_by->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('permissions.show',[$permission->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['permissions.destroy', $permission->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="roles">
<table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.roles.fields.title')</th>
                        <th>@lang('global.roles.fields.permission')</th>
                        <th>@lang('global.roles.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($roles) > 0)
            @foreach ($roles as $role)
                <tr data-entry-id="{{ $role->id }}">
                    <td field-key='title'>{{ $role->title }}</td>
                                <td field-key='permission'>
                                    @foreach ($role->permission as $singlePermission)
                                        <span class="label label-info label-many">{{ $singlePermission->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='created_by'>{{ $role->created_by->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('roles.show',[$role->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['roles.destroy', $role->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="users">
<table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.users.fields.name')</th>
                        <th>@lang('global.users.fields.email')</th>
                        <th>@lang('global.users.fields.role')</th>
                        <th>@lang('global.users.fields.approved')</th>
                        <th>@lang('global.users.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='role'>
                                    @foreach ($user->role as $singleRole)
                                        <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='approved'>{{ Form::checkbox("approved", 1, $user->approved == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='created_by'>{{ $user->created_by->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="tasks">
<table class="table table-bordered table-striped {{ count($tasks) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.tasks.fields.name')</th>
                        <th>@lang('global.tasks.fields.description')</th>
                        <th>@lang('global.tasks.fields.status')</th>
                        <th>@lang('global.tasks.fields.tag')</th>
                        <th>@lang('global.tasks.fields.attachment')</th>
                        <th>@lang('global.tasks.fields.due-date')</th>
                        <th>@lang('global.tasks.fields.user')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <tr data-entry-id="{{ $task->id }}">
                    <td field-key='name'>{{ $task->name }}</td>
                                <td field-key='description'>{!! $task->description !!}</td>
                                <td field-key='status'>{{ $task->status->name or '' }}</td>
                                <td field-key='tag'>
                                    @foreach ($task->tag as $singleTag)
                                        <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='attachment'>@if($task->attachment)<a href="{{ asset(env('UPLOAD_PATH').'/' . $task->attachment) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='due_date'>{{ $task->due_date }}</td>
                                <td field-key='user'>{{ $task->user->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('tasks.show',[$task->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('tasks.edit',[$task->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['tasks.destroy', $task->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="resumes">
<table class="table table-bordered table-striped {{ count($resumes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

    <tbody>
        @if (count($resumes) > 0)
            @foreach ($resumes as $resume)
                <tr data-entry-id="{{ $resume->id }}">
                    <td field-key='first_name'>{{ $resume->first_name }}</td>
                                <td field-key='last_name'>{{ $resume->last_name }}</td>
                                <td field-key='email'>{{ $resume->email }}</td>
                                <td field-key='code'>{{ $resume->code }}</td>
                                <td field-key='mobile_number'>{{ $resume->mobile_number }}</td>
                                <td field-key='pancard'>{{ $resume->pancard }}</td>
                                <td field-key='address'>{{ $resume->address }}</td>
                                <td field-key='city'>{{ $resume->city }}</td>
                                <td field-key='state'>{{ $resume->state }}</td>
                                <td field-key='country'>{{ $resume->country }}</td>
                                <td field-key='educational_qualification'>{{ $resume->educational_qualification }}</td>
                                <td field-key='primary_skills'>{{ $resume->primary_skills }}</td>
                                <td field-key='sub_skills'>{{ $resume->sub_skills }}</td>
                                <td field-key='work_experience_years'>{{ $resume->work_experience_years }}</td>
                                <td field-key='work_experience_months'>{{ $resume->work_experience_months }}</td>
                                <td field-key='relevant_experience'>{{ $resume->relevant_experience }}</td>
                                <td field-key='notice_period'>{{ $resume->notice_period }}</td>
                                <td field-key='prefered_location'>{{ $resume->prefered_location }}</td>
                                <td field-key='current_ctc_lacks'>{{ $resume->current_ctc_lacks }}</td>
                                <td field-key='current_ctc_thousands'>{{ $resume->current_ctc_thousands }}</td>
                                <td field-key='expected_ctc_lacks'>{{ $resume->expected_ctc_lacks }}</td>
                                <td field-key='expected_ctc_thousands'>{{ $resume->expected_ctc_thousands }}</td>
                                <td field-key='upload_resume'>@if($resume->upload_resume)<a href="{{ asset(env('UPLOAD_PATH').'/' . $resume->upload_resume) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='comment_box'>{!! $resume->comment_box !!}</td>
                                <td field-key='created_by'>{{ $resume->created_by->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['resumes.restore', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['resumes.perma_del', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('resumes.show',[$resume->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('resumes.edit',[$resume->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['resumes.destroy', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="30">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="requirement">
<table class="table table-bordered table-striped {{ count($requirements) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

    <tbody>
        @if (count($requirements) > 0)
            @foreach ($requirements as $requirement)
                <tr data-entry-id="{{ $requirement->id }}">
                    <td field-key='customer_name'>{{ $requirement->customer_name }}</td>
                                <td field-key='job_id'>{{ $requirement->job_id }}</td>
                                <td field-key='job_title'>{{ $requirement->job_title }}</td>
                                <td field-key='job_type'>{{ $requirement->job_type }}</td>
                                <td field-key='description'>{!! $requirement->description !!}</td>
                                <td field-key='location'>{{ $requirement->location }}</td>
                                <td field-key='department'>{{ $requirement->department }}</td>
                                <td field-key='industry'>{{ $requirement->industry }}</td>
                                <td field-key='job_function'>{{ $requirement->job_function }}</td>
                                <td field-key='closing_date'>{{ $requirement->closing_date }}</td>
                                <td field-key='positions'>{{ $requirement->positions }}</td>
                                <td field-key='skills'>{{ $requirement->skills }}</td>
                                <td field-key='experience_from_years'>{{ $requirement->experience_from_years }}</td>
                                <td field-key='experience_from_months'>{{ $requirement->experience_from_months }}</td>
                                <td field-key='experience_to_years'>{{ $requirement->experience_to_years }}</td>
                                <td field-key='experience_to_months'>{{ $requirement->experience_to_months }}</td>
                                <td field-key='salary_range'>{{ $requirement->salary_range }}</td>
                                <td field-key='availabity'>{{ $requirement->availabity }}</td>
                                <td field-key='referal_fee'>{{ $requirement->referal_fee }}</td>
                                <td field-key='point_of_contact'>{{ $requirement->point_of_contact }}</td>
                                <td field-key='email'>{{ $requirement->email }}</td>
                                <td field-key='code'>{{ $requirement->code }}</td>
                                <td field-key='phone_number'>{{ $requirement->phone_number }}</td>
                                <td field-key='skype_id'>{{ $requirement->skype_id }}</td>
                                <td field-key='assigned_to_users'>
                                    @foreach ($requirement->assigned_to_users as $singleAssignedToUsers)
                                        <span class="label label-info label-many">{{ $singleAssignedToUsers->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='comment_box'>{!! $requirement->comment_box !!}</td>
                                <td field-key='created_by'>{{ $requirement->created_by->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['requirements.restore', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['requirements.perma_del', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('requirements.show',[$requirement->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('requirements.edit',[$requirement->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['requirements.destroy', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="32">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="requirement">
<table class="table table-bordered table-striped {{ count($requirements) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

    <tbody>
        @if (count($requirements) > 0)
            @foreach ($requirements as $requirement)
                <tr data-entry-id="{{ $requirement->id }}">
                    <td field-key='customer_name'>{{ $requirement->customer_name }}</td>
                                <td field-key='job_id'>{{ $requirement->job_id }}</td>
                                <td field-key='job_title'>{{ $requirement->job_title }}</td>
                                <td field-key='job_type'>{{ $requirement->job_type }}</td>
                                <td field-key='description'>{!! $requirement->description !!}</td>
                                <td field-key='location'>{{ $requirement->location }}</td>
                                <td field-key='department'>{{ $requirement->department }}</td>
                                <td field-key='industry'>{{ $requirement->industry }}</td>
                                <td field-key='job_function'>{{ $requirement->job_function }}</td>
                                <td field-key='closing_date'>{{ $requirement->closing_date }}</td>
                                <td field-key='positions'>{{ $requirement->positions }}</td>
                                <td field-key='skills'>{{ $requirement->skills }}</td>
                                <td field-key='experience_from_years'>{{ $requirement->experience_from_years }}</td>
                                <td field-key='experience_from_months'>{{ $requirement->experience_from_months }}</td>
                                <td field-key='experience_to_years'>{{ $requirement->experience_to_years }}</td>
                                <td field-key='experience_to_months'>{{ $requirement->experience_to_months }}</td>
                                <td field-key='salary_range'>{{ $requirement->salary_range }}</td>
                                <td field-key='availabity'>{{ $requirement->availabity }}</td>
                                <td field-key='referal_fee'>{{ $requirement->referal_fee }}</td>
                                <td field-key='point_of_contact'>{{ $requirement->point_of_contact }}</td>
                                <td field-key='email'>{{ $requirement->email }}</td>
                                <td field-key='code'>{{ $requirement->code }}</td>
                                <td field-key='phone_number'>{{ $requirement->phone_number }}</td>
                                <td field-key='skype_id'>{{ $requirement->skype_id }}</td>
                                <td field-key='assigned_to_users'>
                                    @foreach ($requirement->assigned_to_users as $singleAssignedToUsers)
                                        <span class="label label-info label-many">{{ $singleAssignedToUsers->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='comment_box'>{!! $requirement->comment_box !!}</td>
                                <td field-key='created_by'>{{ $requirement->created_by->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['requirements.restore', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['requirements.perma_del', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('requirements.show',[$requirement->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('requirements.edit',[$requirement->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['requirements.destroy', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="32">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

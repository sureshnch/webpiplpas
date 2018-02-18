@extends('layouts.app')

@section('content')
    <div class="row">
         <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added requirements</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('global.requirement.fields.customer-name')</th> 
                            <th> @lang('global.requirement.fields.job-id')</th> 
                            <th> @lang('global.requirement.fields.job-title')</th> 
                            <th> @lang('global.requirement.fields.job-type')</th> 
                            <th> @lang('global.requirement.fields.description')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($requirements as $requirement)
                            <tr>
                               
                                <td>{{ $requirement->customer_name }} </td> 
                                <td>{{ $requirement->job_id }} </td> 
                                <td>{{ $requirement->job_title }} </td> 
                                <td>{{ $requirement->job_type }} </td> 
                                <td>{{ $requirement->description }} </td> 
                                <td>

                                    @can('requirement_view')
                                    <a href="{{ route('admin.requirements.show',[$requirement->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('requirement_edit')
                                    <a href="{{ route('admin.requirements.edit',[$requirement->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan

                                    @can('requirement_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.requirements.destroy', $requirement->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added users</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('global.users.fields.name')</th> 
                            <th> @lang('global.users.fields.email')</th> 
                            <th> @lang('global.users.fields.approved')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr>
                               
                                <td>{{ $user->name }} </td> 
                                <td>{{ $user->email }} </td> 
                                <td>{{ $user->approved }} </td> 
                                <td>

                                    @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan

                                    @can('user_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added resumes</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('global.resumes.fields.first-name')</th> 
                            <th> @lang('global.resumes.fields.last-name')</th> 
                            <th> @lang('global.resumes.fields.email')</th> 
                            <th> @lang('global.resumes.fields.code')</th> 
                            <th> @lang('global.resumes.fields.mobile-number')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($resumes as $resume)
                            <tr>
                               
                                <td>{{ $resume->first_name }} </td> 
                                <td>{{ $resume->last_name }} </td> 
                                <td>{{ $resume->email }} </td> 
                                <td>{{ $resume->code }} </td> 
                                <td>{{ $resume->mobile_number }} </td> 
                                <td>

                                    @can('resume_view')
                                    <a href="{{ route('admin.resumes.show',[$resume->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('resume_edit')
                                    <a href="{{ route('admin.resumes.edit',[$resume->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan

                                    @can('resume_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.resumes.destroy', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added tasks</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('global.tasks.fields.name')</th> 
                            <th> @lang('global.tasks.fields.description')</th> 
                            <th> @lang('global.tasks.fields.due-date')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($tasks as $task)
                            <tr>
                               
                                <td>{{ $task->name }} </td> 
                                <td>{{ $task->description }} </td> 
                                <td>{{ $task->due_date }} </td> 
                                <td>

                                    @can('task_view')
                                    <a href="{{ route('admin.tasks.show',[$task->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('task_edit')
                                    <a href="{{ route('admin.tasks.edit',[$task->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan

                                    @can('task_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.tasks.destroy', $task->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>


    </div>
@endsection


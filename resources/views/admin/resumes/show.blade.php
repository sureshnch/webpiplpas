@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.resumes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.resumes.fields.first-name')</th>
                            <td field-key='first_name'>{{ $resume->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.last-name')</th>
                            <td field-key='last_name'>{{ $resume->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.email')</th>
                            <td field-key='email'>{{ $resume->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.code')</th>
                            <td field-key='code'>{{ $resume->code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.mobile-number')</th>
                            <td field-key='mobile_number'>{{ $resume->mobile_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.pancard')</th>
                            <td field-key='pancard'>{{ $resume->pancard }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.address')</th>
                            <td field-key='address'>{{ $resume->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.city')</th>
                            <td field-key='city'>{{ $resume->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.state')</th>
                            <td field-key='state'>{{ $resume->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.country')</th>
                            <td field-key='country'>{{ $resume->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.educational-qualification')</th>
                            <td field-key='educational_qualification'>{{ $resume->educational_qualification }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.primary-skills')</th>
                            <td field-key='primary_skills'>{{ $resume->primary_skills }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.sub-skills')</th>
                            <td field-key='sub_skills'>{{ $resume->sub_skills }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.work-experience-years')</th>
                            <td field-key='work_experience_years'>{{ $resume->work_experience_years }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.work-experience-months')</th>
                            <td field-key='work_experience_months'>{{ $resume->work_experience_months }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.relevant-experience')</th>
                            <td field-key='relevant_experience'>{{ $resume->relevant_experience }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.notice-period')</th>
                            <td field-key='notice_period'>{{ $resume->notice_period }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.prefered-location')</th>
                            <td field-key='prefered_location'>{{ $resume->prefered_location }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.current-ctc-lacks')</th>
                            <td field-key='current_ctc_lacks'>{{ $resume->current_ctc_lacks }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.current-ctc-thousands')</th>
                            <td field-key='current_ctc_thousands'>{{ $resume->current_ctc_thousands }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.expected-ctc-lacks')</th>
                            <td field-key='expected_ctc_lacks'>{{ $resume->expected_ctc_lacks }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.expected-ctc-thousands')</th>
                            <td field-key='expected_ctc_thousands'>{{ $resume->expected_ctc_thousands }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.upload-resume')</th>
                            <td field-key='upload_resume'>@if($resume->upload_resume)<a href="{{ asset(env('UPLOAD_PATH').'/' . $resume->upload_resume) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.comment-box')</th>
                            <td field-key='comment_box'>{!! $resume->comment_box !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resumes.fields.created-by')</th>
                            <td field-key='created_by'>{{ $resume->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.resumes.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

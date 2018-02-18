@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.resumes.title')</h3>
    
    {!! Form::model($resume, ['method' => 'PUT', 'route' => ['admin.resumes.update', $resume->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('first_name', trans('global.resumes.fields.first-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('last_name', trans('global.resumes.fields.last-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('global.resumes.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('code', trans('global.resumes.fields.code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('code', old('code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('code'))
                        <p class="help-block">
                            {{ $errors->first('code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mobile_number', trans('global.resumes.fields.mobile-number').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('mobile_number', old('mobile_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mobile_number'))
                        <p class="help-block">
                            {{ $errors->first('mobile_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pancard', trans('global.resumes.fields.pancard').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('pancard', old('pancard'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pancard'))
                        <p class="help-block">
                            {{ $errors->first('pancard') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', trans('global.resumes.fields.address').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city', trans('global.resumes.fields.city').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('state', trans('global.resumes.fields.state').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('state'))
                        <p class="help-block">
                            {{ $errors->first('state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country', trans('global.resumes.fields.country').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('country', old('country'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country'))
                        <p class="help-block">
                            {{ $errors->first('country') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('educational_qualification', trans('global.resumes.fields.educational-qualification').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('educational_qualification', old('educational_qualification'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('educational_qualification'))
                        <p class="help-block">
                            {{ $errors->first('educational_qualification') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('primary_skills', trans('global.resumes.fields.primary-skills').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('primary_skills', $enum_primary_skills, old('primary_skills'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('primary_skills'))
                        <p class="help-block">
                            {{ $errors->first('primary_skills') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sub_skills', trans('global.resumes.fields.sub-skills').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('sub_skills', old('sub_skills'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sub_skills'))
                        <p class="help-block">
                            {{ $errors->first('sub_skills') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('work_experience_years', trans('global.resumes.fields.work-experience-years').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('work_experience_years', $enum_work_experience_years, old('work_experience_years'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('work_experience_years'))
                        <p class="help-block">
                            {{ $errors->first('work_experience_years') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('work_experience_months', trans('global.resumes.fields.work-experience-months').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('work_experience_months', $enum_work_experience_months, old('work_experience_months'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('work_experience_months'))
                        <p class="help-block">
                            {{ $errors->first('work_experience_months') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('relevant_experience', trans('global.resumes.fields.relevant-experience').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('relevant_experience', old('relevant_experience'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('relevant_experience'))
                        <p class="help-block">
                            {{ $errors->first('relevant_experience') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notice_period', trans('global.resumes.fields.notice-period').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('notice_period', old('notice_period'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notice_period'))
                        <p class="help-block">
                            {{ $errors->first('notice_period') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prefered_location', trans('global.resumes.fields.prefered-location').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('prefered_location', old('prefered_location'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prefered_location'))
                        <p class="help-block">
                            {{ $errors->first('prefered_location') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_ctc_lacks', trans('global.resumes.fields.current-ctc-lacks').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('current_ctc_lacks', $enum_current_ctc_lacks, old('current_ctc_lacks'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_ctc_lacks'))
                        <p class="help-block">
                            {{ $errors->first('current_ctc_lacks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_ctc_thousands', trans('global.resumes.fields.current-ctc-thousands').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('current_ctc_thousands', $enum_current_ctc_thousands, old('current_ctc_thousands'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_ctc_thousands'))
                        <p class="help-block">
                            {{ $errors->first('current_ctc_thousands') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('expected_ctc_lacks', trans('global.resumes.fields.expected-ctc-lacks').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('expected_ctc_lacks', $enum_expected_ctc_lacks, old('expected_ctc_lacks'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('expected_ctc_lacks'))
                        <p class="help-block">
                            {{ $errors->first('expected_ctc_lacks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('expected_ctc_thousands', trans('global.resumes.fields.expected-ctc-thousands').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('expected_ctc_thousands', $enum_expected_ctc_thousands, old('expected_ctc_thousands'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('expected_ctc_thousands'))
                        <p class="help-block">
                            {{ $errors->first('expected_ctc_thousands') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('upload_resume', trans('global.resumes.fields.upload-resume').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('upload_resume', old('upload_resume')) !!}
                    @if ($resume->upload_resume)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $resume->upload_resume) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('upload_resume', ['class' => 'form-control']) !!}
                    {!! Form::hidden('upload_resume_max_size', 5) !!}
                    <p class="help-block"></p>
                    @if($errors->has('upload_resume'))
                        <p class="help-block">
                            {{ $errors->first('upload_resume') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comment_box', trans('global.resumes.fields.comment-box').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comment_box', old('comment_box'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comment_box'))
                        <p class="help-block">
                            {{ $errors->first('comment_box') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.requirement.title')</h3>
    
    {!! Form::model($requirement, ['method' => 'PUT', 'route' => ['admin.requirements.update', $requirement->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_name', trans('global.requirement.fields.customer-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('customer_name', $enum_customer_name, old('customer_name'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_name'))
                        <p class="help-block">
                            {{ $errors->first('customer_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('job_id', trans('global.requirement.fields.job-id').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('job_id', old('job_id'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('job_id'))
                        <p class="help-block">
                            {{ $errors->first('job_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('job_title', trans('global.requirement.fields.job-title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('job_title', old('job_title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('job_title'))
                        <p class="help-block">
                            {{ $errors->first('job_title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('job_type', trans('global.requirement.fields.job-type').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('job_type', $enum_job_type, old('job_type'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('job_type'))
                        <p class="help-block">
                            {{ $errors->first('job_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('global.requirement.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('location', trans('global.requirement.fields.location').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('location', $enum_location, old('location'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department', trans('global.requirement.fields.department').'', ['class' => 'control-label']) !!}
                    {!! Form::select('department', $enum_department, old('department'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department'))
                        <p class="help-block">
                            {{ $errors->first('department') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('industry', trans('global.requirement.fields.industry').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('industry', $enum_industry, old('industry'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('industry'))
                        <p class="help-block">
                            {{ $errors->first('industry') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('job_function', trans('global.requirement.fields.job-function').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('job_function', $enum_job_function, old('job_function'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('job_function'))
                        <p class="help-block">
                            {{ $errors->first('job_function') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('closing_date', trans('global.requirement.fields.closing-date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('closing_date', old('closing_date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('closing_date'))
                        <p class="help-block">
                            {{ $errors->first('closing_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('positions', trans('global.requirement.fields.positions').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('positions', old('positions'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('positions'))
                        <p class="help-block">
                            {{ $errors->first('positions') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('skills', trans('global.requirement.fields.skills').'', ['class' => 'control-label']) !!}
                    {!! Form::text('skills', old('skills'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('skills'))
                        <p class="help-block">
                            {{ $errors->first('skills') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('experience_from_years', trans('global.requirement.fields.experience-from-years').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('experience_from_years', $enum_experience_from_years, old('experience_from_years'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('experience_from_years'))
                        <p class="help-block">
                            {{ $errors->first('experience_from_years') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('experience_from_months', trans('global.requirement.fields.experience-from-months').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('experience_from_months', $enum_experience_from_months, old('experience_from_months'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('experience_from_months'))
                        <p class="help-block">
                            {{ $errors->first('experience_from_months') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('experience_to_years', trans('global.requirement.fields.experience-to-years').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('experience_to_years', $enum_experience_to_years, old('experience_to_years'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('experience_to_years'))
                        <p class="help-block">
                            {{ $errors->first('experience_to_years') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('experience_to_months', trans('global.requirement.fields.experience-to-months').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('experience_to_months', $enum_experience_to_months, old('experience_to_months'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('experience_to_months'))
                        <p class="help-block">
                            {{ $errors->first('experience_to_months') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('salary_range', trans('global.requirement.fields.salary-range').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('salary_range', $enum_salary_range, old('salary_range'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('salary_range'))
                        <p class="help-block">
                            {{ $errors->first('salary_range') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('availabity', trans('global.requirement.fields.availabity').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('availabity', $enum_availabity, old('availabity'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('availabity'))
                        <p class="help-block">
                            {{ $errors->first('availabity') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('referal_fee', trans('global.requirement.fields.referal-fee').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('referal_fee', old('referal_fee'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('referal_fee'))
                        <p class="help-block">
                            {{ $errors->first('referal_fee') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('point_of_contact', trans('global.requirement.fields.point-of-contact').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('point_of_contact', old('point_of_contact'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('point_of_contact'))
                        <p class="help-block">
                            {{ $errors->first('point_of_contact') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('global.requirement.fields.email').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('code', trans('global.requirement.fields.code').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('phone_number', trans('global.requirement.fields.phone-number').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('phone_number', old('phone_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone_number'))
                        <p class="help-block">
                            {{ $errors->first('phone_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('skype_id', trans('global.requirement.fields.skype-id').'', ['class' => 'control-label']) !!}
                    {!! Form::text('skype_id', old('skype_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('skype_id'))
                        <p class="help-block">
                            {{ $errors->first('skype_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('assigned_to_users', trans('global.requirement.fields.assigned-to-users').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('assigned_to_users[]', $assigned_to_users, old('assigned_to_users') ? old('assigned_to_users') : $requirement->assigned_to_users->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('assigned_to_users'))
                        <p class="help-block">
                            {{ $errors->first('assigned_to_users') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comment_box', trans('global.requirement.fields.comment-box').'', ['class' => 'control-label']) !!}
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

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop
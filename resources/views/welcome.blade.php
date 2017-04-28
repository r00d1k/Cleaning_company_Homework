@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => '/new_booking', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
            {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
            {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
            {!! Form::label('city', 'City', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::select('city', $city, null, ['class' => 'form-control']) !!}
                {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


    {!! Form::close() !!}
@endsection
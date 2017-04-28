@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Sity {{ $sity->id }}</h1>

    {!! Form::model($sity, [
        'method' => 'PATCH',
        'url' => ['/sity', $sity->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

            <div class="form-group {{ $errors->has('sity') ? 'has-error' : ''}}">
                {!! Form::label('sity', 'Sity', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sity', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sity', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection
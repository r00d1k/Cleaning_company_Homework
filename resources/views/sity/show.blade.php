@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Sity {{ $sity->id }}
        <a href="{{ url('sity/' . $sity->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Sity"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['sity', $sity->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Sity',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $sity->id }}</td>
                </tr>
                <tr><th> Sity </th><td> {{ $sity->sity }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection

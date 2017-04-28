@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Sity <a href="{{ url('/sity/create') }}" class="btn btn-primary btn-xs" title="Add New Sity"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Sity </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($sity as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->sity }}</td>
                    <td>
                        <a href="{{ url('/sity/' . $item->id) }}" class="btn btn-success btn-xs" title="View sity"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/sity/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit sity"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/sity', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete sity" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete sity',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $sity->render() !!} </div>
    </div>

</div>
@endsection

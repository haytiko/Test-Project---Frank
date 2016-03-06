@extends('master')


@section('content')
    <h3>Create new record</h3>

    <hr/>

    {!! Form::open(['url' => 'records', 'files' => true]) !!}
        @include('records.form', ['submitButtonText' => 'Add Record'])
    {!! Form::close() !!}

    @include('errors.list')

@stop
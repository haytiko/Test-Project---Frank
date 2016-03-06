@extends('master')

@section('content')

    <h3>Edit Record</h3>

    <hr/>

    {!! Form::model($record, ['method' => 'PATCH', 'url' => 'records/'.$record->id, 'files' => true]) !!}
        @include('records.form', ['submitButtonText' => 'Edit Record'])
    {!! Form::close() !!}

    @include('errors.list')

@stop
@extends('master')

@section('content')

    <table id="mytable" class="table table-bordred table-striped">

        <thead>
        <th>Username</th>
        <th>Record Name</th>
        <th>Contest</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>

        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{$record->user->username}}</td>
                <td>{{$record->name}}</td>
                <td>{{$record->contest->name}}</td>
                <td>
                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                        <a href="/records/{{$record->id}}/edit" class="" data-title="Edit" >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </p>
                </td>
                <td>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <a class="delete_record" data-recordid="{{$record->id}}" data-title="Delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </p>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@stop
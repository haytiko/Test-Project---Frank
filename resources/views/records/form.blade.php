
<div class="form-group">
    {!! Form::label('record_name', 'Record Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@if(!empty($record))
<div class="form-group">
    <img src='{{'/uploads/'.$record->image_path }}' class="img-rounded" alt="Cinque Terre" width="304" height="236">
</div>
@endif
<div class="form-group">
    {!! Form::label('record_image', 'Record Image:') !!}
    {!! Form::file('image_path', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('contests', 'Contests:') !!}
    {!! Form::select('contest_id', $contests_list, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
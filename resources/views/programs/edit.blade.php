@extends('layouts/app')

@section('title')
{{ $program->name }} -> {{ $program->vertical_name }} -> {{ $program->subvertical_name }} -> Programs
@stop

@section('content')
  <div class="container">
    <div class="row">
        
         <a href="/">Home</a> -> <a href="/verticals/{{ $program->school_id }}">{{ $program->school_name }}</a> -> <a href="/verticals/{{ $program->school_id }}">Verticals</a> -> <a href="/subverticals/{{ $program->school_id }}/{{ $program->vertical_id }}">Subverticals</a> -> <a href="/programs/{{ $program->school_id }}/{{ $program->vertical_id }}/{{ $program->subvertical_id }}">Programs</a> -> Edit
              <hr>
         <form method="POST" action="/programs/{{ $program->id }}">
        {{ method_field('PATCH') }}
                {{ csrf_field() }}

                    <div class="form-group row">
                      <label for="program-id" class="col-xs-2 col-form-label">Program ID:</label>
                      <div class="col-xs-10">
                        <input class="form-control disabled" disabled="disabled" type="text" name="id" id="program-id" value="{{$program->id}}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-xs-2 col-form-label">Program Name:</label>
                      <div class="col-xs-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{$program->name}}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="code" class="col-xs-2 col-form-label">Program Code:</label>
                      <div class="col-xs-10">
                        <input class="form-control" type="text" name="code" id="code" value="{{$program->code}}">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="education_level" class="col-xs-2 col-form-label">Education Level:</label>
                      <div class="col-xs-10">
                        <input class="form-control" type="text" name="education_level" id="education_level" value="{{$program->education_level}}">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="special_program_type" class="col-xs-2 col-form-label">Special Program Type:</label>
                      <div class="col-xs-10">
                        <input class="form-control" type="text" name="special_program_type" id="special_program_type" value="{{$program->special_program_type}}">
                      </div>
                    </div>

                    <div class="col-xs-12"><button type="submit" class="btn btn-primary">Update Program</button></div>
                </form>     
              
    </div>
  </div>


@stop
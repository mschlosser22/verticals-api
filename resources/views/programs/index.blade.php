@extends('layouts/app')

@section('title')
{{ $school->name }} -> {{ $vertical->name }} -> {{ $subvertical->name }} -> Programs
@stop

@section('content')
    <div class="container">
            <div class="row">
              <a href="/">Home</a> -> <a href="/verticals/{{ $school->id }}">{{ $school->name }}</a> -> <a href="/verticals/{{ $school->id }}">Verticals</a> -> <a href="/subverticals/{{ $school->id }}/{{ $vertical->id }}">Subverticals</a> -> <a href="/programs/{{ $school->id }}/{{ $vertical->id }}/{{ $subvertical->id }}">Programs</a>
              <hr>
              <h2>Create New Program for {{ $school->name }}/{{ $vertical->name }}/{{ $subvertical->name }}</h2>
              <hr>
              <form method="POST" action="/programs">
              {{ csrf_field() }}
                <input type="hidden" name="school_id" id="school_id" value="{{ $school->id }}">
                <input type="hidden" name="vertical_id" id="vertical_id" value="{{ $vertical->id }}">
                <input type="hidden" name="subvertical_id" id="subvertical_id" value="{{ $subvertical->id }}">
                <input type="hidden" name="school_name" id="school_name" value="{{ $school->name }}">
                <input type="hidden" name="vertical_name" id="vertical_name" value="{{ $vertical->name }}">
                <input type="hidden" name="subvertical_name" id="subvertical_name" value="{{ $subvertical->name }}">
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">Program Name:</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="name" id="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">Program Code:</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="code" id="code">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">Education Level:</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="education_level" id="education_level">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">Special Program Type (IE: Combo):</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="special_program_type" id="special_program_type">
                  </div>
                </div>
                
                <div class="col-xs-12"><button type="submit" class="btn btn-primary">Create Program</button></div>
              </form>

            </div>
            <div class="content row">
                <h2>Program List</h2>
                <table class="table">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Program Code</th>
                  <th>Education Level</th>
                  <th>Special Program Type</th>
                  <th>Edit Program</th>
                  <th>Delete Program</th>
                </tr>
                </thead>
                @foreach ($programs as $program)
                	<tr>
                    <td>{{ $program->name }}</td>
                    <td>{{ $program->code }}</td>
                    <td>{{ $program->education_level }}</td>
                    <td>{{ $program->special_program_type }}</td>
                    <td><a href="/programs/{{ $program->id }}" class="btn btn-primary">{{ $program->id }}</a></td>
                    <td>
                      <form action="{{ url('programs/'.$program->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete School" data-message="Are you sure you want to delete this program?">
                                          <i class="fa fa-trash"></i> Delete
                                      </button>
                                  </form>
                    </td>
                	</tr>
                @endforeach
                </table>
            </div>

    </div>


@stop
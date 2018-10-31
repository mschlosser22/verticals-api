@extends('layouts/app')

@section('title')
{{ $school->name }} {{ $vertical->name }} Subverticals
@stop

@section('content')
    <div class="container">
            <div class="row">
              <a href="/">Home</a> -> <a href="/verticals/{{ $school->id }}">{{ $school->name }}</a> -> <a href="/verticals/{{ $school->id }}">Verticals</a> -> <a href="/subverticals/{{ $school->id }}/{{ $vertical->id }}">Subverticals</a>
              <hr>
              <h2>Create New Subvertical for {{ $school->name }}/{{ $vertical->name }}</h2>
              <hr>
              <form method="POST" action="/subverticals">
              {{ csrf_field() }}
                <input type="hidden" name="school_id" id="school_id" value="{{ $school->id }}">
                <input type="hidden" name="vertical_id" id="vertical_id" value="{{ $vertical->id }}">
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">Subvertical Name:</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="name" id="name">
                  </div>
                </div>
                
                <div class="col-xs-12"><button type="submit" class="btn btn-primary">Create Subvertical</button></div>
              </form>

            </div>
            <div class="content row">
                <h2>Subvertical List</h2>
                <table class="table">
                <thead>
                <tr>
                  <th>Name</th>
                	<th></th>
                  <th>Delete Subvertical</th>
                </tr>
                </thead>
                @foreach ($subverticals as $subvertical)
                	<tr>
                    <td>{{ $subvertical->name }}</td>
                		<td><a href="/programs/{{ $school->id }}/{{ $vertical->id }}/{{ $subvertical->id }}" class="btn btn-primary">View Programs</a></td>
                    <td>
                      <form action="{{ url('subverticals/'.$subvertical->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete School" data-message="Are you sure you want to delete this subvertical?">
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
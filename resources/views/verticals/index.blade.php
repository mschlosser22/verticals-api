@extends('layouts/app')

@section('title')
{{ $school->name }} Verticals
@stop

@section('content')
    <div class="container">
            <div class="row">
              <a href="/">Home</a> -> <a href="/verticals/{{ $school->id }}">{{ $school->name }}</a> -> <a href="/verticals/{{ $school->id }}">Verticals</a>
              <hr>
              <h2>Create New Vertical for {{ $school->name }}</h2>
              <hr>
              <form method="POST" action="/verticals">
              {{ csrf_field() }}
                <input type="hidden" name="school_id" id="school_id" value="{{ $school->id }}">
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">Vertical Name:</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="name" id="name">
                  </div>
                </div>
                
                <div class="col-xs-12"><button type="submit" class="btn btn-primary">Create Vertical</button></div>
              </form>

            </div>
            <div class="content row">
                <h2>Vertical List</h2>
                <table class="table">
                <thead>
                <tr>
                  <th>Name</th>
                	<th></th>
                  <th>Delete Vertical</th>
                </tr>
                </thead>
                @foreach ($verticals as $vertical)
                	<tr>
                    <td>{{ $vertical->name }}</td>
                		<td><a href="/subverticals/{{ $school->id }}/{{ $vertical->id }}" class="btn btn-primary">View Subverticals</a></td>
                    <td>
                      <form action="{{ url('verticals/'.$vertical->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete School" data-message="Are you sure you want to delete this vertical?">
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
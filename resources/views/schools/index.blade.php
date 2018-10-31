@extends('layouts/app')

@section('title')
Schools
@stop

@section('content')
    <div class="container">
            <div class="row">
              <a href="/">Schools</a>
              <hr>
              <h2>Create New School</h2>
              <hr>
              <form method="POST" action="/schools">
              {{ csrf_field() }}
                <div class="form-group row">
                  <label for="item-description" class="col-xs-2 col-form-label">School Name:</label>
                  <div class="col-xs-10">
                    <input class="form-control" type="text" name="name" id="name">
                  </div>
                </div>
                
                <div class="col-xs-12"><button type="submit" class="btn btn-primary">Create School</button></div>
              </form>

            </div>
            <div class="content row">
                <h2>School List</h2>
                <table class="table">
                <thead>
                <tr>
                  <th>Name</th>
                	<th></th>
                  <th>Delete School</th>
                </tr>
                </thead>
                @foreach ($schools as $school)
                	<tr>
                    <td>{{ $school->name }}</td>
                		<td><a href="/verticals/{{ $school->id }}" class="btn btn-primary">View Verticals</a></td>
                    <td>
                      <form action="{{ url('schools/'.$school->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete School" data-message="Are you sure you want to delete this school?">
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
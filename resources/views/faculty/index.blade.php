@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">

                <h1 align="center" class="mb-5">Faculties</h1>

                <a href="#" class="btn btn-primary mb-4">Create</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">University_id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($faculties as $faculty)
                        <tr>
                          <th scope="row">{{$faculty->id}}</th>
                          <td>{{$faculty->university_id}}</td>
                          <td>{{$faculty->name}}</td>
                          <td><a href="#" class="btn btn-danger">Delete</a></td>
                          <td><a href="#" class="btn btn-warning">Update</a></td>
                        </tr>                      
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
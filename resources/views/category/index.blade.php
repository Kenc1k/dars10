@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">

                <h1 align="center" class="mb-5">Categories</h1>

                <a href="#" class="btn btn-primary mb-4">Create</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                          <th scope="row">{{$category->id}}</th>
                          <td>{{$category->name}}</td>
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
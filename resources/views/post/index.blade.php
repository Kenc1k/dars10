@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">

                <h1 align="center" class="mb-5">Posts</h1>

                <a href="#" class="btn btn-primary mb-4">Create</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category_id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Text</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                          <th scope="row">{{$post->id}}</th>
                          <td>{{$post->category_id}}</td>
                          <td>{{$post->title}}</td>
                          <td>{{$post->text}}</td>
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
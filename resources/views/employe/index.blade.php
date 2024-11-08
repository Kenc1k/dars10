@extends('layouts.index')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">

                <h1 align="center" class="mb-5">Employes</h1>

                <a href="{{ route('employe.create') }}" class="btn btn-primary mb-4">Create</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $employ)
                        <tr>
                          <th scope="row">{{$employ->id}}</th>
                          <td>{{$employ->username}}</td>
                          <td>{{$employ->email}}</td>
                          <td>{{$employ->password}}</td>
                          <td>{{$employ->role}}</td>
                          <th>
                            <form action="{{ route('employe.destroy', $employ->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          <td><a href="{{route('employe.edit' , $employ->id)}}" class="btn btn-warning">Update</a></td>
                        </tr>                      
                        @endforeach
                    </tbody>
                  </table>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
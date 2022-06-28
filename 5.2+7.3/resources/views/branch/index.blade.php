@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="float-md-start">Branches</h2>
                <a class="btn btn-sm btn-success float-md-end" href="{{route('branch.create')}}"
                   role="button">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table mt-5">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Name</th>
                                <th scope="col">State</th>
                                <th scope="col">Zip code</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <th scope="row">{{$branch->id}}</th>
                                    <td>{{$branch->address}}</td>
                                    <td>{{$branch->city}}</td>
                                    <td>{{$branch->name}}</td>
                                    <td>{{$branch->state}}</td>
                                    <td>{{$branch->zip_code}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                           href="{{route('branch.edit',$branch->id)}}" role="button">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="event.preventDefault(); document.getElementById('delete-branch-{{$branch->id}}').submit()">
                                            Delete
                                        </button>
                                        <form id="delete-branch-{{$branch->id}}"
                                              action="{{route('branch.destroy',$branch->id)}}" method="POST"
                                              style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="float-md-start">Employees</h2>
                <a class="btn btn-sm btn-success float-md-end" href="{{route('employee.create')}}"
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
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Department</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{$employee->id}}</th>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->start_date}}</td>
                                    <td>{{$employee->end_date}}</td>
                                    <td>{{$employee->title}}</td>
                                    @if($employee->branches!=null)
                                        <td>{{$employee->branches->name}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if($employee->departments!=null)
                                        <td>{{$employee->departments->name}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           href="{{route('employee.edit',$employee->id)}}" role="button">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="event.preventDefault(); document.getElementById('delete-employee-{{$employee->id}}').submit()">
                                            Delete
                                        </button>
                                        <form id="delete-employee-{{$employee->id}}"
                                              action="{{route('employee.destroy',$employee->id)}}" method="POST"
                                              style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

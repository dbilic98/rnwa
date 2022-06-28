@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md" >
                <h2 class="card-title mb-4">Create a new employee</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('employee.store')}}" class="form-control mx-auto border-0"  method="POST">
                            @csrf
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="{{old('first_name')}}@isset($employee){{$employee->first_name}}@endisset">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="{{old('last_name')}}@isset($employee){{$employee->last_name}}@endisset">
                            <label for="start_date" class="form-label">Start date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter start date" value="{{old('start_date')}}@isset($employee){{$employee->start_date}}@endisset">
                            <label for="end_date" class="form-label">End date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter end date" value="{{old('end_date')}}@isset($employee){{$employee->end_date}}@endisset">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{old('title')}}@isset($employee){{$employee->title}}@endisset">
                            <label for="branch">Branch</label>
                            <select class="form-select" name="branch_id" >
                                <option value="{{old('branch_id')}}@isset($employee){{$employee->branch_id}}@endisset">Pick the branch</option>
                                @foreach($branches as $branch)
                                    <option
                                        value="{{ $branch->id }}"> {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="department">Department</label>
                            <select class="form-select" name="department_id" >
                                <option value="{{old('department_id')}}@isset($employee){{$employee->department_id}}@endisset">Pick the department</option>
                                @foreach($departments as $department)
                                    <option
                                        value="{{ $department->id }}"> {{ $department->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

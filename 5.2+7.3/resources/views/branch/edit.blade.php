@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md" >
                <h2 class="card-title mb-4">Edit a branch</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('branch.update',$branch->id)}}" class="form-control mx-auto border-0"  method="POST">
                            @method('PATCH')
                            @csrf
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{old('address')}}@isset($branch){{$branch->address}}@endisset">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" value="{{old('city')}}@isset($branch){{$branch->city}}@endisset">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name')}}@isset($branch){{$branch->name}}@endisset">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" value="{{old('state')}}@isset($branch){{$branch->state}}@endisset">
                            <label for="zip_code" class="form-label">Zip code</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter zip code" value="{{old('zip_code')}}@isset($branch){{$branch->zip_code}}@endisset">
                            <button type="submit" class="btn btn-primary mt-2">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

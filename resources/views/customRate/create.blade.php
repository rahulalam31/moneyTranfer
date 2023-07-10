@extends('layouts.app')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Country /</span> Add Country</h4>
    <!-- Form controls -->
    <div class="col-md-10">
        <div class="card mb-4">
        <h5 class="card-header">Add Country
            <a href="{{url('admin/getconversionrate')}}" style="float:right" class="btn btn-outline-danger">Back</a>
        </h5>
        <div class="card-body">
            <form action="{{ url('admin/getcustomratesave') }}" method="POST" >
                @csrf
                @method('POST')
                <div class="mb-3">
                  <label for="parentcategory" class="form-label">Sending Country</label>
                  <select class="form-select" id="parentcategory" name="send" aria-label="Default select example" required>
                    <option >Select a Option</option>
                    @foreach ($sendcontry as $item)
                    <option value="{{$item->id}}">{{$item->country_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="parentcategory" class="form-label">Recieving Country</label>
                  <select class="form-select" id="parentcategory" name="recive" aria-label="Default select example" required>
                    <option >Select a Option</option>
                    @foreach ($reccontry as $item)
                    <option value="{{$item->id}}">{{$item->country_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                <label class="form-label">Static Rate</label>
                <input type="number" class="form-control" name="customised_rate" placeholder="Static Rate" required/>
                </div>
                <div class="mb-3">
                  <label for="parentcategory" class="form-label">Rate Type</label>
                  <select class="form-select" id="parentcategory" name="rate_type" aria-label="Default select example" required>
                    <option >Select a Option</option>
                    <option value="flat">Flat</option>
                    <option value="percentage">Percentage</option>
                  </select>
                </div>
                <div class="mb-3">
                <button type="submit" class="btn rounded-pill btn-primary">Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection

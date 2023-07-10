@extends('layouts.app')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Country /</span> Add Country</h4>
    <!-- Form controls -->
    <div class="col-md-10">
        <div class="card mb-4">
        <h5 class="card-header">Add Country
            <a href="{{url('admin/brand')}}" style="float:right" class="btn btn-outline-danger">Back</a>
        </h5>
        <div class="card-body">
            <form action="{{ url('admin/getsendingcountrysave') }}" method="POST" >
                @csrf
                @method('POST')
                <div class="mb-3">
                <label class="form-label">Country Name</label>
                <input type="text" class="form-control" name="name" placeholder="Country Name" required/>
                </div>
                <div class="mb-3">
                <label class="form-label">Status</label>
                <input class="form-check-input" type="checkbox" name="status" value="0" style="width: 25px; height: 25px;" />
                </div>
                {{-- <div class="mb-3">
                  <label for="parentcategory" class="form-label">Parent Category</label>
                  <select class="form-select" id="parentcategory" name="category_id" aria-label="Default select example" required>
                    <option >Select a Option</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div> --}}
                <div class="mb-3">
                <button type="submit" class="btn rounded-pill btn-primary">Add Brand</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection

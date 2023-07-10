@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

        <div class="card">
            <h5 class="card-header">Custom Rate Table
                <a href="{{url('admin/getcustomratecreate')}}" style="float:right" class="btn btn-outline-primary">Add Custom Rate</a></h5>
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Sending Country Name</th>
                    <th>Receiving Country Name</th>
                    <th>Rate</th>
                    <th>Rate Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($allcustomRate as $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->sendingCountry->country_name}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->receivingCountry->country_name}}</strong></td>
                            <td>{{ $item->customised_rate }}</td>
                            <td>{{ $item->rate_type }}</td>
                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{ url('admin/getcustomratedelete/'.$item->id) }}" onclick="return confirm('Are you sure to delete this?')"
                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>
</div>


@endsection

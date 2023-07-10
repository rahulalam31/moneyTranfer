@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

        <div class="card">
            <h5 class="card-header">Conversation Rate Table
                <a href="{{url('admin/getconversionratecreate')}}" style="float:right" class="btn btn-outline-primary">Add Conversation Rate</a></h5>
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Sending Country Name</th>
                    <th>Receiving Country Name</th>
                    <th>Static Rate</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($allconversionRate as $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->sendingCountry->country_name}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->receivingCountry->country_name}}</strong></td>
                            <td>{{ $item->static_rate }}
                            </td>
                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{ url('admin/getconversionratedelete/'.$item->id) }}" onclick="return confirm('Are you sure to delete this?')"
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

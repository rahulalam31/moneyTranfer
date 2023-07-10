@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

        <div class="card">
            <h5 class="card-header">Brands Table
                <a href="{{url('admin/getsendingcountrycreate')}}" style="float:right" class="btn btn-outline-primary">Add Brand</a></h5>
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Country Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($allsendingcountry as $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->country_name}}</strong></td>
                            <td>
                                @if ($item->is_active)
                                <span class="badge bg-info m-0">Active</span>
                                @else
                                <span class="badge bg-warning m-0">Not Active</span>
                                @endif
                            </td>
                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('admin/activate-sending-country/'.$item->id) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Active/Deactive</a
                                >
                                <a class="dropdown-item" href="{{ url('admin/getsendingcountrydelete/'.$item->id) }}" onclick="return confirm('Are you sure to delete this?')"
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

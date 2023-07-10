@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Money /</span> Conversation Rate</h4>
        <!-- Form controls -->
        <div class="col-md-10">
            <div class="card mb-4">
                <h5 class="card-header">Conversation Rate
                </h5>
                <div class="card-body">
                    <form action="{{ url('data') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="parentcategory" class="form-label">Sending Country</label>
                            <select class="form-select" id="parentcategory" id="send_country" name="send"
                                aria-label="Default select example" required>
                                <option>Select a Option</option>
                                @foreach ($sendcontry as $item)
                                    <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="parentcategory" class="form-label">Recieving Country</label>
                            <select class="form-select" id="parentcategory" id="receive_country" name="recive"
                                aria-label="Default select example" required>
                                <option>Select a Option</option>
                                @foreach ($reccontry as $item)
                                    <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
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
                </div> --}}
                        <div class="mb-3">
                            <button type="submit" id="getdata" class="getdata btn rounded-pill btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="result"></div>
        </div>
    </div>
{{--
@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token-front"]').attr('content')
                }
            });

            $(document).on('click', '.getdata', function(e) {
                e.preventDefault();

                var sendcountry = $('#send_country').val();
                var receivecountry = $('#receive_country').val();

                var data = {
                    'sending_country': sendcountry,
                    'receiving_country': receivecountry,
                };

                $.ajax({
                    type: "GET",
                    url: "/data",
                    data: data,
                    success: function(response) {
                        var html = '<tr>';
                        html += '<td> staticRate: ' + data.staticRate + '</td>';
                        html += '<td> customisedRate: ' + data.customisedRate + '</td>'
                        html += '<td> conversionRate: ' + data.conversionRate + '</td></tr>';
                        $('#table_data').prepend(result);
                        // window.location.reload(true);
                        alert(response);
                    }
                });
            });

        });
    </script>
@endsection --}}
@endsection

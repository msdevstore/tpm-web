{{-- Extends layout --}}
@extends('layout.default')

{{-- Styles --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/order_status/shipments.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-12 col-xxl-12 card-stretch gutter-b">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        <h3 class="card-label">In Progress Orders</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-11 col-xl-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="search_query" />
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="search_field">
                                                <option value="">All</option>
                                                <option value="job">Job</option>
                                                <option value="cust_id">Company</option>
                                                <option value="quantity">Quantity</option>
                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-4 my-2 my-md-0">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>--}}
{{--                                            <select class="form-control" id="kt_datatable_search_type">--}}
{{--                                                <option value="">All</option>--}}
{{--                                                <option value="1">Online</option>--}}
{{--                                                <option value="2">Retail</option>--}}
{{--                                                <option value="3">Direct</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                <a class="btn btn-light-primary px-6 font-weight-bold" id="search-btn">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Job</th>
                            <th>Company</th>
                            <th>Quantity</th>
                            <th>Ship Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($partial_ships as $partial_ship)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$partial_ship->job}}</td>
                            <td>{{$partial_ship->customer}}</td>
                            <td>{{$partial_ship->quantity}}</td>
                            <td>{{$partial_ship->ship_date}}</td>
                            <td><a class="delete-btn" onclick="deletePartialShip('{{$partial_ship->job}}', '{{$partial_ship->cust_id}}')">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#search-btn').click(function() {
                const field = $('#search_field').val();
                const query = $('#search_query').val();
                console.log(query);
                window.location.href = `/order_status/shipments/${field}/${query}`;
            })
        })

        function deletePartialShip(job, cust_id) {
            $.ajax({
                url: `/api/v1/delete_partial_ship/${job}/${cust_id}`,
                type: 'DELETE',
                success: function(res) {
                    console.log(res);
                    if (res === '1') {
                        alert("Deleted successfully!");
                        window.location.reload();
                    } else alert("Something went wrong!");
                },
                error: function(err) {
                    console.log(err);
                    alert("Failed!");
                }
            })
        }
    </script>
@endsection

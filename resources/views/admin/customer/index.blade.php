{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row gutter-b" id="customers-table" style="display: none">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Customers Table</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-11 col-xl-10">
                                <div class="row align-items-center my-2 my-md-0">
                                    <div class="col-md-4">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="my_search_query" />
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block" for="my_search_field">Status:</label>
                                            <select class="form-control" id="my_search_field">
                                                <option value="">All</option>
                                                @foreach($customers->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold" id="my_search_btn">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-hover table-head-custom table-foot-custom table-checkable" id="my_table" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            @foreach($customers->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr class="customer-btn" data="{{$customer->cust_id}}">
                            @foreach($customer as $key => $value)
                                <td><?php echo (strlen($value) > 20) ? substr($value, 0, 20) . '...' : $value ?></td>
                            @endforeach
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Information</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <form class="row">
                            @csrf
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Cust ID</label></div>
                                    <div class="grid-input"><input id="cust_id" value="{{$new_id}}"></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input"><input id="customer"></div>
                                    <div class="grid-label"><label>Billing Address</label></div>
                                    <div class="grid-input"><textarea id="bill_to"></textarea></div>
                                    <div class="grid-label"><label>Shipping Address</label></div>
                                    <div class="grid-input"><textarea id="ship_to"></textarea></div>
                                </div>
                            </div>
                            <div class="col-lg-6 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Contact</label></div>
                                    <div class="grid-input"><input id="contact"></div>
                                    <div class="grid-label"><label>Phone</label></div>
                                    <div class="grid-input"><input type="text" id="phone"></div>
                                    <div class="grid-label"><label>Fax</label></div>
                                    <div class="grid-input"><input type="text" id="fax"></div>
                                    <div class="grid-label"><label>Email</label></div>
                                    <div class="grid-input"><input id="email"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        const customers = {{ Js::from($customers) }};

        $(document).ready(function () {

            $('#main-table-save').click(function() {
                let cust_id = $('#cust_id').val();
                let customer = $('#customer').val();
                let bill_to = $('#bill_to').val();
                let ship_to = $('#ship_to').val();
                let contact = $('#contact').val();
                let phone = $('#phone').val();
                let fax = $('#fax').val();
                let email = $('#email').val();

                if (!cust_id || !customer || !bill_to || !contact || !phone) {
                    toastr.warning("Please input all information!");
                } else {
                    let data = {
                        cust_id: cust_id,
                        customer: customer,
                        bill_to: bill_to,
                        ship_to: ship_to,
                        contact: contact,
                        phone: phone,
                        fax: fax ? fax : 'None',
                        email: email ? email : 'None'
                    }
                    $.ajax({
                        url: '/customers/create',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: data,
                        success: function(res) {
                            if (res) {
                                let index = customers.findIndex(customer => customer.cust_id == cust_id);
                                if (index >= 0) {
                                    toastr.success(
                                        'Customer is updated successfully!',
                                        "Success",
                                        {
                                            timeOut: 1000,
                                            fadeOut: 1000,
                                            onHidden: function () {
                                                window.location.reload();
                                            }
                                        });
                                    // customers[index].cust_id = cust_id;
                                    // customers[index].customer = customer;
                                    // customers[index].bill_to = bill_to;
                                    // customers[index].ship_to = ship_to;
                                    // customers[index].contact = contact;
                                    // customers[index].phone = phone;
                                    // customers[index].fax = fax;
                                    // customers[index].email = email;
                                } else {
                                    toastr.success(
                                        'New customer is created successfully!',
                                        "Success",
                                        {
                                            timeOut: 1000,
                                            fadeOut: 1000,
                                            onHidden: function () {
                                                window.location.reload();
                                            }
                                        });
                                    // customers.push(data);
                                }
                            } else toastr.warning('Something went wrong!');
                        },
                        error: function (err) {
                            console.log(err);
                            toastr.error('Failed');
                        }
                    })
                }
            })

            $('#main-table-delete').click(function() {
                let cust_id = $('#cust_id').val();
                let index = customers.findIndex(customer => customer.cust_id == cust_id);
                if (index >= 0) {
                    $.ajax({
                        url: '/customers/' + cust_id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            console.log(res);
                            if (res) {
                                toastr.success(
                                    "Customer is deleted successfully!",
                                    "Success",
                                    {
                                        timeOut: 1000,
                                        fadeOut: 1000,
                                        onHidden: function () {
                                            window.location.reload();
                                        }
                                    });
                            }
                            else toastr.warning("Something went wrong!");
                        },
                        error: function(err) {
                            console.log(err);
                            toastr.error("Failed!");
                        }
                    })
                } else {
                    toastr.info("No data selected!")
                }
            })

            $('#main-table-format').click(function() {
                $('#cust_id').val("{{$new_id}}");
                $('#customer').val('');
                $('#bill_to').val('');
                $('#ship_to').val('');
                $('#contact').val('');
                $('#phone').val('');
                $('#fax').val('');
                $('#email').val('');
                toastr.success("You can add new data now!", "Success");
            })

            $(document).click('.customer-btn', function(e) {
                if ($(e.target)[0].localName === 'td') {
                    let cust_id = $(e.target).parent().attr('data');

                    let customer = customers.filter(customer => customer.cust_id == cust_id)[0];

                    $('#cust_id').val(customer.cust_id);
                    $('#customer').val(customer.customer);
                    $('#bill_to').val(customer.bill_to);
                    $('#ship_to').val(customer.ship_to);
                    $('#contact').val(customer.contact);
                    $('#phone').val(customer.phone);
                    $('#fax').val(customer.fax);
                    $('#email').val(customer.email);

                    $('#customers-table').slideToggle();
                }
            })
        })
    </script>
    <script src="{{ asset('assets/js/my_table.js') }}"></script>
    <script src="{{ asset('assets/js/customers.js') }}"></script>
@endsection

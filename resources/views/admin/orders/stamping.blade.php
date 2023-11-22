{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/orders/stamping.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row gutter-b" id="orders-table" style="display: none">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Orders Table</h3>
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
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                @foreach($orders->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 d-flex justify-content-end">
                                <a href="" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <table class="table table-separate table-hover table-head-custom table-foot-custom table-checkable kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            @foreach($orders->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="order-btn" data="{{$order->job}}">
                                @foreach($order as $key => $value)
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
                        <div class="row gutter-b" id="control-panel" style="display: none">
                            <div class="col-lg-7 d-flex justify-content-between">
                                <a class="btn btn-control" id="backward-btn"><i class="fa fa-backward"></i></a>
                                <a class="btn btn-control" id="forward-btn"><i class="fa fa-forward"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 gutter-b">
                                <div class="grid-container-3 mb-10">
                                    <div class="grid-label"><label>Stamping Job No.</label></div>
                                    <div class="grid-input"><input id="job" value="{{$job_no}}"></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input">
                                        <select id="cust_id">
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->cust_id}}">{{$customer->customer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Part No.</label></div>
                                    <div class="grid-input"><input id="part"></div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Rouselle</label>
                                        <input id='rouselle'>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Niagara</label>
                                        <input id='niagara'>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>SEYI</label>
                                        <input id='seyi'>
                                    </div>
                                    <div class="vertical-divider"></div>
                                    <div class="col-2 indi-input">
                                        <label>Rouselle Alt</label>
                                        <input id='rouselleAlt'>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Niagara Alt</label>
                                        <input id='niagaraAlt'>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>SEYI Alt</label>
                                        <input id='seyiAlt'>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>TBlank</label>
                                        <input id='blank_area'>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Blank Alt</label>
                                        <input id='blank_areaAlt'>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Cycles</label>
                                        <input id="cycles">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Linear Feet</label>
                                        <input id="linear_feet">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Strip width</label>
                                        <input id="strip">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Strip width Alt.</label>
                                        <input id="stripAlt">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Die</label>
                                        <input id="die">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Progression</label>
                                        <input id="progression">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Mill Job</label>
                                        <select id="millJob">
                                            @foreach($active_jobs as $active_job)
                                                <option>{{$active_job->job}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cycles to allocate</label>
                                        <input id="millCycles">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">3 Test Cycles? <input type="checkbox" id="testCycles"></label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>Remarks</label></div>
                                                <div class="grid-input"><textarea id="remarks"></textarea></div>
                                                <div class="grid-label"><label>Press</label></div>
                                                <div class="grid-input">
                                                    <select id="press">
                                                        <option value="rouselle">Rouselle</option>
                                                        <option value="niagara">Niagara</option>
                                                        <option value="seyi">SEYI</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('js/pages/crud/datatables/advanced/row-callback.js') }}"></script>
    <script src="{{ asset('assets/js/orders/stamping.js') }}"></script>
    <script>
        const orders = {{Js::from($orders)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');

            $('#main-table-format').click(function() {
                $('#job').val({{$job_no}});
                $('#cust_id').val('');
                $('#po').val('');
                $('#part').val('');
                $('#quantity').val('');
                $('#ordered').val('');
                $('#due').val('');
                $('#ship_date').val('');
                $('#mill_operator').val('').change();
                $('#cutoff_operator').val('').change();
                $('#repair_welder').val('').change();
                $('#inspector').val('').change();
                $('#cont_type').val('').change();
                $('#ship_method').val('').change();
                $('#weld_spec_mill').val('').change();
                $('#weld_spec_repair').val('').change();
                toastr.success("You can add new data now!", "Success");
            })
        })
    </script>
@endsection

{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/inventory/packing_list_entry.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row gutter-b" id="main-table" style="display: none">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Main Table</h3>
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
                                                @foreach($obj_arr->first() as $key => $value)
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
                            @foreach($obj_arr->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($obj_arr as $obj)
                            <tr class="main-table-btn" data="{{$obj->po}}">
                                @foreach($obj as $key => $value)
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
                    <h3 class="card-title">Inventory</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Heat Number</label></div>
                                    <div class="grid-input"><input id="heat_num"></div>
                                    <div class="grid-label"><label>PO</label></div>
                                    <div class="grid-input"><input id="po"></div>
                                    <div class="grid-label"><label>Material Type</label></div>
                                    <div class="grid-input">
                                        <select id="type_mat">
                                            @foreach($materials as $material)
                                                <option>{{$material->material}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Mesh Type</label></div>
                                    <div class="grid-input">
                                        <select id="mesh">
                                            @foreach($mesh_types as $mesh_type)
                                                <option>{{$mesh_type->mesh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Width</label></div>
                                    <div class="grid-input"><input type="number" id="width"></div>
                                    <div class="grid-label"><label>Total Length</label></div>
                                    <div class="grid-input"><input type="number" id="tot_len"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Allocated</label></div>
                                    <div class="grid-input"><input type="checkbox" id="allocated"></div>
                                    <div class="grid-label"><label>Job</label></div>
                                    <div class="grid-input"><input type="number" id="job"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Number of Coils</label></div>
                                    <div class="grid-input"><input type="number" id="no_of_coils"></div>
                                    <div class="grid-label"><label>Length (linear ft.)</label></div>
                                    <div class="grid-input"><input type="number" id="length"></div>
                                    <div class="grid-label"><label>Crate</label></div>
                                    <div class="grid-input"><input type="number" id="crate"></div>
                                </div>
                            </div>
                            <div class="col-lg-1 gutter-b">
                                <div class="pb-3">
                                    <button class="btn btn-plus">+</button>
                                </div>
                                <div>
                                    <button class="btn btn-plus" id="save-btn">Save</button>
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
    <script src="{{ asset('assets/js/inventory/packing_list_entry.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#DataTables_Table_0').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection

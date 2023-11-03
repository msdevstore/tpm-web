{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
@endsection

{{-- Content --}}
@section('content')

    {{-- Main --}}
    <div class="row">
        <div class="col-lg-12 col-xxl-12 order-1 order-xxl-2">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Job No.</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>PO Number</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Part No.</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Date Ordered</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Date Due</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Shipping Date</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                            </div>
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>LF mat</label></div>
                                    <div class="grid-input"><input type="number" step="0.001" placeholder="0.000"></div>
                                    <div class="grid-label"><label>Weight (pre)</label></div>
                                    <div class="grid-input"><input type="number" step="0.001" placeholder="0.000"></div>
                                    <div class="grid-label"><label>Weight (post)</label></div>
                                    <div class="grid-input"><input type="number" step="0.001" placeholder="0.000"></div>
                                    <div class="grid-label"><label>Total tube (ft)</label></div>
                                    <div class="grid-input"><input type="number" step="0.001" placeholder="0.000"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Mill</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Mill Operator</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Cut Off Operator</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Repair Welder</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Inspector</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Container Type</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Shipping Method</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                </div>
                            </div>
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Mill Weld Spec</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                    <div class="grid-label"><label>Repair Weld Spec</label></div>
                                    <div class="grid-input"><select><option></option></select></div>
                                </div>
                            </div>
                            <div class="col-lg-4 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>LF mat</label></div>
                                    <div class="grid-input"><input type="text"></div>
                                    <div class="grid-label"><label>Weight (pre)</label></div>
                                    <div class="grid-input"><input type="number"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Ship Date</label></div>
                                    <div class="grid-input"><input type="text"></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input type="number"></div>
                                </div>
                            </div>
                            <div class="col-lg-1 gutter-b">
                                <button class="btn btn-secondary">+</button>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-around">
                                    <div>
                                         <label><input name="coildata" type="radio"> Allocated</label>
                                    </div>
                                    <div>
                                        <label><input name="coildata" type="radio"> All material widths</label>
                                    </div>
                                    <div>
                                        <label><input name="coildata" type="radio"> Part specific widths</label>
                                    </div>
                                </div>
                                <div class="table-container" style="height: 150px; border: 1px solid #ccc">
                                    <table class="table table-bordered table-head-bg text-center">
                                        <thead>
                                        <tr>
                                            <th>Coil</th>
                                            <th>Weight</th>
                                            <th>Width</th>
                                            <th>Worker#</th>
                                            <th>Heat#</th>
                                            <th>Job</th>
                                            <th>Allocated</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-success mr-2">Allocate </button>
                                    <button class="btn btn-success mr-2">Deallocate </button>
                                    <button class="btn btn-success">Deallocate </button>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-8">
                                <div class="alert alert-primary" role="alert">
                                    Weight Allocated: 0
                                </div>
                                <div class="alert alert-primary" role="alert">
                                    Weight already used: 0
                                </div>
                                <div class="alert alert-primary" role="alert">
                                    Total Weight dedicated to job: 0
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-around">
                                    <div>
                                        <label><input name="coildata" type="radio"> Allocated </label>
                                    </div>
                                    <div>
                                        <label><input name="coildata" type="radio"> All Mesh </label>
                                    </div>
                                    <div>
                                        <label><input name="coildata" type="radio"> Part Specific Mesh </label>
                                    </div>
                                </div>
                                <div class="table-container" style="height: 150px; border: 1px solid #ccc">
                                    <div class="tab-list">
                                        <div class="tab-list-item active">Layer 1 Mesh</div>
                                        <div class="tab-list-item">Layer 2 Mesh</div>
                                        <div class="tab-list-item">Drainage 1 Mesh</div>
                                        <div class="tab-list-item">Drainage 2 Mesh</div>
                                    </div>
                                    <table class="table table-head-bg text-center">
                                        <thead>
                                        <tr>
                                            <th>Mesh Type</th>
                                            <th>Type</th>
                                            <th>Recieved</th>
                                            <th>Width</th>
                                            <th>Length</th>
                                            <th>Allocated</th>
                                            <th>TPM JOB</th>
                                            <th>Heat#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="card-footer">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-10">--}}
{{--                                <button type="reset" class="btn btn-success mr-2">Submit</button>--}}
{{--                                <button type="reset" class="btn btn-secondary">Cancel</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('assets/js/orders_all.js') }}" type="text/javascript"></script>
@endsection

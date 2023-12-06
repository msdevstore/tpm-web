{{-- Extends layout --}}
@extends('layout.default')

{{-- Style --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/part_information.css') }}" />
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
                                                @foreach($obj_arr->first() as $key => $value)
                                                    <option>{{$key}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-light-primary px-6 font-weight-bold" id="my_search_btn">Search</a>
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
                            @foreach($obj_arr->first() as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($obj_arr as $obj)
                            <tr class="main-table-btn" data="{{$obj->part}}">
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
                    <h3 class="card-title">Information</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 gutter-b">
                                <div class="grid-container-3 mb-10">
                                    <div class="grid-label"><label>Part#</label></div>
                                    <div class="grid-input"><input id="part"></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input">
                                        <select id="cust_id">
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->cust_id}}">{{$customer->customer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Part Description</label></div>
                                    <div class="grid-input"><textarea id="description"></textarea></div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Dimension</label>
                                        <input type="text" id="dim">
                                    </div>
                                    <div class="col-1 indi-input">
                                        <label>ID ?</label>
                                        <input type="checkbox" id="id_not_od">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Dim +</label>
                                        <input type="text" id="dim_plus">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Dim -</label>
                                        <input type="text" id="dim_minus">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Material</label>
                                        <select id="material">
                                            @foreach($materials as $material)
                                                <option>{{$material->material}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Gage</label>
                                        <select id="gage">
                                            @foreach($gages as $gage)
                                                <option>{{$gage->gage}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Actual Mill Angle</label>
                                        <input type="text" id="act_mill_angle">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Pattern</label>
                                        <select id="pattern">
                                            @foreach($patterns as $pattern)
                                                <option>{{$pattern->pattern}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Hole Size</label>
                                        <select id="holes">
                                            @foreach($fracs as $frac)
                                                <option value="{{$frac->decimal}}">{{$frac->holes}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Hole Center</label>
                                        <select id="centers">
                                            @foreach($fracs as $frac)
                                                <option value="{{$frac->decimal}}">{{$frac->centers}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Die position</label>
                                        <input id="die_position">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Die</label>
                                        <select id="die">
                                            @foreach($dies as $die)
                                                <option value="{{$die->die}}">{{$die->die_id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Table height</label>
                                        <input id="table_height">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Table position</label>
                                        <input id="table_position">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Cutoff length</label>
                                        <input id="cutoff_length">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cutoff length +</label>
                                        <input id="cutoff_length_plus">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cutoff length -</label>
                                        <input id="cutoff_length_minus">
                                    </div>
                                    <div class="vertical-divider"></div>
                                    <div class="col-2 indi-input">
                                        <label>Finish length</label>
                                        <input id="finished_length">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Length +</label>
                                        <input id="length_plus">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Length -</label>
                                        <input id="length_minus">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">Welded ring Shrouded Cutoff length? <input type="checkbox" id="welded_ring"></label>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Strip width</label>
                                        <input id="strip">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>ID Drift</label>
                                        <select id="drift_od">
                                            @foreach($drifts as $drift)
                                                <option>{{$drift->drift_od}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Mill</label>
                                        <select id="mill">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">Dimple depth? <input type="checkbox" id="depth_of_dimple"></label>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">Blank end ring? <input type="checkbox" id="blank_end"></label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Stamping</h3>
                                        <div class="d-flex mb-5">
                                            <div class="col-6 indi-input">
                                                <label>Stamping Die</label>
                                                <select id="die_stamp">
                                                    @foreach($die_stamps as $die_stamp)
                                                        <option>{{$die_stamp->die_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6 indi-input">
                                                <label>Progression</label>
                                                <input id="progression">
                                            </div>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">hit count? <input type="checkbox" id="hit_count"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">blank area? <input type="checkbox" id="blank_area"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">cycles? <input type="checkbox" id="cycles"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">linear feet? <input type="checkbox" id="linear_feet"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">louver? <input type="checkbox" id="is_louver"></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3>Excluder Ring</h3>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">Ring On 1 End? <input type="checkbox" id="ring1"></label> &nbsp; &nbsp;
                                            <label class="main-color">Ring On Both Ends? <input type="checkbox" id="ring2"></label>
                                        </div>
                                        <h3>GeoForm</h3>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">GeoForm Job <input type="checkbox" id="geo_job"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gutter-b">
                                        <div class="col-6">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>Layer 1 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select id="layer_1_mesh">
                                                        @foreach($meshes as $mesh)
                                                            <option>{{$mesh->mesh}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Layer 1 Width</label></div>
                                                <div class="grid-input"><input id="layer_1_width"></div>
                                                <div class="grid-label"><label>Drainage 1 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select id="drainage_1_mesh">
                                                        @foreach($meshes as $mesh)
                                                            <option>{{$mesh->mesh}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Drainage 1 Width</label></div>
                                                <div class="grid-input"><input id="drainage_1_width"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>Layer 2 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select id="layer_2_mesh">
                                                        @foreach($meshes as $mesh)
                                                            <option>{{$mesh->mesh}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Layer 2 Width</label></div>
                                                <div class="grid-input"><input id="layer_2_width"></div>
                                                <div class="grid-label"><label>Drainage 2 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select id="drainage_2_mesh">
                                                        @foreach($meshes as $mesh)
                                                            <option>{{$mesh->mesh}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Drainage 2 Width</label></div>
                                                <div class="grid-input"><input id="drainage_2_width"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>MFG Notes</label></div>
                                                <div class="grid-input"><textarea id="notes"></textarea></div>
                                                <div class="grid-label"><label>INSP. Notes</label></div>
                                                <div class="grid-input"><textarea id="insp_notes"></textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="title text-center h-40px pt-3 bg-success text-white"><i class="fa fa-inbox text-white"></i> Calculations will be done after part is saved</div>
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>OA</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Tube Weight</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Tube length in feet</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>weight/foot</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>hspi</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Angle</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>lf per foot</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>lf per tube</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Drawing</label></div>
                                    <div class="grid-input"><input type="file"></div>
                                    <div class="grid-label"><label>Drawing Number</label></div>
                                    <div class="grid-input"><input></div>
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
    <script src="{{ asset('assets/js/my_table.js') }}"></script>
    <script src="{{ asset('assets/js/part_information.js') }}"></script>
    <script>
        const objArr = {{Js::from($obj_arr)}};

        $(document).ready(function() {
            $('#my_table').parent().css('overflow-x', 'auto');
        })
    </script>
@endsection

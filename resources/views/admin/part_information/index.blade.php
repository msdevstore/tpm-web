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
                    <h3 class="card-title">Information</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 gutter-b">
                                <div class="grid-container-3 mb-10">
                                    <div class="grid-label"><label>Part#</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Customer</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Part Description</label></div>
                                    <div class="grid-input"><textarea></textarea></div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Dimension</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-1 indi-input">
                                        <label>ID ?</label>
                                        <input type="checkbox">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Dim +</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Dim -</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Material</label>
                                        <select>
                                            <option>304</option>
                                            <option>304L</option>
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Gage</label>
                                        <select>
                                            <option>304</option>
                                            <option>304L</option>
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Actual Mill Angle</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Pattern</label>
                                        <select>
                                            <option>60 staggered</option>
                                            <option>Blank</option>
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Hole Size</label>
                                        <select>
                                            <option>1 / 16</option>
                                            <option>1 / 8</option>
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Hole Center</label>
                                        <select>
                                            <option>1 / 16</option>
                                            <option>1 / 8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Die position</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Die</label>
                                        <select>
                                            <option>15.75</option>
                                            <option>12.05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Table height</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Table position</label>
                                        <input>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Cutoff length</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cutoff length +</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Cutoff length -</label>
                                        <input>
                                    </div>
                                    <div class="vertical-divider"></div>
                                    <div class="col-2 indi-input">
                                        <label>Finish length</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Length +</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Length -</label>
                                        <input>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">Welded ring Shrouded Cutoff length? <input type="checkbox"></label>
                                </div>
                                <div class="d-flex mb-5">
                                    <div class="col-2 indi-input">
                                        <label>Die position</label>
                                        <input>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Die</label>
                                        <select>
                                            <option>drift_od	dift</option>
                                            <option>1.315	TPM</option>
                                        </select>
                                    </div>
                                    <div class="col-2 indi-input">
                                        <label>Die</label>
                                        <select>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">Dimple depth? <input type="checkbox"></label>
                                </div>
                                <div class="d-flex mb-5">
                                    <label class="main-color">Blank end ring? <input type="checkbox"></label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Stamping</h3>
                                        <div class="d-flex mb-5">
                                            <div class="col-6 indi-input">
                                                <label>Stamping Die</label>
                                                <select>
                                                    <option>15.75</option>
                                                    <option>12.05</option>
                                                </select>
                                            </div>
                                            <div class="col-6 indi-input">
                                                <label>Progression</label>
                                                <input>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">hit count? <input type="checkbox"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">blank area? <input type="checkbox"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">cycles? <input type="checkbox"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">linear feet? <input type="checkbox"></label>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">louver? <input type="checkbox"></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h3>Excluder Ring</h3>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">Ring On 1 End? <input type="checkbox"></label> &nbsp; &nbsp;
                                            <label class="main-color">Ring On Both Ends? <input type="checkbox"></label>
                                        </div>
                                        <h3>GeoForm</h3>
                                        <div class="d-flex mb-5">
                                            <label class="main-color">GeoForm Job <input type="checkbox"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gutter-b">
                                        <div class="col-6">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>Layer 1 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Layer 1 Width</label></div>
                                                <div class="grid-input"><input></div>
                                                <div class="grid-label"><label>Drainage 1 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Drainage 1 Width</label></div>
                                                <div class="grid-input"><input></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>Layer 2 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Layer 2 Width</label></div>
                                                <div class="grid-input"><input></div>
                                                <div class="grid-label"><label>Drainage 2 Mesh</label></div>
                                                <div class="grid-input">
                                                    <select>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="grid-label"><label>Drainage 2 Width</label></div>
                                                <div class="grid-input"><input></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="grid-container-3">
                                                <div class="grid-label"><label>MFG Notes</label></div>
                                                <div class="grid-input"><textarea></textarea></div>
                                                <div class="grid-label"><label>INSP. Notes</label></div>
                                                <div class="grid-input"><textarea></textarea></div>
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
@endsection

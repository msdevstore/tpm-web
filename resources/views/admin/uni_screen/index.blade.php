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
                    <h3 class="card-title">Uni_Screen</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="row gutter-b">
                            <div class="col-lg-3">
                                <div class="grid-container-1" style="height: 250px; overflow-y: auto">
                                    <div class="grid-label"><label>mesh</label></div>
                                    <div class="grid-label"><label>200 lat</label></div>
                                    <div class="grid-label"><label>20x150</label></div>
                                    <div class="grid-label"><label>18x210</label></div>
                                    <div class="grid-label"><label>60X50</label></div>
                                    <div class="grid-label"><label>60x40</label></div>
                                    <div class="grid-label"><label>150 mesh</label></div>
                                    <div class="grid-label"><label>18x140</label></div>
                                    <div class="grid-label"><label>40 Mesh</label></div>
                                    <div class="grid-label"><label>18 Mesh</label></div>
                                    <div class="grid-label"><label>152x24</label></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Inner Shroud ID</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Inner Shroud Gage</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Outer Shroud Gage</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Outer Shroud Strip</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                                <div class="gutter-t">
                                    <button class="btn btn-success">Delete Layers</button>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="child-fieldset">
                                    <legend>Inner shroud</legend>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Pattern</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Holes</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Centers</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="gutter-t px-5">
                                    <div class="d-flex justify-content-between">
                                        <span>Inner Shroud ID</span>
                                        <span>NaN</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Inner Shroud OD</span>
                                        <span>NaN</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Layers Thickness</span>
                                        <span>0.3440</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="child-fieldset">
                                    <legend>Inner shroud</legend>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Pattern</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Holes</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Centers</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="gutter-t px-5">
                                    <div class="d-flex justify-content-between">
                                        <span>Inner Shroud ID</span>
                                        <span>NaN</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Inner Shroud OD</span>
                                        <span>NaN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-8">
                                <table class="table table-bordered table-head-bg">
                                    <thead>
                                    <tr>
                                        <th>Layer</th>
                                        <th>Mesh</th>
                                        <th>Wires</th>
                                        <th>Weave</th>
                                        <th>Thickness</th>
                                        <th>Weight</th>
                                        <th>Width</th>
                                        <th>Gap</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>30 Mesh</td>
                                        <td>0.012</td>
                                        <td>Plain</td>
                                        <td>0.0220</td>
                                        <td>0.30000</td>
                                        <td><input></td>
                                        <td><input></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>30 Mesh</td>
                                        <td>0.012</td>
                                        <td>Plain</td>
                                        <td>0.0220</td>
                                        <td>0.30000</td>
                                        <td><input></td>
                                        <td><input></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>30 Mesh</td>
                                        <td>0.012</td>
                                        <td>Plain</td>
                                        <td>0.0220</td>
                                        <td>0.30000</td>
                                        <td><input></td>
                                        <td><input></td>
                                    </tr>
                                    </tbody>
                                </table>
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

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
                            <div class="col-lg-2">
                                <div class="grid-container-1" style="height: 250px; overflow-y: auto">
                                    <div class="grid-label"><label>mesh</label></div>
                                    @foreach($meshes as $mesh)
                                        <div class="grid-label"><label>{{$mesh->mesh}}</label></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Inner Shroud ID</label></div>
                                    <div class="grid-input"><input></div>
                                    <div class="grid-label"><label>Inner Shroud Gage</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option>--Select--</option>
                                            @foreach($gages as $gage)
                                                <option>{{$gage->gage}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Outer Shroud Gage</label></div>
                                    <div class="grid-input">
                                        <select>
                                            <option>--Select--</option>
                                            @foreach($gages as $gage)
                                                <option>{{$gage->gage}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-label"><label>Outer Shroud Strip</label></div>
                                    <div class="grid-input"><input></div>
                                </div>
                                <div class="gutter-t">
                                    <button class="btn-control">Delete Layers</button>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="child-fieldset">
                                    <legend>Inner shroud</legend>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Pattern</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option>--Select--</option>
                                                @foreach($patterns as $pattern)
                                                    <option>{{$pattern->pattern}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Holes</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option>--Select--</option>
                                                @foreach($fracs as $frac)
                                                    <option value="{{$frac->decimal}}">{{$frac->holes}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Centers</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option>--Select--</option>
                                                @foreach($fracs as $frac)
                                                    <option value="{{$frac->decimal}}">{{$frac->centers}}</option>
                                                @endforeach
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
                                    <legend>Outer shroud</legend>
                                    <div class="grid-container-3">
                                        <div class="grid-label"><label>Pattern</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option>--Select--</option>
                                                @foreach($patterns as $pattern)
                                                    <option>{{$pattern->pattern}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Holes</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option>--Select--</option>
                                                @foreach($fracs as $frac)
                                                    <option value="{{$frac->decimal}}">{{$frac->holes}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid-label"><label>Centers</label></div>
                                        <div class="grid-input">
                                            <select>
                                                <option>--Select--</option>
                                                @foreach($fracs as $frac)
                                                    <option value="{{$frac->decimal}}">{{$frac->centers}}</option>
                                                @endforeach
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
                            <div class="col-7">
                                <div class="table-container">
                                    <table class="table table-bordered table-height table-head-bg">
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
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-7">
                                        <button type="button" class="btn-control">Calculate Widths</button>
                                        <button type="button" class="btn-control">Calculate Gaps</button>
                                    </div>
                                    <div class="col-5">
                                        <div class="grid-container-3">
                                            <div class="grid-label"><label>Gaps</label></div>
                                            <div class="grid-input">
                                                <select>
                                                    <option>--Select--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="table-container">
                                    <table class="table table-bordered table-height table-head-bg">
                                        <thead>
                                        <tr>
                                            <th>Layer</th>
                                            <th>Mesh</th>
                                            <th>Lft Req'd</th>
                                            <th>Weight Req'd</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        </tr>
                                        </tbody>
                                    </table>
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipInfoController extends Controller
{
    public function index()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('ship_info')->get();
        $vias = DB::table('via')->get();
        $rings = DB::table('rings')->get();

        return view('admin.ship_info.index', compact('page_title', 'page_description', 'obj_arr', 'vias', 'rings'));
    }
}

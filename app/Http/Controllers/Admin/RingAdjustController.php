<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RingAdjustController extends Controller
{

    public function index()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('ring_detail')->get();
        $excluder_rings = DB::table('excluder_rings')->get();

        return view('admin.ring_adjustment.index', compact('page_title', 'page_description', 'obj_arr', 'excluder_rings'));
    }

}

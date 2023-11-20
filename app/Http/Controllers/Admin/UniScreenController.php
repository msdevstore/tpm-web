<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniScreenController extends Controller
{

    public function index()
    {
        $page_title = '';
        $page_description = '';

        $gages = DB::table('gage_tbl')->get();
        $meshes = DB::table('mesh_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();

        return view('admin.uni_screen.index', compact('page_title', 'page_description', 'meshes', 'patterns', 'fracs', 'gages'));
    }

}

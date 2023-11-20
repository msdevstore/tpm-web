<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function steelWorkNumber()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('steel_tbl')->get();
        $work = DB::table('steel_tbl')->orderBy('work', 'desc')->first()->work;
        $materials = DB::table('mat_tbl')->get();
        $gages = DB::table('gage_tbl')->get();
        $patterns = DB::table('pat_tbl')->get();
        $fracs = DB::table('frac_tbl')->get();

        return view('admin.inventory.steel_work_number', compact('page_title', 'page_description', 'obj_arr', 'work', 'materials', 'gages', 'patterns', 'fracs'));
    }

    public function receiveCoilMill()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('coil_tbl')->get();
        $steels = DB::table('steel_tbl')->get();
        $operators = DB::table('operators')->get();

        return view('admin.inventory.receive_coil_mill', compact('page_title', 'page_description', 'obj_arr', 'steels', 'operators'));
    }

    public function receiveCoilStamping()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('raw_coil_tbl')->get();
        $steels = DB::table('steel_tbl')->get();

        return view('admin.inventory.receive_coil_stamping', compact('page_title', 'page_description', 'obj_arr', 'steels'));
    }

    public function meshReceiving()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('mesh_tbl')->get();
        $mesh_types = DB::table('mesh')->get();
        $materials = DB::table('mat_tbl')->get();

        return view('admin.inventory.mesh_receiving', compact('page_title', 'page_description', 'obj_arr', 'mesh_types', 'materials'));
    }

    public function meshInventory()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('mesh_tbl')->where('splice_chk', 1)->get();
        $mesh_types = DB::table('mesh')->get();
        $materials = DB::table('mat_tbl')->get();

        return view('admin.inventory.mesh_inventory', compact('page_title', 'page_description', 'obj_arr', 'mesh_types', 'materials'));
    }

    public function meshAllocated()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('mesh_tbl')->where('allocated', 1)->get();
        $mesh_types = DB::table('mesh')->get();
        $materials = DB::table('mat_tbl')->get();

        return view('admin.inventory.mesh_allocated', compact('page_title', 'page_description', 'obj_arr', 'mesh_types', 'materials'));
    }

    public function usedMesh()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('used_mesh')->get();
        $mesh_types = DB::table('mesh')->get();
        $materials = DB::table('mat_tbl')->get();

        return view('admin.inventory.used_mesh', compact('page_title', 'page_description', 'obj_arr', 'mesh_types', 'materials'));
    }

    public function packingListEntry()
    {
        $page_title = '';
        $page_description = '';
        $obj_arr = DB::table('packing_list_entry')->get();
        $mesh_types = DB::table('mesh')->get();
        $materials = DB::table('mat_tbl')->get();

        return view('admin.inventory.packing_list_entry', compact('page_title', 'page_description', 'obj_arr', 'mesh_types', 'materials'));
    }

}

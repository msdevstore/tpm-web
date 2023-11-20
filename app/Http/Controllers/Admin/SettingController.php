<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function users()
    {
        $page_title = '';
        $page_description = '';

        $users = DB::table('users')->get();

        return view('admin.setting.users', compact('page_title', 'page_description', 'users'));
    }

    public function userView($id) {
        $page_title = '';
        $page_description = '';

        $user = DB::table('users')->where('id', $id)->first();
        $pages = DB::table('pages')->get();
        $obj_arr = [];
        foreach ($pages as $page) {
            $tempObj['page'] = $page->description;
            $permissions = DB::table('permissions')->where('page_id', $page->id)->get();
            $temp = '';
            foreach ($permissions as $permission) {
                $result = DB::table('users_permissions')->where(['user_id' => $id, 'permission_id' => $permission->id])->first();
                if ($result) $checked = 'checked';
                else $checked = '';
                $temp .= "<label><input type='checkbox' name='$permission->id' value='$id' $checked> $permission->description </label>";
            }
            $tempObj['content'] = $temp;
            $obj_arr[] = $tempObj;
        }

        return view('admin.setting.user_view', compact('page_title', 'page_description', 'user', 'obj_arr'));
    }

    public function instructionType()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('instr_type')->get();

        return view('admin.setting.instruction_type', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function statusType()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('status_type')->get();

        return view('admin.setting.status_type', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function tpmType()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('tpm_type')->get();

        return view('admin.setting.tpm_type', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function unitTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('unit_tbl')->get();

        return view('admin.setting.unit_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function container()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('cont')->get();

        return view('admin.setting.container', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function shipMethod()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('ship_method')->get();

        return view('admin.setting.ship_method', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function dieTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('die_tbl')->get();

        return view('admin.setting.die_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function stampingDieTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('die_stamp_tbl')->get();

        return view('admin.setting.stamping_die_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function drifts()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('drifts')->get();

        return view('admin.setting.drifts', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function employee()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('employee')->get();

        return view('admin.setting.employee', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function excluderRings()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('excluder_rings')->get();

        return view('admin.setting.excluder_rings', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function fractionTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('frac_tbl')->get();

        return view('admin.setting.fraction_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function gageTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('gage_tbl')->get();

        return view('admin.setting.gage_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function materialTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('mat_tbl')->get();

        return view('admin.setting.material_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function meshTypes()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('mesh')->get();

        return view('admin.setting.mesh_types', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function micron()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('micron')->get();

        return view('admin.setting.micron', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function operatorList()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('operators')->get();

        return view('admin.setting.operator_list', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function patternTable()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('pat_tbl')->get();

        return view('admin.setting.pattern_table', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function weldSpecMil()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('weld_spec_mill')->get(); // weld_spec_repair

        return view('admin.setting.weld_spec_mil', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function shipViaList()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('via')->get();

        return view('admin.setting.ship_via_list', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function rings()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('rings')->get();

        return view('admin.setting.rings', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function footerSettings()
    {
        $page_title = '';
        $page_description = '';

        $obj_arr = DB::table('footer_for_pdf')->get();

        return view('admin.setting.footer_settings', compact('page_title', 'page_description', 'obj_arr'));
    }

}

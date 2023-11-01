<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function users()
    {
        $page_title = 'Users';
        $page_description = 'Some description for setting';

        return view('admin.setting.users', compact('page_title', 'page_description'));
    }

    public function instructionType()
    {
        $page_title = 'Instruction Type';
        $page_description = 'Some description for setting';

        return view('admin.setting.instruction_type', compact('page_title', 'page_description'));
    }

    public function statusType()
    {
        $page_title = 'Status Type';
        $page_description = 'Some description for setting';

        return view('admin.setting.status_type', compact('page_title', 'page_description'));
    }

    public function tpmType()
    {
        $page_title = 'TPM Type';
        $page_description = 'Some description for setting';

        return view('admin.setting.tpm_type', compact('page_title', 'page_description'));
    }

    public function unitTable()
    {
        $page_title = 'Unit Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.unit_table', compact('page_title', 'page_description'));
    }

    public function container()
    {
        $page_title = 'Container';
        $page_description = 'Some description for setting';

        return view('admin.setting.container', compact('page_title', 'page_description'));
    }

    public function shipMethod()
    {
        $page_title = 'Ship Method';
        $page_description = 'Some description for setting';

        return view('admin.setting.ship_method', compact('page_title', 'page_description'));
    }

    public function dieTable()
    {
        $page_title = 'Die Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.die_table', compact('page_title', 'page_description'));
    }

    public function stampingDieTable()
    {
        $page_title = 'Stamping Die Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.stamping_die_table', compact('page_title', 'page_description'));
    }

    public function drifts()
    {
        $page_title = 'Drifts';
        $page_description = 'Some description for setting';

        return view('admin.setting.drifts', compact('page_title', 'page_description'));
    }

    public function employee()
    {
        $page_title = 'Employee';
        $page_description = 'Some description for setting';

        return view('admin.setting.employee', compact('page_title', 'page_description'));
    }

    public function excluderRings()
    {
        $page_title = 'Excluder Rings';
        $page_description = 'Some description for setting';

        return view('admin.setting.excluder_rings', compact('page_title', 'page_description'));
    }

    public function fractionTable()
    {
        $page_title = 'Fraction Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.fraction_table', compact('page_title', 'page_description'));
    }

    public function gageTable()
    {
        $page_title = 'Gage Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.gage_table', compact('page_title', 'page_description'));
    }

    public function materialTable()
    {
        $page_title = 'Material Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.material_table', compact('page_title', 'page_description'));
    }

    public function meshTypes()
    {
        $page_title = 'Mesh Types';
        $page_description = 'Some description for setting';

        return view('admin.setting.mesh_types', compact('page_title', 'page_description'));
    }

    public function micron()
    {
        $page_title = 'Micron';
        $page_description = 'Some description for setting';

        return view('admin.setting.micron', compact('page_title', 'page_description'));
    }

    public function operatorList()
    {
        $page_title = 'Operator List';
        $page_description = 'Some description for setting';

        return view('admin.setting.operator_list', compact('page_title', 'page_description'));
    }

    public function patternTable()
    {
        $page_title = 'Pattern Table';
        $page_description = 'Some description for setting';

        return view('admin.setting.pattern_table', compact('page_title', 'page_description'));
    }

    public function weldSpecMil()
    {
        $page_title = 'Weld Spec Mil';
        $page_description = 'Some description for setting';

        return view('admin.setting.weld_spec_mil', compact('page_title', 'page_description'));
    }

    public function shipViaList()
    {
        $page_title = 'Ship Via List';
        $page_description = 'Some description for setting';

        return view('admin.setting.ship_via_list', compact('page_title', 'page_description'));
    }

    public function rings()
    {
        $page_title = 'Rings';
        $page_description = 'Some description for setting';

        return view('admin.setting.rings', compact('page_title', 'page_description'));
    }

    public function footerSettings()
    {
        $page_title = 'Footer Settings';
        $page_description = 'Some description for setting';

        return view('admin.setting.footer_settings', compact('page_title', 'page_description'));
    }

}

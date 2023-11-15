<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getMeshTotal($jobNo)
    {
        $weight1 = DB::table('mesh_infos')->where('tpm_job', $jobNo)->sum('length');
        $weight2 = DB::table('used_meshes')->where('tpm_job', $jobNo)->sum('length');
        return [
            'ML' => $weight1,
            'EL' => $weight2
        ];
    }

    public function getWeight($job) {
        $weight1 = DB::table('coils')->where('job', $job)->sum('weight');
        $weight2 = DB::table('used_coils')->where('job', $job)->sum('weight');
        return [
            'tw' => $weight1,
            'used' => $weight2
        ];
    }

    public function custOrderWise() {
        return DB::table('customers')->orderBy('name')->select('id', 'name')->get();
    }

    public function getWeightList($job) {
        $weight1 = DB::table('abc')->where('job', $job)->sum('weight');
        $weight2 = DB::table('used_coils')->where('job', $job)->sum('weight');
        return [
            'tw' => $weight1,
            'used' => $weight2
        ];
    }

    public function getActiveJobs() {
        return DB::table('orders')->where('has_finished', 0)->get();
    }

    public function getParts($job) {
        return DB::table('stamping_orders')->where('job', $job)->get();
    }

    public function getDrawing($part, $cust_id) {
        return DB::table('download_references')->where([
            'part' => $part,
            'cust_id' => $cust_id
        ])->select('download_ref')->first();
    }
}

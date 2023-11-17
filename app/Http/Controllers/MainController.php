<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function orderListMeshOrder(Request $request) {
        $part = $request->part;
        $job = $request->job;
        $type = $request->type;
        $num = $request->num;

        $part = DB::table('part_tbl')
            ->where('part', $part)
            ->select('layer_1_mesh', 'layer_1_width', 'layer_2_mesh', 'layer_2_width', 'drainage_1_mesh', 'drainage_1_width', 'drainage_2_mesh', 'drainage_2_width', 'strip', 'type')
            ->first();

        $meshes = [];

        if ($num == 1) {
            if ($type == 1) {
                $meshes = DB::table('mesh_tbl')
                    ->where([
                        'mesh' => $part->layer_1_mesh,
                        'allocated' => 1,
                        'job' => $job
                    ])
                    ->select(['mesh_no', 'mesh', 'type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 2) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->layer_1_mesh,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 3) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->layer_1_mesh,
                        'mesh_tbl.width' => $part->layer_1_width,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            }
        } else if ($num == 2) {
            if ($type == 1) {
                $meshes = DB::table('mesh_tbl')
                    ->where([
                        'mesh' => $part->layer_2_mesh,
                        'allocated' => 1,
                        'job' => $job
                    ])
                    ->select(['mesh_no', 'mesh', 'type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 2) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->layer_2_mesh,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 3) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->layer_2_mesh,
                        'mesh_tbl.width' => $part->layer_2_width,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            }
        } else if ($num == 3) {
            if ($type == 1) {
                $meshes = DB::table('mesh_tbl')
                    ->where([
                        'mesh' => $part->drainage_1_mesh,
                        'allocated' => 1,
                        'job' => $job
                    ])
                    ->select(['mesh_no', 'mesh', 'type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 2) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->drainage_1_mesh,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 3) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->drainage_1_mesh,
                        'mesh_tbl.width' => $part->drainage_1_width,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            }
        } else if ($num == 4) {
            if ($type == 1) {
                $meshes = DB::table('mesh_tbl')
                    ->where([
                        'mesh' => $part->drainage_2_mesh,
                        'allocated' => 1,
                        'job' => $job
                    ])
                    ->select(['mesh_no', 'mesh', 'type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 2) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->drainage_2_mesh,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            } else if ($type == 3) {
                $meshes = DB::table('mesh_tbl')
                    ->join('part_tbl', 'mesh_tbl.type', '=', 'part_tbl.type')
                    ->where([
                        'mesh_tbl.mesh' => $part->drainage_2_mesh,
                        'mesh_tbl.width' => $part->drainage_2_width,
                        'mesh_tbl.type' => $part->type,
                        'mesh_tbl.allocated' => 0
                    ])
                    ->select(['mesh_no', 'mesh', 'mesh_tbl.type', 'date_received', 'width', 'length', 'allocated', 'TPM_JOB', 'heat'])
                    ->get();
            }
        }

        return response()->json($meshes);
    }

    public function updateAllocation(Request $request) {
        $ids = $request->ids;
        $num = $request->num;
        $job = $request->job;
        switch ($num) {
            case 1: {
                foreach ($ids as $id) {
                    DB::table('coil_tbl')->where('coil_no', $id)->update([
                        'allocated' => 1,
                        'job' => $job
                    ]);
                }
            } break;
            case 2: {
                foreach ($ids as $id) {
                    DB::table('coil_tbl')->where('coil_no', $id)->update([
                        'allocated' => 0,
                        'job' => 0
                    ]);
                }
            } break;
            case 3: {
                foreach ($ids as $id) {
                    $coil = DB::table('coil_tbl')->where('coil_no', $id)->first();

                    DB::table('used_coil')->insert([
                        'coil_no' => $coil->coil_no,
                        'work' => $coil->work,
                        'weight' => $coil->weight,
                        'job' => $coil->job,
                        'date_received' => $coil->date_received,
                        'date_used' => $coil->date_received,
                        'operator' => $coil->operator
                    ]);
                }
            } break;
            case 4: {
                foreach ($ids as $id) {
                    foreach ($ids as $id) {
                        DB::table('mesh_tbl')->where('mesh_no', $id)->update([
                            'allocated' => 1,
                            'job' => $job,
                            'TPM_JOB' => $job
                        ]);
                    }
                }
            } break;
            case 5: {
                foreach ($ids as $id) {
                    foreach ($ids as $id) {
                        DB::table('mesh_tbl')->where('mesh_no', $id)->update([
                            'allocated' => 0,
                            'job' => 0,
                            'TPM_JOB' => 0
                        ]);
                    }
                }
            } break;
        }
        return response()->json($ids);
    }
    public function getOrderListCoil(Request $request) {
        $type = $request->type;
        $part = $request->part;
        $job = $request->job;

        $data = [];

        switch ($type) {
            case 1: {
                $data = DB::table('coil_tbl')
                    ->where([
                        'job' => $job,
                        'allocated' => 1
                    ])
                    ->orderBy('coil_tbl.job')
                    ->get();
            }; break;
            case 2: {
                $data = DB::table('coil_tbl')
                    ->join('steel_tbl', 'coil_tbl.work', '=', 'steel_tbl.work')
                    ->where('coil_tbl.allocated', 0)
                    ->select('coil_tbl.coil_no',
                        'coil_tbl.coil_no',
                        'coil_tbl.weight',
                        'steel_tbl.material',
                        'coil_tbl.work',
                        'steel_tbl.gage',
                        'steel_tbl.pattern',
                        'steel_tbl.holes',
                        'steel_tbl.centers',
                        'steel_tbl.width',
                        'steel_tbl.heat',
                        'coil_tbl.date_received',
                        'coil_tbl.allocated',
                        'coil_tbl.job',
                        'coil_tbl.cycles',
                        'coil_tbl.stamp_job')
                    ->orderBy('coil_tbl.job')
                    ->get();
            }; break;
            case 3: {
                $data = DB::table('coil_tbl')
                    ->join('steel_tbl', 'coil_tbl.work', '=', 'steel_tbl.work')
                    ->join('part_tbl', 'steel_tbl.pattern', '=', 'part_tbl.pattern')
                    ->where([
                        'coil_tbl.job' => 0,
                        'coil_tbl.allocated' => 0,
                        'part_tbl.part' => $part
                    ])
                    ->select('coil_tbl.coil_no',
                        'coil_tbl.weight',
                        'steel_tbl.material',
                         'coil_tbl.work',
                         'steel_tbl.gage',
                         'steel_tbl.pattern',
                         'steel_tbl.holes',
                         'steel_tbl.centers',
                         'steel_tbl.width',
                         'steel_tbl.heat',
                         'coil_tbl.date_received',
                         'coil_tbl.allocated',
                         'coil_tbl.job',
                         'coil_tbl.cycles',
                         'coil_tbl.stamp_job')
                    ->orderBy('coil_tbl.job')
                    ->get();
            }
        }

        return response($data);
    }

    public function getMeshTotal($jobNo)
    {
        $weight1 = DB::table('mesh_tbl')->where('job', $jobNo)->sum('length');
        $weight2 = DB::table('used_mesh')->where('job', $jobNo)->sum('length');
        return [
            'ML' => $weight1,
            'EL' => $weight2
        ];
    }

    public function getWeight($job) {
        $weight1 = DB::table('coil_tbl')
            ->where([
                'job' => $job,
                'allocated' => 1
            ])
            ->sum('weight');
        $weight2 = DB::table('used_coil')->where('job', $job)->sum('weight');
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

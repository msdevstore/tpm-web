<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function createSteelWork(Request $request) {
        $data = [
            'material' => $request->material,
            'gage' => $request->gage,
            'width' => $request->width,
            'heat' => $request->heat,
            'pattern' => $request->pattern,
            'holes' => $request->holes,
            'centers' => $request->centers,
            'tpm_po' => $request->tpm_po,
            'tpm_job' => $request->tpm_job,
        ];

        $exist = DB::table('steel_tbl')->where('work', $request->work)->first();

        if ($exist) return DB::table('steel_tbl')->where('work', $request->work)->update($data);
        else {
            $data['work'] = $request->work;
            return DB::table('steel_tbl')->insert($data);
        }
    }

    public function deleteOne($table, $field, $id) {
        if (DB::table($table)->where($field, $id)->first()) {
            return DB::table($table)->where($field, $id)->delete();
        } else return response(2);
    }

    public function createStampingOrder(Request $request) {
        $data = [
            'cust_id' => $request->cust_id,
            'part' => $request->part,
            'rouselle' => $request->rouselle,
            'niagara' => $request->niagara,
            'seyi' => $request->seyi,
            'rouselleAlt' => $request->rouselleAlt,
            'niagaraAlt' => $request->niagaraAlt,
            'seyiAlt' => $request->seyiAlt,
            'blank_area' => $request->blank_area,
            'blank_areaAlt' => $request->blank_areaAlt,
            'cycles' => $request->cycles,
            'linear_feet' => $request->linear_feet,
            'strip' => $request->strip,
            'stripAlt' => $request->stripAlt,
//            'die' => $request->die,
//            'progression' => $request->progression,
            'millJob' => $request->millJob,
            'millCycles' => $request->millCycles,
            'testCycles' => $request->testCycles,
            'remarks' => $request->remarks,
            'press' => $request->press
        ];
        $order = DB::table('stamping_orders_tbl')->where('job', $request->job)->first();
        if ($order) {
            return DB::table('stamping_orders_tbl')->where('job', $request->job)->update($data);
        } else {
            $data['job'] = $request->job;
            $data['setup_op'] = 0;
            $data['dimple_depth1'] = 0;
            $data['dimple_depth2'] = 0;
            $data['dimple_depth3'] = 0;
            $data['dimple_depth4'] = 0;
            $data['dimple_depth5'] = 0;
            $data['has_started'] = 0;
            $data['start_time'] = now();
            $data['has_finished'] = 0;
            $data['finish_time'] = now();
            $data['date_entered'] = now();
            return DB::table('stamping_orders_tbl')->insert($data);
        }
    }

    public function updatePausedJob(Request $request) {
        return DB::table('orders_tbl')->where([
            'job' => $request->job
        ])->update([
            'has_finished' => 0,
            'device' => $request->device
        ]);
    }

    public function getJobDetail($job) {
        $data = DB::table('order_specs')
            ->join('part_specs', 'part_specs.part', '=', 'order_specs.part')
            ->join('die_tbl', 'part_specs.die', '=', 'die_tbl.die')
            ->join('gage_tbl', 'part_specs.gage', '=', 'gage_tbl.gage')
            ->join('cont', 'order_specs.cont_type', '=', 'cont.ID')
            ->join('ship_method', 'order_specs.ship_method', '=', 'ship_method.ID')
            ->join('part_tbl', 'part_specs.part', '=', 'part_tbl.part')
            ->join('weld_spec_mill', 'order_specs.mil_amps', '=', 'weld_spec_mill.mil_amps')
            ->join('weld_spec_repair', 'order_specs.repair_amps', '=', 'weld_spec_repair.repair_amps')
            ->where('order_specs.job', $job)
            ->select('order_specs.job',
                'order_specs.customer',
                'order_specs.po as po_number',
                'part_specs.part as part_no',
                'order_specs.quantity',
                'order_specs.ordered as date_ordered',
                'order_specs.due as date_due',
                'part_specs.description as part_desc',
                'part_specs.type as material',
                'part_specs.gage',
                'part_specs.holes as hole_size',
                'part_specs.centers as hole_centers',
                'part_specs.pattern',
                'part_specs.od',
                'part_specs.finished_length',
                'part_specs.dim_plus as od_postive',
                'part_specs.dim_minus as od_negtive',
                'part_specs.angle',
                'part_specs.cutoff_length',
                'part_specs.length_plus as finished_length_postive',
                'part_specs.length_minus as finished_length_negtive',
                'part_specs.drift as id_drift',
                'part_specs.mill as mill',
                'part_specs.die',
                'part_specs.strip as strip_width',
                'part_specs.oa',
                'order_specs.item as line_item',
                'die_tbl.die_id',
                'gage_tbl.thickness',
                'part_specs.notes',
                'part_specs.ring_min',
                'part_specs.ring_max',
                'order_specs.began as date_started',
                'order_specs.mill_operator',
                'order_specs.cutoff_operator',
                'order_specs.repair_welder',
                'order_specs.inspector',
                'order_specs.weld_spec_mill as mill_spec',
                'order_specs.weld_spec_repair as repair_spec',
                'order_specs.ship_date',
                'part_specs.drawing',
                'order_specs.mil_amps as mill_amps',
                'order_specs.mil_volts as mill_volts',
                'order_specs.mil_speed as mill_speed',
                'order_specs.repair_amps',
                'order_specs.repair_volts',
                'order_specs.repair_speed',
                'cont.cont_type as container_type',
                'ship_method.ship_method as shipping_method',
                'part_specs.insp_notes',
                'order_specs.filler_rod',
                'part_tbl.blank_length_plus',
                'part_tbl.blank_length_minus',
                'part_tbl.depth_of_dimple',
                'part_tbl.depth_of_dimple_plus',
                'part_tbl.depth_of_dimple_minus',
                'part_tbl.blank_end',
                'part_tbl.blank_end_plus',
                'part_tbl.blank_end_minus',
                'part_tbl.cutoff_length_plus',
                'part_tbl.cutoff_length_minus',
                'part_tbl.drawing_number',
                'weld_spec_mill.torch_height as mill_torch_height',
                'weld_spec_mill.Arc_length',
                'weld_spec_mill.Torch_angle',
                'weld_spec_repair.torch_height as repair_torch_height',
                'weld_spec_repair.electro_length',
                'weld_spec_repair.gas_repair'
            )
            ->orderBy('order_specs.job')
            ->first();
        return response()->json($data);
    }

    public function getPartDetail($part) {
        return DB::table('part_tbl')->where('part', $part)->first();
    }

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

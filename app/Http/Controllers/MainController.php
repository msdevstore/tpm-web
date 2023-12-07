<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function getPartSpecs($part_name = 0) {
        $part = DB::table('part_tbl')->where('part', $part_name)->first();
        $oa_factor = DB::table('pat_tbl')->where('pattern', $part->pattern)->first()->oa_factor;
        $thickness = DB::table('gage_tbl')->where('gage', $part->gage)->first()->thickness;
        $oa = $part->holes == 0 ? 0 : pow($part->holes, 2) / pow($part->centers, 2) * $oa_factor;
        $od = $part->is_od == 1 ? $part->dim : $part->dim + 2 * $thickness;
        $tube_weight = 0.29 * $thickness * 4 * atan(1) * $od * $part->finished_length * (100 - $oa) / 100;
        $weight_per_foot = $tube_weight / $part->finished_length * 12;
        $feet = $part->finished_length / 12;
        $hspi = $part->holes == 0 ? 0 : ($oa / (78.54 * pow($part->holes, 2)));

        $side = sqrt(pow(4 * atan(1) * $od, 2) - pow($part->strip, 2));
        $angle = 90 - (atan($side / $part->strip * 180 / (4 * atan(1))));
        $lf_ft = 4 * atan(1) * $od / $part->strip;
        $lf_tube = $feet * $lf_ft;

        $order = DB::table('orders_tbl')->where('part', $part_name)->first();
        $result['oa'] = round($oa, 3);
        $result['tube_weight'] = round($tube_weight, 3);
        $result['feet'] = round($feet, 3);
        $result['weight_per_foot'] = round($weight_per_foot, 3);
        $result['hspi'] = round($hspi, 3);
        $result['angle'] = round($angle, 3);
        $result['lf_ft'] = round($lf_ft, 3);
        $result['lf_tube'] = round($lf_tube, 3);

        $result['lf_req'] = round(1.1 * $lf_tube, 3);
        $result['was'] = round($tube_weight * 1.1, 3);
        $result['wbs'] = round(100 * $result['was'] / (100 - $oa), 3);
        $result['tf'] = round($feet, 3);
        $result['price'] = round($order->price, 3);
        $result['PO_total'] = round($order->price, 3);

        return response()->json($result);
    }

    public function deletePartialShip($job, $cust_id) {
        return DB::table('partial_ship')->where(['job' => $job, 'cust_id' => $cust_id])->delete();
    }

    public function updateUpcomingOrders(Request $request) {
        return response()->json(DB::table('orders_tbl')->where('job', str_replace(",", "", $request->job))->update(['device' => $request->device]));
    }
    public function createFooter(Request $request) {
        $data = [
            'id' => $request->id,
            'tubmil_log' => $request->tubmil_log,
            'tubmil_log-2' => $request->tubmil_log_2,
            'tubmil_log-3' => $request->tubmil_log_3,
            'tubmil_log-4' => $request->tubmil_log_4,
            'tubmil_setup' => $request->tubmil_setup,
            'tubmil_setup-2' => $request->tubmil_setup_2,
            'tubmil_setup-3' => $request->tubmil_setup_3,
            'tubmil_setup-4' => $request->tubmil_setup_4,
            'first_part_drift' => $request->first_part_drift,
            'first_part_drift-2' => $request->first_part_drift_2,
            'first_part_drift-3' => $request->first_part_drift_3,
            'first_part_drift-4' => $request->first_part_drift_4,
            'welding_station_cklist' => $request->welding_station_cklist,
            'welding_station_cklist-2' => $request->welding_station_cklist_2,
            'welding_station_cklist-3' => $request->welding_station_cklist_3,
            'welding_station_cklist-4' => $request->welding_station_cklist_4,
            'worksheet' => $request->worksheet,
            'worksheet-2' => $request->worksheet_2,
            'worksheet-3' => $request->worksheet_3,
            'worksheet-4' => $request->worksheet_4,
            'direct_pack' => $request->direct_pack,
            'direct_pack-2' => $request->direct_pack_2,
            'direct_pack-3' => $request->direct_pack_3,
            'direct_pack-4' => $request->direct_pack_4,
            'cutoff_station' => $request->cutoff_station,
            'cutoff_station-1' => $request->cutoff_station_2,
            'cutoff_station-2' => $request->cutoff_station_3,
            'cutoff_station-3' => $request->cutoff_station_4,
            'inspection_station' => $request->inspection_station,
            'inspection_station-2' => $request->inspection_station_2,
            'inspection_station-3' => $request->inspection_station_3,
            'inspection_station-4' => $request->inspection_station_4,
            'ring_station' => $request->ring_station,
            'ring_station-2' => $request->ring_station_2,
            'ring_station-3' => $request->ring_station_3,
            'ring_station-4' => $request->ring_station_4,
            'coil_alloc' => $request->coil_alloc,
            'coil_alloc-2' => $request->coil_alloc_2,
            'coil_alloc-3' => $request->coil_alloc_3,
            'coil_alloc-4' => $request->coil_alloc_4,
            'mesh_alloc' => $request->mesh_alloc,
            'mesh_alloc-2' => $request->mesh_alloc_2,
            'mesh_alloc-3' => $request->mesh_alloc_3,
            'mesh_alloc-4' => $request->mesh_alloc_4,
            'final_inspection' => $request->final_inspection,
            'final_inspection-2' => $request->final_inspection_2,
            'final_inspection-3' => $request->final_inspection_3,
            'final_inspection-4' => $request->final_inspection_4,
        ];

        $exist = DB::table('footer_for_pdf')->where('id', $request->id)->first();

        if ($exist) return DB::table('footer_for_pdf')->where('id', $request->id)->update($data);
        else {
            return DB::table('footer_for_pdf')->insert($data);
        }
    }

    public function createOne(Request $request, $table, $primary) {
        $data = $request->all();
        $exist = DB::table($table)->where($primary, $data[$primary])->first();
        if ($exist) return DB::table($table)->where($primary, $data[$primary])->update($data);
        else {
            return DB::table($table)->insert($data);
        }
    }

    public function createUser(Request $request) {
        return DB::table('users')->insert(['username' => $request->username, 'password' => $request->password]);
    }
    public function updateUser(Request $request) {
        $status = DB::table('users')->where('id', '<>', $request->id)->where('username', $request->username)->first();
        if ($status) return response(2);
        else return DB::table('users')->where('id', $request->id)->update(['username' => $request->username, 'password' => $request->password]);
    }

    public function activateUsersPermissions(Request $request) {
        if ($request->checked == 'true') {
            return DB::table('users_permissions')->insert(['permission_id' => $request->permission_id, 'user_id' => $request->user_id]);
        } else if ($request->checked == 'false') {
            return DB::table('users_permissions')->where(['permission_id' => $request->permission_id, 'user_id' => $request->user_id])->delete();
        }
    }

    public function createShipInfo(Request $request) {
        $data = [
            'job' => $request->job,
            'customer' => $request->customer,
            'ship_to' => $request->ship_to,
            'po' => $request->po,
            'quantity' => $request->quantity,
            'part' => $request->part,
            'via' => $request->via,
            'sh_date' => $request->sh_date,
            'desc' => $request->desc,
            'sold_to' => $request->sold_to,
            'item' => $request->item,
            'heat' => $request->heat,
            'rings' => $request->rings,
            'ring_heat' => $request->ring_heat,
            'list' => $request->list,
            'p_cert' => $request->p_cert,
            'certs' => $request->certs
        ];

        $exist = DB::table('ship_info')->where('ship_no', $request->ship_no)->first();

        if ($exist) return DB::table('ship_info')->where('ship_no', $request->ship_no)->update($data);
        else {
            $data['ship_no'] = $request->ship_no;
            return DB::table('ship_info')->insert($data);
        }
    }

    public function createRingDetail(Request $request) {
        $data = [
            'Date' => $request->Date,
            'Ring_Size' => $request->Ring_Size,
            'Excluder_Size' => $request->Excluder_Size,
            'Job' => $request->Job,
            'Qty' => $request->Qty
        ];

        $exist = DB::table('ring_detail')->where('Key', $request->Key)->first();

        if ($exist) return DB::table('ring_detail')->where('Key', $request->Key)->update($data);
        else {
            $data['Key'] = $request->Key;
            return DB::table('ring_detail')->insert($data);
        }
    }

    public function createPart(Request $request) {
        $data = [
            'cust_id' => $request->cust_id,
            'description' => $request->description,
            'dim' => $request->dim,
            'dim_plus' => $request->dim_plus,
            'dim_minus' => $request->dim_minus,
            'gage' => $request->gage,
            'pattern' => $request->pattern,
            'holes' => $request->holes,
            'centers' => $request->centers,
            'cutoff_length' => $request->cutoff_length,
            'cutoff_length_plus' => $request->cutoff_length_plus,
            'cutoff_length_minus' => $request->cutoff_length_minus,
            'finished_length' => $request->finished_length,
            'length_plus' => $request->length_plus,
            'length_minus' => $request->length_minus,
            'strip' => $request->strip
        ];

        $exist = DB::table('part_tbl')->where('part', $request->part)->first();

        if ($exist) return DB::table('part_tbl')->where('part', $request->part)->update($data);
        else {
            $data['part'] = $request->part;
            return DB::table('part_tbl')->insert($data);
        }
    }

    public function createQuote(Request $request) {
        $data = [
            'cust_id' => $request->cust_id,
            'part' => $request->part,
            'address' => $request->address,
            'fax_back' => $request->fax_back,
            'date' => $request->date,
            'fob' => $request->fob,
            'terms' => $request->terms
        ];

        $exist = DB::table('quote_tbl')->where('quote', $request->quote)->first();

        if ($exist) return DB::table('quote_tbl')->where('quote', $request->quote)->update($data);
        else {
            $data['quote'] = $request->quote;
            return DB::table('quote_tbl')->insert($data);
        }
    }

    public function createMatReq(Request $request) {
        $data = [
            'quantity' => $request->quantity,
            'dim' => $request->dim,
            'gage' => $request->gage,
            'pattern' => $request->pattern,
            'length' => $request->length,
            'holes' => $request->holes,
            'centers' => $request->centers,
            'strip' => $request->strip
        ];

        $exist = DB::table('mat_req')->where('Id', $request->Id)->first();

        if ($exist) return DB::table('mat_req')->where('Id', $request->Id)->update($data);
        else {
            $data['Id'] = $request->Id;
            $data['Part'] = '';
            $data['is_od'] = 1;
            return DB::table('mat_req')->insert($data);
        }
    }

    public function getPartInfo(Request $request) {
        return DB::table('part_tbl')->where(['cust_id' => $request->cust_id, 'part' => $request->part])->first();
    }

    public function getPartsByCust($id) {
        return DB::table('part_tbl')->where('cust_id', $id)->get();
    }

    public function createExcessRing(Request $request) {
        $data = [
            'ring' => $request->ring,
            'excess_qty' => $request->excess_qty,
            'date_produced' => $request->date_produced,
            'los' => $request->los
        ];

        $exist = DB::table('excess_ring')->where('job', $request->job)->first();

        if ($exist) return DB::table('excess_ring')->where('job', $request->job)->update($data);
        else {
            $data['job'] = $request->job;
            return DB::table('excess_ring')->insert($data);
        }
    }
    public function createExcessPart(Request $request) {
        $data = [
            'cust_id' => $request->cust_id,
            'part' => $request->part,
            'excess_qty' => $request->excess_qty,
            'date_produced' => $request->date_produced,
            'los' => $request->los
        ];

        $exist = DB::table('excess_part')->where('job', $request->job)->first();

        if ($exist) return DB::table('excess_part')->where('job', $request->job)->update($data);
        else {
            $data['job'] = $request->job;
            return DB::table('excess_part')->insert($data);
        }
    }

    public function createPackingList(Request $request) {
        $data = [
            'heat_num' => $request->heat_num,
            'type_mat' => $request->type_mat,
            'mesh' => $request->mesh,
            'width' => $request->width,
            'tot_len' => $request->tot_len,
            'allocated' => $request->allocated,
            'job' => $request->job,
            'length' => $request->length,
            'crate' => $request->crate
        ];
        $data['quantity'] = 0;

        $exist = DB::table('packing_list_entry')->where('po', $request->po)->first();

        if ($exist) return DB::table('packing_list_entry')->where('po', $request->po)->update($data);
        else {
            $data['po'] = $request->po;
            return DB::table('packing_list_entry')->insert($data);
        }
    }

    public function createUsedMesh(Request $request) {
        $data = [
            'job' => $request->job,
            'supplier' => $request->supplier,
            'tpm_po' => $request->tpm_po,
            'date_received' => $request->date_received,
            'width' => $request->width,
            'length' => $request->length,
            'date_used' => $request->date_used,
            'operator' => $request->operator,
            'heat' => $request->heat,
            'mesh' => $request->mesh,
            'type' => $request->type
        ];

        $exist = DB::table('used_mesh')->where('mesh_no', $request->mesh_no)->first();

        if ($exist) return DB::table('used_mesh')->where('mesh_no', $request->mesh_no)->update($data);
        else {
            $data['mesh_no'] = $request->mesh_no;
            return DB::table('used_mesh')->insert($data);
        }
    }

    public function createMeshWork(Request $request) {
        $data = [
            'job' => $request->job,
            'supplier' => $request->supplier,
            'tpm_po' => $request->tpm_po,
            'date_received' => $request->date_received,
            'width' => $request->width,
            'length' => $request->length,
            'allocated' => $request->allocated,
            'heat' => $request->heat,
            'mesh' => $request->mesh,
            'type' => $request->type
        ];

        $exist = DB::table('mesh_tbl')->where('mesh_no', $request->mesh_no)->first();

        if ($exist) return DB::table('mesh_tbl')->where('mesh_no', $request->mesh_no)->update($data);
        else {
            $data['mesh_no'] = $request->mesh_no;
            return DB::table('mesh_tbl')->insert($data);
        }
    }

    public function createCoilWork(Request $request) {
        $data = [
            'work' => $request->work,
            'no_of_coil' => $request->no_of_coil,
            'weight' => $request->weight,
            'operator' => $request->operator,
            'cycles' => $request->cycles,
            'footage' => $request->footage,
            'allocated' => $request->allocated,
            'job' => $request->job,
            'date_received' => $request->date_received,
        ];

        $exist = DB::table('coil_tbl')->where('coil_no', $request->coil_no)->first();

        if ($exist) return DB::table('coil_tbl')->where('coil_no', $request->coil_no)->update($data);
        else {
            $data['coil_no'] = $request->coil_no;
            return DB::table('coil_tbl')->insert($data);
        }
    }
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
        return DB::table('part_tbl')->join('steel_tbl', 'part_tbl.pattern', '=', 'steel_tbl.pattern')->where('part', $part)->first();
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

        return response()->json([
            'part' => $part,
            'meshes' => $meshes
        ]);
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
                    DB::table('mesh_tbl')->where('mesh_no', $id)->update([
                        'allocated' => 1,
                        'job' => $job,
                        'TPM_JOB' => $job
                    ]);
                }
            } break;
            case 5: {
                foreach ($ids as $id) {
                    DB::table('mesh_tbl')->where('mesh_no', $id)->update([
                        'allocated' => 0,
                        'job' => 0,
                        'TPM_JOB' => 0
                    ]);
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
                $data = DB::table('part_tbl')
                    ->join('steel_tbl', 'part_tbl.pattern', '=', 'steel_tbl.pattern')
                    ->join('coil_tbl', 'steel_tbl.work', '=', 'coil_tbl.work')
                    ->where([
                        'coil_tbl.allocated' => 1,
                        'part_tbl.part' => $part
                    ])
                    ->select('coil_tbl.coil_no',
                        'part_tbl.part',
                        'coil_tbl.weight',
                        'steel_tbl.material',
                        'steel_tbl.gage',
                        'steel_tbl.pattern',
                        'steel_tbl.holes',
                        'steel_tbl.centers',
                        'steel_tbl.width',
                        'coil_tbl.allocated')
                    ->orderBy('width')
                    ->orderBy('material')
                    ->get();
            }; break;
            case 2: {
                $data = DB::table('part_tbl')
                    ->join('steel_tbl', 'part_tbl.pattern', '=', 'steel_tbl.pattern')
                    ->join('coil_tbl', 'steel_tbl.work', '=', 'coil_tbl.work')
                    ->where([
                        'coil_tbl.allocated' => 1,
                        'part_tbl.part' => $part,
                        'part_tbl.gage' => 'steel_tbl.gage',
                        'part_tbl.centers' => 'steel_tbl.centers',
                        'part_tbl.holes' => 'steel_tbl.holes'
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
                        'coil_tbl.allocated')
                    ->orderBy('steel_tbl.material')
                    ->get();
            }; break;
            case 3: {
                $data = DB::table('part_tbl')
                    ->join('steel_tbl', 'part_tbl.pattern', '=', 'steel_tbl.pattern')
                    ->join('coil_tbl', 'steel_tbl.work', '=', 'coil_tbl.work')
                    ->where([
                        'coil_tbl.allocated' => 1,
                        'part_tbl.part' => $part,
                        'part_tbl.gage' => 'steel_tbl.gage',
                        'part_tbl.centers' => 'steel_tbl.centers',
                        'part_tbl.holes' => 'steel_tbl.holes'
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
                        'coil_tbl.allocated')
                    ->orderBy('steel_tbl.material')
                    ->get();
            }; break;
            case 4: {
                $data = DB::table('part_tbl')
                    ->join('steel_tbl', 'part_tbl.pattern', '=', 'steel_tbl.pattern')
                    ->join('coil_tbl', 'steel_tbl.work', '=', 'coil_tbl.work')
                    ->where([
                        'coil_tbl.allocated' => 1,
                        'part_tbl.part' => $part,
                        'part_tbl.type' => 'steel_tbl.material',
                        'part_tbl.gage' => 'steel_tbl.gage',
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
                        'coil_tbl.allocated')
                    ->orderBy('steel_tbl.material')
                    ->get();
            }; break;
            case 5: {
                $data = DB::table('part_tbl')
                    ->join('steel_tbl', 'part_tbl.pattern', '=', 'steel_tbl.pattern')
                    ->join('coil_tbl', 'steel_tbl.work', '=', 'coil_tbl.work')
                    ->where([
                        'coil_tbl.allocated' => 1,
                        'part_tbl.part' => $part,
                        'part_tbl.type' => 'steel_tbl.material',
                        'part_tbl.gage' => 'steel_tbl.gage',
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
                        'coil_tbl.allocated')
                    ->orderBy('steel_tbl.material')
                    ->get();
            }; break;
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

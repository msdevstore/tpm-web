<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderStatusController extends Controller
{
    public function upcomingOrders()
    {
        $page_title = '';
        $page_description = '';

        $orders = DB::table('orders_tbl')
            ->join('cust_tbl', 'orders_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->join('part_tbl', 'orders_tbl.part', '=', 'part_tbl.part')
            ->where([
                'orders_tbl.has_started' => 0,
                'orders_tbl.has_finished' => 0
            ])
            ->select('orders_tbl.cust_id', 'orders_tbl.ship_date', 'orders_tbl.part', 'orders_tbl.quantity', 'orders_tbl.job', 'orders_tbl.device', 'cust_tbl.customer', 'part_tbl.description')
            ->orderBy('Ship_Date')
            ->get();


        $paused_orders = DB::table('orders_tbl')
            ->join('cust_tbl', 'orders_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->join('part_tbl', 'orders_tbl.part', '=', 'part_tbl.part')
            ->where([
                'orders_tbl.has_started' => 1,
                'orders_tbl.has_finished' => 0
            ])
            ->select('orders_tbl.cust_id', 'orders_tbl.ship_date', 'orders_tbl.part', 'orders_tbl.quantity', 'orders_tbl.job', 'orders_tbl.device', 'cust_tbl.customer', 'part_tbl.description')
            ->orderBy('Ship_Date')
            ->get();

        $devices = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->get();

        return view('admin.order_status.upcoming_orders', compact('page_title', 'page_description', 'orders', 'devices', 'paused_orders'));
    }

    public function shipping()
    {
        $page_title = '';
        $page_description = '';

        $today_orders = DB::table('orders_tbl')
            ->join('cust_tbl', 'orders_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->where([
                'orders_tbl.ship_date' => date('Y-m-d'),
            ])
            ->select('orders_tbl.cust_id', 'orders_tbl.ship_date', 'orders_tbl.part', 'orders_tbl.quantity', 'orders_tbl.job', 'orders_tbl.device', 'cust_tbl.customer')
            ->orderBy('Ship_Date')
            ->get();

        $tomorrow_orders = DB::table('orders_tbl')
            ->join('cust_tbl', 'orders_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->where([
                'orders_tbl.ship_date' => date('Y-m-d', strtotime("-1 days")),
            ])
            ->select('orders_tbl.cust_id', 'orders_tbl.ship_date', 'orders_tbl.part', 'orders_tbl.quantity', 'orders_tbl.job', 'orders_tbl.device', 'cust_tbl.customer')
            ->orderBy('Ship_Date')
            ->get();

        return view('admin.order_status.shipping', compact('page_title', 'page_description', 'today_orders', 'tomorrow_orders'));
    }

    public function allOrders()
    {
        $page_title = '';
        $page_description = '';

        $in_progress_orders = DB::table('orders_tbl')
            ->join('cust_tbl', 'orders_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->where([
                'orders_tbl.has_started' => 1,
                'orders_tbl.has_finished' => 0
            ])
            ->select('orders_tbl.cust_id', 'orders_tbl.ship_date', 'orders_tbl.part', 'orders_tbl.quantity', 'orders_tbl.job', 'orders_tbl.device', 'cust_tbl.customer')
            ->orderBy('Ship_Date')
            ->get();

        $not_started_orders = DB::table('orders_tbl')
            ->join('cust_tbl', 'orders_tbl.cust_id', '=', 'cust_tbl.cust_id')
            ->where([
                'orders_tbl.has_started' => 0,
                'orders_tbl.has_finished' => 0
            ])
            ->select('orders_tbl.cust_id', 'orders_tbl.ship_date', 'orders_tbl.part', 'orders_tbl.quantity', 'orders_tbl.job', 'orders_tbl.device', 'cust_tbl.customer')
            ->orderBy('Ship_Date')
            ->get();

        return view('admin.order_status.all_orders', compact('page_title', 'page_description', 'in_progress_orders', 'not_started_orders'));
    }

    public function materialSearch($job = 'all')
    {
        $page_title = '';
        $page_description = '';
        if ($job == "all") $allocated_coils = DB::table('coil_tbl')->where('allocated', 1)->get();
        else $allocated_coils = DB::table('coil_tbl')->where(['allocated' => 1, 'job' => $job])->get();

        return view('admin.order_status.material_search', compact('page_title', 'page_description', 'allocated_coils'));
    }

    public function shipments(?string $field = null, ?string $query = null)
    {
        $page_title = '';
        $page_description = '';

        if (!$field || !$query) {
            $partial_ships = DB::table('partial_ship')
                ->join('cust_tbl', 'partial_ship.cust_id', '=', 'cust_tbl.cust_id')
                ->get();
        } else {
            $partial_ships = DB::table('partial_ship')
                ->join('cust_tbl', 'partial_ship.cust_id', '=', 'cust_tbl.cust_id')
                ->where($field, $query)
                ->get();
        }

        return view('admin.order_status.shipments', compact('page_title', 'page_description', 'partial_ships'));
    }

    public function mills()
    {
        $page_title = '';
        $page_description = '';

        $mills = DB::table('mac_add_tbl')->where('device', 'like', 'mill_%')->orderBy('device')->get();

        $obj_arr = [];
        foreach ($mills as $mill) {
            $content = '';
            $orders = DB::table('orders_tbl')->where(['device' => $mill->device, 'has_finished' => 0])->get();
            foreach ($orders as $order) {
                $parts = DB::table('part_tbl')->where(['part' => $order->part, 'is_od' => 1])->get();
                $dim = 0;
                if (!count($parts)) {
                    $parts = DB::table('part_tbl')->where('part', $order->part)->get();
                    $gage = DB::table('gage_tbl')->where('gage', $parts[0]->gage)->first();
                    $dim = $parts[0]->dim + 2 * $gage->thickness;
                }

                $tube = DB::table('tubes_tbl')->where('job', $order->job)->first();
                if ($tube) {
                    $employee = DB::table('employee')->where('ID', $tube->mill_operator)->first();
                    $name = $employee ? $employee->name : '';
                    $op = substr($name, strpos($name, ' ') + 1);
                } else {
                    $op = '';
                }

                $millScraps = DB::table('scrap_tbl')->where('job', $order->job)->get();
                $millParts = DB::table('part_tbl')->where('part', $order->part)->get();

                if (count($millParts)) {
                    $millTotalScrap = 0;

                    foreach ($millScraps as $scrap) {
                        $millTotalScrap += intval($scrap->tube_length);
                    }

                    if ($orders[0]->quantity * $millParts[0]->cutoff_length == 0) {
                        $millScrRate = 0;
                    } else {
                        $millScrRate = round(($millTotalScrap / (floatval($orders[0]->quantity * floatval($millParts[0]->cutoff_length)))) * 100, 1);
                    }
                } else {
                    $millScrRate = 0;
                }


                $content .= '<tr>
                                <td>'.htmlspecialchars($order->job).'</td>
                                <td>'.htmlspecialchars($dim).'</td>
                                <td>'.htmlspecialchars(ucfirst($op)).'</td>
                                <td>'.htmlspecialchars(strval($millScrRate)).'%</td>
                            </tr> ';
            }
            $obj_arr[] = [
                'title' => ucfirst($mill->device),
                'content' => $content
            ];
        }

//        dd($obj_arr);

        return view('admin.order_status.mills', compact('page_title', 'page_description', 'obj_arr'));
    }

    public function searchQuery($job = null, $part = null, $from = null, $to = null)
    {
        $page_title = '';
        $page_description = '';


        if (!$job && !$part && !$from && !$to) {
            $orders = [];
        } else {
            $orders = DB::table('orders_tbl')->where([
                ['job', '=', $job],
                ['part', '=', $part],
                ['shipped', '>=', $from],
                ['shipped', '<=', $to]
            ])->get();
        }

        return view('admin.order_status.search_query', compact('page_title', 'page_description', 'orders'));
    }
}

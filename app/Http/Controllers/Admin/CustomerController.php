<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $page_title = 'Customers';
        $page_description = '';
        $last_id = DB::table('cust_tbl')->orderBy('cust_id', 'desc')->first()->cust_id;
        $new_id = $last_id + 1;
        $customers = DB::table('cust_tbl')->get();

        return view('admin.customer.index', compact('page_title', 'page_description', 'new_id', 'customers'));
    }

    public function create(Request $request) {
        $result = DB::table('cust_tbl')->updateOrInsert(
            ['cust_id' => $request->cust_id],
            [
                'customer' => $request->customer,
                'bill_to' => $request->bill_to,
                'ship_to' => $request->ship_to,
                'contact' => $request->contact,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email
            ]
        );

        return response()->json($result);
    }

    public function delete($id) {
        $status = DB::table('cust_tbl')->where('cust_id', $id)->delete();
        return response()->json($status);
    }
}

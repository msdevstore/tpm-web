<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function jobStatus()
    {
        $page_title = 'Job Status';
        $page_description = 'Some description for the orders';

        return view('admin.reports.job_status', compact('page_title', 'page_description'));
    }

    public function pdfGenerator()
    {
        $page_title = 'Pdf Generator';
        $page_description = 'Some description for the orders';

        return view('admin.reports.pdf_generator', compact('page_title', 'page_description'));
    }

    public function standardPrices()
    {
        $page_title = 'Standard Prices';
        $page_description = 'Some description for the orders';

        return view('admin.reports.standard_prices', compact('page_title', 'page_description'));
    }

    public function training()
    {
        $page_title = 'Training';
        $page_description = 'Some description for the orders';

        return view('admin.reports.training', compact('page_title', 'page_description'));
    }

    public function steelReceive()
    {
        $page_title = 'Steel Receive';
        $page_description = 'Some description for the orders';

        return view('admin.reports.steel_receive', compact('page_title', 'page_description'));
    }

    public function audit()
    {
        $page_title = 'Audit';
        $page_description = 'Some description for the orders';

        return view('admin.reports.audit', compact('page_title', 'page_description'));
    }

    public function orderStatus()
    {
        $page_title = 'Order Status';
        $page_description = 'Some description for the orders';

        return view('admin.reports.order_status', compact('page_title', 'page_description'));
    }

}

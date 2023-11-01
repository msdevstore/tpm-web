<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function upcomingOrders()
    {
        $page_title = 'Upcoming Orders';
        $page_description = '';

        return view('admin.order_status.upcoming_orders', compact('page_title', 'page_description'));
    }

    public function shipping()
    {
        $page_title = 'Shipping';
        $page_description = '';

        return view('admin.order_status.shipping', compact('page_title', 'page_description'));
    }

    public function allOrders()
    {
        $page_title = 'All Orders';
        $page_description = '';

        return view('admin.order_status.all_orders', compact('page_title', 'page_description'));
    }

    public function materialSearch()
    {
        $page_title = 'Material Search';
        $page_description = '';

        return view('admin.order_status.material_search', compact('page_title', 'page_description'));
    }

    public function shipments()
    {
        $page_title = 'Shipments';
        $page_description = '';

        return view('admin.order_status.shipments', compact('page_title', 'page_description'));
    }

    public function mills()
    {
        $page_title = 'Mills';
        $page_description = '';

        return view('admin.order_status.mills', compact('page_title', 'page_description'));
    }

    public function searchQuery()
    {
        $page_title = 'Search Query';
        $page_description = '';

        return view('admin.order_status.search_query', compact('page_title', 'page_description'));
    }
}

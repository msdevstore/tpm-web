<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function steelWorkNumber()
    {
        $page_title = 'Steel Work Number';
        $page_description = '';

        return view('admin.inventory.steel_work_number', compact('page_title', 'page_description'));
    }

    public function receiveCoilMill()
    {
        $page_title = 'Receive Coil Mill';
        $page_description = '';

        return view('admin.inventory.receive_coil_mill', compact('page_title', 'page_description'));
    }

    public function receiveCoilStamping()
    {
        $page_title = 'Receive Coil Stamping';
        $page_description = '';

        return view('admin.inventory.receive_coil_stamping', compact('page_title', 'page_description'));
    }

    public function meshReceiving()
    {
        $page_title = 'Mesh Receiving';
        $page_description = '';

        return view('admin.inventory.mesh_receiving', compact('page_title', 'page_description'));
    }

    public function meshInventory()
    {
        $page_title = 'Mesh Inventory';
        $page_description = '';

        return view('admin.inventory.mesh_inventory', compact('page_title', 'page_description'));
    }

    public function meshAllocated()
    {
        $page_title = 'Mesh Allocated';
        $page_description = '';

        return view('admin.inventory.mesh_allocated', compact('page_title', 'page_description'));
    }

    public function usedMesh()
    {
        $page_title = 'Used Mesh';
        $page_description = '';

        return view('admin.inventory.used_mesh', compact('page_title', 'page_description'));
    }

    public function packingListEntry()
    {
        $page_title = 'Packing List Entry';
        $page_description = '';

        return view('admin.inventory.packing_list_entry', compact('page_title', 'page_description'));
    }

}

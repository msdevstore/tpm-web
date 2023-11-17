<?php
// Aside menu
return [

    'items' => [
        // Dashboard
//        [
//            'title' => 'Dashboard',
//            'root' => true,
//            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
//            'page' => '/',
//            'new-tab' => false,
//        ],

        // Main Menu
//        [
//            'section' => 'Main Menu',
//        ],
        [
            'title' => 'Customers',
            'root' => true,
            'icon' => 'media/svg/icons/General/User.svg',
            'page' => 'customers',
            'visible' => 'preview',
        ],
        [
            'title' => 'Orders',
            'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'All',
                    'page' => 'orders/all'
                ],
                [
                    'title' => 'Yet To Start',
                    'page' => 'orders/yet_to_start'
                ],
                [
                    'title' => 'Started',
                    'page' => 'orders/started'
                ],
                [
                    'title' => 'Finished',
                    'page' => 'orders/finished'
                ],
                [
                    'title' => 'Shipped',
                    'page' => 'orders/shipped'
                ],
                [
                    'title' => 'Paused',
                    'page' => 'orders/paused'
                ],
                [
                    'title' => 'Stamping',
                    'page' => 'orders/stamping'
                ]
            ]
        ],
        [
            'title' => 'Order Status',
            'icon' => 'media/svg/icons/Design/Bucket.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Upcoming Orders',
                    'page' => 'order_status/upcoming_orders'
                ],
                [
                    'title' => 'Shipping Today and Tomorrow',
                    'page' => 'order_status/shipping'
                ],
                [
                    'title' => 'All Orders',
                    'page' => 'order_status/all_orders'
                ],
                [
                    'title' => 'Material Search',
                    'page' => 'order_status/material_search'
                ],
                [
                    'title' => 'Shipments',
                    'page' => 'order_status/shipments'
                ],
                [
                    'title' => 'Mills',
                    'page' => 'order_status/mills'
                ],
                [
                    'title' => 'Search Query',
                    'page' => 'order_status/search_query'
                ]
            ]
        ],
        [
            'title' => 'Inventory',
            'desc' => '',
            'icon' => 'media/svg/icons/Home/Library.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Steel Work Number',
                    'page' => 'inventory/steel_work_number'
                ],
                [
                    'title' => 'Receive Coil Mill',
                    'page' => 'inventory/receive_coil_mill'
                ],
                [
                    'title' => 'Receive Coil Stamping',
                    'page' => 'inventory/receive_coil_stamping'
                ],
                [
                    'title' => 'Mesh Receiving',
                    'page' => 'inventory/mesh_receiving'
                ],
                [
                    'title' => 'Mesh Inventory',
                    'page' => 'inventory/mesh_inventory'
                ],
                [
                    'title' => 'Mesh Allocated',
                    'page' => 'inventory/mesh_allocated'
                ],
                [
                    'title' => 'Used Mesh',
                    'page' => 'inventory/used_mesh'
                ],
                [
                    'title' => 'Packing List Entry',
                    'page' => 'inventory/packing_list_entry'
                ]
            ]
        ],
        [
            'title' => 'Reports',
            'desc' => '',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Job Status Report',
                    'page' => 'reports/job_status'
                ],
                [
                    'title' => 'PDF Generator',
                    'page' => 'reports/pdf_generator'
                ],
                [
                    'title' => 'Standard Prices Report',
                    'page' => 'reports/standard_prices'
                ],
                [
                    'title' => 'Training Report',
                    'page' => 'reports/training'
                ],
                [
                    'title' => 'Steel Receive Report',
                    'page' => 'reports/steel_receive'
                ],
                [
                    'title' => 'Audit Report',
                    'page' => 'reports/audit'
                ],
                [
                    'title' => 'Order Status',
                    'page' => 'reports/order_status'
                ]
            ]
        ],
        [
            'title' => 'Excess Stock',
            'icon' => 'media/svg/icons/Devices/Diagnostics.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Excess Part Stock',
                    'page' => 'excess_stock/part'
                ],
                [
                    'title' => 'Excess Ring Stock',
                    'page' => 'excess_stock/ring'
                ]
            ]
        ],
        [
            'title' => 'Quotes',
            'icon' => 'media/svg/icons/Layout/Layout-arrange.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'New Quotes',
                    'page' => 'quotes/new_quotes'
                ],
                [
                    'title' => 'Pricing Search',
                    'page' => 'quotes/pricing_search'
                ]
            ]
        ],
        [
            'title' => 'Material Requirements',
            'root' => true,
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'page' => 'material_requirements',
            'visible' => 'preview',
        ],
        [
            'title' => 'Uni_Screen',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Box2.svg',
            'page' => 'uni_screen',
            'visible' => 'preview',
        ],
        [
            'title' => 'Uni_Quotes',
            'root' => true,
            'icon' => 'media/svg/icons/General/Attachment2.svg',
            'page' => 'uni_quotes',
            'visible' => 'preview',
        ],
        [
            'title' => 'Part Information',
            'root' => true,
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => 'part_information',
            'visible' => 'preview',
        ],
        [
            'title' => 'Ring Adjustment',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Select.svg',
            'page' => 'ring_adjustment',
            'visible' => 'preview',
        ],
        [
            'title' => 'Ship Info',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'page' => 'ship_info',
            'visible' => 'preview',
        ],
        [
            'title' => 'Setting Pages',
            'icon' => 'media/svg/icons/General/Settings-1.svg',
            'root' => true,
            'bullet' => 'dot',
            'submenu' => [
                [
                    'title' => 'Users',
                    'page' => 'setting/users'
                ],
                [
                    'title' => 'Instruction Type',
                    'page' => 'setting/instruction_type'
                ],
                [
                    'title' => 'Status Type',
                    'page' => 'setting/status_type'
                ],
                [
                    'title' => 'TPM Type',
                    'page' => 'setting/tpm_type'
                ],
                [
                    'title' => 'Unit Table',
                    'page' => 'setting/unit_table'
                ],
                [
                    'title' => 'Container',
                    'page' => 'setting/container'
                ],
                [
                    'title' => 'Ship Method',
                    'page' => 'setting/ship_method'
                ],
                [
                    'title' => 'Die Table',
                    'page' => 'setting/die_table'
                ],
                [
                    'title' => 'Stamping Die Table',
                    'page' => 'setting/stamping_die_table'
                ],
                [
                    'title' => 'Drifts',
                    'page' => 'setting/drifts'
                ],
                [
                    'title' => 'Employee',
                    'page' => 'setting/employee'
                ],
                [
                    'title' => 'Excluder Rings',
                    'page' => 'setting/excluder_rings'
                ],
                [
                    'title' => 'Fraction Table',
                    'page' => 'setting/fraction_table'
                ],
                [
                    'title' => 'Gage Table',
                    'page' => 'setting/gage_table'
                ],
                [
                    'title' => 'Material Table',
                    'page' => 'setting/material_table'
                ],
                [
                    'title' => 'Mesh Types',
                    'page' => 'setting/mesh_types'
                ],
                [
                    'title' => 'Micron',
                    'page' => 'setting/micron'
                ],
                [
                    'title' => 'Operator List',
                    'page' => 'setting/operator_list'
                ],
                [
                    'title' => 'Pattern Table',
                    'page' => 'setting/pattern_table'
                ],
                [
                    'title' => 'Weld Spec Mil',
                    'page' => 'setting/weld_spec_mil'
                ],
                [
                    'title' => 'Ship Via List',
                    'page' => 'setting/ship_via_list'
                ],
                [
                    'title' => 'Rings',
                    'page' => 'setting/rings'
                ],
                [
                    'title' => 'Footer Settings',
                    'page' => 'setting/footer_settings'
                ]
            ]
        ]
    ]

];

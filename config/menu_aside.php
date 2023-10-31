<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Main Menu
        [
            'section' => 'Main Menu',
        ],
        [
            'title' => 'Customers',
            'root' => true,
            'icon' => 'media/svg/icons/General/User.svg',
            'page' => 'builder',
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
                    'page' => 'layout/subheader/toolbar'
                ],
                [
                    'title' => 'Yet To Start',
                    'page' => 'layout/subheader/actions'
                ],
                [
                    'title' => 'Started',
                    'page' => 'layout/subheader/tabbed'
                ],
                [
                    'title' => 'Finished',
                    'page' => 'layout/subheader/classic'
                ],
                [
                    'title' => 'Shipped',
                    'page' => 'layout/subheader/none'
                ],
                [
                    'title' => 'Paused',
                    'page' => 'layout/subheader/none'
                ],
                [
                    'title' => 'Stamping',
                    'page' => 'layout/subheader/none'
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
                    'page' => 'layout/subheader/toolbar'
                ],
                [
                    'title' => 'Shipping Today and Tomorrow',
                    'page' => 'layout/subheader/actions'
                ],
                [
                    'title' => 'All Orders',
                    'page' => 'layout/subheader/tabbed'
                ],
                [
                    'title' => 'Material Search',
                    'page' => 'layout/subheader/classic'
                ],
                [
                    'title' => 'Shipments',
                    'page' => 'layout/subheader/none'
                ],
                [
                    'title' => 'Mills',
                    'page' => 'layout/subheader/none'
                ],
                [
                    'title' => 'Search Query',
                    'page' => 'layout/subheader/none'
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
                    'page' => 'layout/themes/aside-light'
                ],
                [
                    'title' => 'Receive Coil Mill',
                    'page' => 'layout/themes/header-dark'
                ],
                [
                    'title' => 'Receive Coil Stamping',
                    'page' => 'layout/themes/header-dark'
                ],
                [
                    'title' => 'Mesh Receiving',
                    'page' => 'layout/themes/header-dark'
                ],
                [
                    'title' => 'Mesh Inventory',
                    'page' => 'layout/themes/header-dark'
                ],
                [
                    'title' => 'Mesh Allocated',
                    'page' => 'layout/themes/header-dark'
                ],
                [
                    'title' => 'Used Mesh',
                    'page' => 'layout/themes/header-dark'
                ],
                [
                    'title' => 'Packing List Entry',
                    'page' => 'layout/themes/header-dark'
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
                    'page' => 'layout/subheader/toolbar'
                ],
                [
                    'title' => 'PDF Generator',
                    'page' => 'layout/subheader/actions'
                ],
                [
                    'title' => 'Standard Prices Report',
                    'page' => 'layout/subheader/tabbed'
                ],
                [
                    'title' => 'Training Report',
                    'page' => 'layout/subheader/classic'
                ],
                [
                    'title' => 'Steel Receive Report',
                    'page' => 'layout/subheader/none'
                ],
                [
                    'title' => 'Audit Report',
                    'page' => 'layout/subheader/none'
                ],
                [
                    'title' => 'Order Status',
                    'page' => 'layout/subheader/none'
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
                    'page' => 'layout/general/fixed-content'
                ],
                [
                    'title' => 'Excess Ring Stock',
                    'page' => 'layout/general/minimized-aside'
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
                    'page' => 'layout/general/fixed-content'
                ],
                [
                    'title' => 'Pricing Search',
                    'page' => 'layout/general/minimized-aside'
                ]
            ]
        ],
        [
            'title' => 'Material Requirements',
            'root' => true,
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],
        [
            'title' => 'UniScreen',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Box2.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],
        [
            'title' => 'Uni_Quotes',
            'root' => true,
            'icon' => 'media/svg/icons/General/Attachment2.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],
        [
            'title' => 'Part Information',
            'root' => true,
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],
        [
            'title' => 'Ring Adjustment',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Select.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],
        [
            'title' => 'Ship Info',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'page' => 'builder',
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
                    'page' => 'layout/general/fixed-content'
                ],
                [
                    'title' => 'Instruction Type',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Status Type',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'TPM Type',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Unit Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Container',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Ship Method',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Die Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Stamping Die Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Drifts',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Employee',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Excluder Rings',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Fraction Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Gage Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Material Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Mesh Types',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Micron',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Operator List',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Pattern Table',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Weld Spec Mil',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Ship Via List',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Rings',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'Footer Settings',
                    'page' => 'layout/general/minimized-aside'
                ]
            ]
        ]
    ]

];

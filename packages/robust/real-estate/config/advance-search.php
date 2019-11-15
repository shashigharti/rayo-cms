<?php

return [
    "type" => [
        "block" => "block1",
        "display" => "Types of Property",
        "name" => "type",
        "options" => [
            [
                "name" => "type",
                "choices" => [
                    ["title" => "Residential","value" =>"residential"],
                    ["title" => "Condominium","value" =>"condominium"],
                ],
                "placeholder" => "Select Type"
            ]
        ]
    ],
    "status" => [
        "block" => "block1",
        "display" => "Property Status",
        "name" => "status",
        "options" => [
            [
                "name" => "status",
                "choices" => [
                    ["title" => "All","value" =>"all"],
                    ["title" => "Active","value" =>"active"],
                    ["title" => "Sold","value" =>"sold"],
                ],
                "placeholder" => "Select status"
            ]
        ]
    ],
    "picture" => [
        "block" => "block1",
        "display" => "Picture Only",
        "name" => "status",
        "options" => [
            [
                "name" => "status",
                "choices" => [
                    ["title" => "Yes","value" =>"yes"]
                ],
                "placeholder" => "Select"
            ]
        ]
    ],
    "acres" => [
        "block" => "block2",
        "display" => "Acreage (min-max)",
        "name" => "acres",
        "options" => [
            [
                "name" => "acres_min",
                "choices" => [
                    ["title" => "min","value" =>"default"],
                    ["title" => "1","value" =>"1"],
                    ["title" => "2","value" =>"2"],
                    ["title" => "3","value" =>"3"],
                    ["title" => "4","value" =>"4"],
                    ["title" => "5","value" =>"5"],
                    ["title" => "6","value" =>"6"],
                ],
                "placeholder" => "Min"
            ],
            [
                "name" => "acres_max",
                "choices" => [
                    ["title" => "max","value" =>"default"],
                    ["title" => "1","value" =>"1"],
                    ["title" => "2","value" =>"2"],
                    ["title" => "3","value" =>"3"],
                    ["title" => "4","value" =>"4"],
                    ["title" => "5","value" =>"5"],
                    ["title" => "6","value" =>"6"],
                ],
                "placeholder" => "Max"
            ]
        ]
    ],
    "price" => [
        "block" => "block2",
        "display" => "Price (min-max)",
        "name" => "price",
        "options" => [
            [
                "name" => "price_min",
                "choices" => [
                    ["title" => "min","value" =>"default"],
                    ["title" => "$25000","value" =>"25000"],
                    ["title" => "$50000","value" =>"50000"],
                    ["title" => "$75000","value" =>"75000"],
                    ["title" => "$100000","value" =>"100000"],
                    ["title" => "$200000","value" =>"200000"],
                    ["title" => "$500000","value" =>"300000"],
                ],
                "placeholder" => "Min"
            ],
            [
                "name" => "acres_max",
                "choices" => [
                    ["title" => "max","value" =>"default"],
                    ["title" => "$25000","value" =>"25000"],
                    ["title" => "$50000","value" =>"50000"],
                    ["title" => "$75000","value" =>"75000"],
                    ["title" => "$100000","value" =>"100000"],
                    ["title" => "$200000","value" =>"200000"],
                    ["title" => "$500000","value" =>"300000"],
                ],
                "placeholder" => "Max"
            ]
        ]
    ],
    "lot" => [
        "block" => "block3",
        "display" => "Lot Square Feet (min-max)",
        "name" => "lot",
        "options" => [
            [
                "name" => "lot_min",
                "choices" => [
                    ["title" => "min","value" =>"default"],
                    ["title" => "2500","value" =>"2500"],
                    ["title" => "5000","value" =>"5000"],
                    ["title" => "7500","value" =>"7500"],
                    ["title" => "10000","value" =>"10000"],
                    ["title" => "20000","value" =>"20000"],
                    ["title" => "50000","value" =>"30000"],
                ],
                "placeholder" => "Min"
            ],
            [
                "name" => "lot_max",
                "choices" => [
                    ["title" => "max","value" =>"default"],
                    ["title" => "2500","value" =>"2500"],
                    ["title" => "5000","value" =>"5000"],
                    ["title" => "7500","value" =>"7500"],
                    ["title" => "10000","value" =>"10000"],
                    ["title" => "20000","value" =>"20000"],
                    ["title" => "50000","value" =>"30000"],
                ],
                "placeholder" => "Max"
            ]
        ]
    ],
    "elementary" => [
        "block" => "block4",
        "display" => "Elementary School (min-max)",
        "name" => "lot",
        "options" => [
            [
                "name" => "elem_school",
                "choices" => [
                    ["title" => "Antioch","value" =>"Antioch"],
                    ["title" => "Callaway","value" =>"Callaway"],
                    ["title" => "Deer point","value" =>"Deer point"],

                ],
                "placeholder" => "Select"
            ],
        ]
    ],
];

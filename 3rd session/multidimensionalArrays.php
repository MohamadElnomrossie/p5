<?php
//php_arrays_multidimensional

// $cars = [
//     ["Volvo", 222, 1000],
//     ["BMW", 300, 2000],
//     ["Saab", 250, 3000],
//     ["Land Rover", 310, 4000]
// ];
// echo $cars[3][0] . " speed is " . $cars[3][1];


// $cars = [
//     ["name" => "Volvo", "speed" => 222, "distance" => 1000],
//     ["name" => "BMW", "speed" => 300, "distance" => 2000],
//     ["name" => "verna", "speed" => 250, "distance" => 3000],
//     ["name" => "Land Rover", "speed" => 310, "distance" => 4000]
// ];

// echo $cars[2]["name"] . " speed is " . $cars[2]["speed"] . " ,distance is " . $cars[2]["distance"];

// $cars = [
//     "car1" =>   [   "name" => "Volvo",
//                     "speed" => 222,
//                     "distance" => 1000
//                 ],
//     "car2" =>   ["name" => "BMW",
//                 "speed" => 300,
//                 "distance" => 2000
//                 ],
//     "car3" => ["name" => "verna", "speed" => 250, "distance" => 3000],
//     "car4" => ["name" => "Land Rover", "speed" => 310, "distance" => 4000]
// ];

// echo $cars["car1"]["name"] . " speed is " . $cars["car1"]['speed'] . " distance is " . $cars['car1']['distance']; 


// $cars = [
//     "car1" => ["Volvo", 222, 1000],
//     "car2" => ["BMW", 300, 2000],
//     "car3" => ["verna", 250, 3000],
//     "car4" => ["Land Rover", 310, 4000]
// ];

// echo $cars['car3'][0]  . " speed is " . $cars['car3'][1] . " distance is " .  $cars['car3'][2];


// 4 dimensional array associative , object , indexed , associative
// $users = [
//     'user1' => (object)[
//                 'id' => 7,
//                 'name' => 'Ibrahem',
//                 'email' => 'I@I.com',
//                 'orders' =>  [
//                     [
//                         'id' => 1532,
//                         'date' => '25-1-2021'
//                     ],
//                     [
//                         'id' => 125,
//                         'date' => '25-3-2021'
//                     ]
//                 ]
//             ],
//     'user2' =>(object)[
//                 'id' => 77,
//                 'name' => 'ahmed',
//                 'email' => 'a@a.com',
//                 'orders' =>  [
//                     [
//                         'id' => 152,
//                         'date' => '25-1-2021'
//                     ],
//                     [
//                         'id' => 545,
//                         'date' => '25-3-2021'
//                     ]
//                 ]
//             ],
//     'user3' =>(object)[
//                 'id' => 1,
//                 'name' => 'galal',
//                 'email' => 'g@g.com',
//                 'orders' =>  [
//                     [
//                         'id' => 22,
//                         'date' => '25-6-2021'
//                     ],
//                     [
//                         'id' => 25,
//                         'date' => '2-3-2021'
//                     ]
//                 ]
//             ]
// ];

// echo 'name: ' . $users['user2']->name . ' , email : ' . $users['user2']->email . ' , firstOrderId :' .
// $users['user2']->orders[0]['id'] . ' in date ' .  $users['user2']->orders[0]['date'];


// mul 4 levels associative , associative , indexed , object
// $users = [
//     'user1' => [
//                 'id' => 7,
//                 'name' => 'Ibrahem',
//                 'email' => 'I@I.com',
//                 'orders' =>  [
//                     (object)[
//                         'id' => 1532,
//                         'date' => '25-1-2021'
//                     ],
//                     (object)[
//                         'id' => 125,
//                         'date' => '25-3-2021'
//                     ]
//                 ]
//             ],
//     'user2' =>[
//                 'id' => 77,
//                 'name' => 'ahmed',
//                 'email' => 'a@a.com',
//                 'orders' =>  [
//                     (object)[
//                         'id' => 152,
//                         'date' => '25-1-2021'
//                     ],
//                     (object)[
//                         'id' => 545,
//                         'date' => '25-3-2021'
//                     ]
//                 ]
//             ],
//     'user3' =>[
//                 'id' => 1,
//                 'name' => 'galal',
//                 'email' => 'g@g.com',
//                 'orders' =>  [
//                     (object)[
//                         'id' => 22,
//                         'date' => '25-6-2021'
//                     ],
//                     (object)[
//                         'id' => 25,
//                         'date' => '2-3-2021'
//                     ]
//                 ]
//             ]
// ];

// echo "userId : " . $users['user2']['id'] . "made order in " . $users['user2']['orders'][1]->date;

$users = [
        (object)[
            'id' => 10,
            'name' => 'Galal',
            'email' => 'A@A.com',
            'orders' =>   [
                                [
                                    'id' => 1532,
                                    'date' => '25-1-2021',
                                    'order_details' => [
                                        (object)[
                                            'id' => 5,
                                            'name' => 'laptop'
                                        ],
                                        (object)[
                                            'id' => 6,
                                            'name' => 'memory'
                                        ]
                                    ]
                                ],
                                [
                                    'id' => 265,
                                    'date' => '20-2-2021',
                                    'order_details' =>  [
                                                            'order_details_1' => [
                                                                                    'id' => 5,
                                                                                    'name' => 'laptop'
                                                                                ]
                                                        ]
                                ],
                                [
                                    'id' => 1532,
                                    'date' => '25-1-2021',
                                    'order_details' => [
                                        (object)[
                                            'id' => 5,
                                            'name' => 'laptop'
                                        ],
                                        (object)[
                                            'id' => 6,
                                            'name' => 'memory'
                                        ]
                                    ]
                                ],
                        ]
        ],
        (object)[
            'id' => 7,
            'name' => 'Ibrahem',
            'email' => 'I@I.com',
            'orders' =>  [
                (object)[
                    'id' => 1532,
                    'date' => '25-1-2021'
                ]
            ]
        ],
        (object)[
            'id' => 1,
            'name' => 'Esraa',
            'email' => 'E@E.com',
            'orders' =>  [
                "order1" =>  [
                    'id' => 265,
                    'date' => '20-2-2021'
                ]
            ]
        ]
];
echo "userid: " . $users[0]->id .' ,name:' . $users[0]->name . ", orderdate: " . $users[0]->orders[2]['date'] . 
',products: ' .$users[0]->orders[2]['order_details'][0]->name .' , ' . $users[0]->orders[2]['order_details'][1]->name;

// print_r($users[0]->orders[0]['order_details'][1]->name);
// echo $users[0]->orders[1]['order_details']['order_details_1']['name'];


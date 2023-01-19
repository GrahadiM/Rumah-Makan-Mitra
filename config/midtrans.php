<?php

// return [
// 	'mercant_id' => env('MIDTRANS_MERCHAT_ID'),
// 	'client_key' => env('MIDTRANS_CLIENT_KEY'),
// 	'server_key' => env('MIDTRANS_SERVER_KEY'),

// 	'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
// 	'is_sanitized' => false,
// 	'is_3ds' => false,
// ];

return [
    'serverKey' => env('MIDTRANS_SERVER_KEY', null),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is3ds' => env('MIDTRANS_IS_3DS', true),
];

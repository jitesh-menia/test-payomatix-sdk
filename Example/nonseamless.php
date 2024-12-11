<?php

require __DIR__ . '/../vendor/autoload.php';

use Payomatix\Payomatix;

$payomatix = new Payomatix();

$payomatix->setOptions([
    'is_test' => true
]);

$response = $payomatix->nonSeamlessPayment([
    'other_data' => [
        'select_type_id' => '2',
        'products' => [
            0 => [
                'product_id' => 'prod_001',
                'name' => 'Product Name',
                'quantity' => '2',
                'price' => '20.00',
                'description' => 'This is a great product',
                'product_code' => 'SKU12345',
                'image_url' => 'https://mysite.com/test.jpg',
                'category' => 'Electronics',
                'tax_rate' => '0.07',
                'discount' => '5.00',
                'weight' => '15KG'
            ]
        ],
        'first_name' => 'test',
        'last_name' => 'name',
        'address' => 'address',
        'state' => 't_state',
        'city' => 't_city',
        'zip' => 'XXXXXX',
        'country' => 'US',
        'phone_no' => 't_phone_no',
        'card_no' => '4242 4242 4242 4242',
    ],
    'email' => 'test@jondoe.com',
    'amount' => 30.00,
    'currency' => 'USD',
    'merchant_ref' => 'P'.time(),
    'return_url' => 'https://stageadmin.payomatix.com/connectors/BFXX1733911017',
    'notify_url' => 'https://stageadmin.payomatix.com/connectors/BFXX1733911017'
]);

if (isset($response['redirect_url']) && !empty($response['redirect_url'])) {
	header('Location: ' . $response['redirect_url']);
} else {
	print_r($response);
}

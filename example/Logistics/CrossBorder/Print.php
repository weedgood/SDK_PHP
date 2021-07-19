<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => '5294y06JbISpM5x9',
        'hashIv' => 'v77hoKGq4kWxNNIS',
    ]);
    $postService = $factory->create('PostWithAesJsonResponseService');

    $data = [
        'MerchantID' => '2000132',
        'LogisticsID' => '1658389',
    ];
    $input = [
        'MerchantID' => '2000132',
        'RqHeader' => [
            'Timestamp' => time(),
            'Revision' => '1.0.0',
        ],
        'Data' => $data,
    ];
    $url = 'https://logistics-stage.ecpay.com.tw/CrossBorder/Print';

    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}

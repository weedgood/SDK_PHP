<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory;
    $hashKey = '5294y06JbISpM5x9';
    $hashIv = 'v77hoKGq4kWxNNIS';
    $postService = $factory->createWithHash('PostWithAesJsonResponseService', $hashKey, $hashIv);

    $data = [
        'MerchantID' => '2000132',
        'Country' => 'SG',
        'LogisticsType' => 'CB',
        'LogisticsSubType' => 'UNIMARTCBCVS',
    ];
    $input = [
        'MerchantID' => '2000132',
        'RqHeader' => [
            'Timestamp' => time(),
            'Revision' => '1.0.0',
        ],
        'Data' => $data,
    ];
    $url = 'https://logistics-stage.ecpay.com.tw/CrossBorder/CreateTestData';

    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}

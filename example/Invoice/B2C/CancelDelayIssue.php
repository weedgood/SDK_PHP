<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => 'ejCk326UnaZWKisg',
        'hashIv' => 'q9jcZX8Ib9LM8wYk',
    ]);
    $postService = $factory->create('PostWithAesJsonResponseService');
    $data = [
        'MerchantID' => '2000132',
        'Tsr' => 'tsr1627439050',
    ];
    $input = [
        'MerchantID' => '2000132',
        'RqHeader' => [
            'Timestamp' => time(),
            'Revision' => '3.0.0',
        ],
        'Data' => $data,
    ];
    $url = 'https://einvoice-stage.ecpay.com.tw/B2CInvoice/CancelDelayIssue';

    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}

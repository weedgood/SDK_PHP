<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $factory = new Factory;
    $hashKey = '5294y06JbISpM5x9';
    $hashIv = 'v77hoKGq4kWxNNIS';
    $autoSubmitFormService = $factory->createWithHash('AutoSubmitFormWithCmvService', $hashKey, $hashIv);

    $input = [
        'MerchantID' => '2000132',
        'MerchantTradeNo' => 'Test' . time(),
        'MerchantTradeDate' => date('Y/m/d H:i:s'),
        'PaymentType' => 'aio',
        'TotalAmount' => 100,
        'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
        'ItemName' => '範例商品一批 100 TWD x 1',
        'ReturnURL' => 'https://www.ecpay.com.tw/example/receive',
        'ChoosePayment' => 'CVS',
        'EncryptType' => 1,

        'StoreExpireDate' => 4320,
        'Desc_1' => '範例交易描述 1',
        'Desc_2' => '範例交易描述 2',
        'Desc_3' => '範例交易描述 3',
        'Desc_4' => '範例交易描述 4',
        'PaymentInfoURL' => 'https://www.ecpay.com.tw/example/payment-info',
    ];
    $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';
    
    echo $autoSubmitFormService->generate($input, $action);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}

<?php


namespace App\Services\V1;


class ShopQuery extends ApiFilters
{
    protected $safeparms = [
        'shopName' => ['eq'],
        'description' => ['like'],
        'address' => ['like'],
        'email' => ['eq'],
        'phone' => ['eq'],

    ];

    protected $columnMap = [
        'phone' => 'phone_no',
        'shopName' => 'shop_name'
    ];

}

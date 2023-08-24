<?php


namespace App\Services\V1;


class UserQuery extends ApiFilters
{
    protected $safeparms = [
        'name'=> ['eq','like'],
        'email' => ['eq'],
        'phone' => ['eq'],
        'address' => ['eq','like']
    ];
    protected $columnMap = [
        'Email' => 'email',
        'Phone' => 'phone',
        'Address' => 'address'
    ];

}

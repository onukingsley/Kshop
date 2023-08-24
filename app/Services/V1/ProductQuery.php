<?php


namespace App\Services\V1;


use Illuminate\Http\Request;

class ProductQuery extends ApiFilters
{
    protected $safeparms = [
        'title' => ['eq'],
        'price' => ['gt','eq','lt'],
        'categoryId' => ['eq'],
        'category' => ['eq'],
        'discountPrice' => ['gt','eq','lt'],

    ];

    protected $columnMap = [
        'discountPrice' => 'discount_price',
        'categoryId' => 'category_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
    ];


}

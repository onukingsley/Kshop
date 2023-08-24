<?php


namespace App\Services\V1;


use Illuminate\Http\Request;

class ApiFilters
{
        protected $safeparms=[];

        protected $columnMap =[];

        protected $operatorMap = [
            'eq' => '=',
            'lt' => '<',
            'gt' => '>',
            'lte' => '<=',
            'gte' => '>=',
            'like' => 'like'
        ];

    public function transform(Request $request){
        $eloQuery = [];
        foreach ($this->safeparms as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)){
                continue;
            }
            $colums = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])){
                    $eloQuery[] = [$colums, $this->operatorMap[$operator],$query[$operator]];
                }
            }
        }


        return $eloQuery;
    }

}

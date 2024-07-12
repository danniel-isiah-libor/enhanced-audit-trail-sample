<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Arr;

use App\Models\Query;
use App\Repositories\Contracts\QueryRepositoryInterface;

class QueryRepository extends Repository implements QueryRepositoryInterface
{
    /**
     * Create the repository instance.
     *
     * @param \App\Models\Query
     */
    public function __construct(Query $model)
    {
        $this->model = $model;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $request)
    {
        $data = [];

        foreach (Arr::get($request, 'query') as $key => $value) {
            array_push($data, [
                'correlation_id' => Arr::get($request, 'correlation_id'),
                'query' => Arr::get($value, 'query'),
                'elapsed_time' => Arr::get($value, 'time'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        return $this->model->insert($data);
    }
}

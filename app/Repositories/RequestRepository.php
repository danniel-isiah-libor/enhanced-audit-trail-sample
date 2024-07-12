<?php

namespace App\Repositories;

use App\Models\Request;
use App\Repositories\Contracts\RequestRepositoryInterface;

class RequestRepository extends Repository implements RequestRepositoryInterface
{
    /**
     * Create the repository instance.
     *
     * @param \App\Models\Request
     */
    public function __construct(Request $model)
    {
        $this->model = $model;
    }
}

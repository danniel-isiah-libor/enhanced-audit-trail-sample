<?php

namespace App\Repositories;

use App\Models\Exception;
use App\Repositories\Contracts\ExceptionRepositoryInterface;

class ExceptionRepository extends Repository implements ExceptionRepositoryInterface
{
    /**
     * Create the repository instance.
     *
     * @param \App\Models\Exception
     */
    public function __construct(Exception $model)
    {
        $this->model = $model;
    }
}

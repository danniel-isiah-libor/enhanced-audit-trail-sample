<?php

namespace App\Services\Support\Traits;

trait RepositoryResource
{
    /**
     * Store a newly created resource in storage.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $request)
    {
        return $this->repository->create($request);
    }
}

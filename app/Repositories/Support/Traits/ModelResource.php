<?php

namespace App\Repositories\Support\Traits;

trait ModelResource
{
    /**
     * Store a newly created resource in storage.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $request)
    {
        return (count($request)) ? $this->model->create($request) : $this->model->create();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int|string $id
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $request)
    {
        $model = $this->model->findOrFail($id);

        $model->update($request);

        return $model;
    }
}

<?php

namespace App\Services\Contracts;

use App\Services\Support\BaseContracts\StoreInterface as Store;

interface LogServiceInterface extends Store
{
    /**
     * Display the specified resource.
     *
     * @param  array  $request
     * @return mixed
     */
    public function search(array $request);
}

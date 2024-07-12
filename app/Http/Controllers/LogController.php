<?php

namespace App\Http\Controllers;

use App\Services\Contracts\LogServiceInterface;
use App\Http\Requests\Log\{
    StoreRequest,
    SearchRequest
};

class LogController extends Controller
{
    /**
     * The service instance.
     *
     * @var \App\Services\Contracts\LogServiceInterface
     */
    protected $service;

    /**
     * Create the controller instance and resolve its service.
     * 
     * @param \App\Services\Contracts\LogServiceInterface $service
     */
    public function __construct(LogServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Log\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validatedRequest = $request->validated();

        return $this->response(
            'Store a newly created resource in storage.',
            function () use ($validatedRequest) {
                return $this->service->store($validatedRequest);
            }
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\Log\SearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        $validatedRequest = $request->validated();

        return $this->response(
            'Display the specified resource.',
            function () use ($validatedRequest) {
                return $this->service->search($validatedRequest);
            }
        );
    }
}

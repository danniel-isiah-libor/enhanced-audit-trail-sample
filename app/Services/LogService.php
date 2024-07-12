<?php

namespace App\Services;

use Illuminate\Support\Arr;

use App\Repositories\Contracts\ExceptionRepositoryInterface;
use App\Repositories\Contracts\QueryRepositoryInterface;
use App\Repositories\Contracts\RequestRepositoryInterface;
use App\Services\Contracts\LogServiceInterface;

class LogService extends Service implements LogServiceInterface
{
    /**
     * @var \App\Repositories\Contracts\ExceptionRepositoryInterface
     */
    protected $exceptionRepository;

    /**
     * @var \App\Repositories\Contracts\QueryRepositoryInterface
     */
    protected $queryRepository;

    /**
     * Create the service instance and inject its repository.
     *
     * @param App\Repositories\Contracts\RequestRepositoryInterface
     * @param App\Repositories\Contracts\ExceptionRepositoryInterface
     * @param App\Repositories\Contracts\QueryRepositoryInterface
     */
    public function __construct(
        RequestRepositoryInterface $repository,
        ExceptionRepositoryInterface $exceptionRepository,
        QueryRepositoryInterface $queryRepository
    ) {
        $this->repository = $repository;
        $this->exceptionRepository = $exceptionRepository;
        $this->queryRepository = $queryRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $request
     * @return mixed
     */
    public function store(array $request)
    {
        $this->repository->create(Arr::except($request, ['exception', 'queries']));

        if (Arr::get($request, 'queries') && Arr::count($request, 'queries')) {
            $queries = Arr::get($request, 'queries');

            Arr::set($queries, 'correlation_id', Arr::get($request, 'correlation_id'));

            $this->queryRepository->create($queries);
        }

        if (Arr::get($request, 'exception') && Arr::count($request, 'exception')) {
            $exception = Arr::get($request, 'exception');

            Arr::set($exception, 'status', Arr::get($request, 'status'));
            Arr::set($exception, 'correlation_id', Arr::get($request, 'correlation_id'));

            $this->exceptionRepository->create($exception);
        }

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  array  $request
     * @return mixed
     */
    public function search(array $request)
    {
        return $this->repository->model()
            ->with(['exceptions', 'queries'])
            ->where('correlation_id', $request['correlation_id'])
            ->paginate();
    }
}

<?php

declare(strict_types=1);

namespace App\Packages\Presentations\Controllers;

use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\GetCustomerRequest;
use App\Packages\UseCases\GetCustomerUsecase;
use Exception;

class CustomerController extends Controller
{
    private GetCustomerUsecase $getCustomerUsecase;

    /**
     * @param GetCustomerUsecase $getCustomerUsecase
     */
    public function __construct(GetCustomerUsecase $getCustomerUsecase)
    {
        $this->getCustomerUsecase = $getCustomerUsecase;
    }

    /**
     * @param GetCustomerRequest $request
     * @return array
     * @throws Exception
     */
    public function index(GetCustomerRequest $request): array
    {
        $dto = $this->getCustomerUsecase->execute($request);
        return (array)$dto;
    }
}

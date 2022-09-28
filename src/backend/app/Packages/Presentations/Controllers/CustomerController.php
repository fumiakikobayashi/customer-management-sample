<?php

namespace App\Packages\Presentations\Controllers;

use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\GetCustomerRequest;
use App\Packages\UseCases\GetCustomerUsecase;
use Exception;

class CustomerController extends Controller
{
    /**
     * @param GetCustomerRequest $request
     * @return array
     * @throws Exception
     */
    public function index(GetCustomerRequest $request): array
    {
        $dto = (new GetCustomerUsecase($request))->execute();
        return (array)$dto;
    }
}

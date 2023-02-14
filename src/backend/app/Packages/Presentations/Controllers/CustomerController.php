<?php

declare(strict_types=1);

namespace App\Packages\Presentations\Controllers;

use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\GetCustomerRequest;
use App\Packages\UseCases\Customer\GetCustomerUsecase;
use Exception;

class CustomerController extends Controller
{
    /**
     * @param GetCustomerUsecase $usecase
     * @param GetCustomerRequest $request
     * @return array
     * @throws Exception
     */
    public function index(
        GetCustomerUsecase $usecase,
        GetCustomerRequest $request
    ): array {
        return (array)$usecase->execute($request);
    }
}

<?php

declare(strict_types=1);

namespace App\Packages\UseCases;

use App\Packages\Infrastructures\CustomersDtoFactory;
use App\Packages\Presentations\Requests\GetCustomerRequest;
use App\Packages\UseCases\Dto\CustomersDto;
use Exception;
use Illuminate\Support\Facades\Log;

class GetCustomerUsecase
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @throws Exception
     */
    public function execute(GetCustomerRequest $request): CustomersDto
    {
        Log::info(__METHOD__, ['START']);
        Log::info(__METHOD__, [
            'request'=> [],
        ]);

        try {
            $customerCollection = $this->customerRepository->getCustomerCollection();
            return CustomersDtoFactory::create($customerCollection);
        } catch (Exception $error) {
            Log::error(
                __METHOD__ . ' エラー内容:',
                ['file' => __FILE__, 'line' => __LINE__, 'pid' => getmygid(), 'exception' => (string)$error]
            );
            throw $error;
        } finally {
            Log::info(__METHOD__, ['END']);
        }
    }
}

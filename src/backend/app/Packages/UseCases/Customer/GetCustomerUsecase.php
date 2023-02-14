<?php

declare(strict_types=1);

namespace App\Packages\UseCases\Customer;

use App\Packages\Domains\Customer\CustomerCollection;
use App\Packages\Domains\Customer\CustomerRepositoryInterface;
use App\Packages\Presentations\Requests\GetCustomerRequest;
use App\Packages\UseCases\Dto\CustomerDto;
use Exception;

class GetCustomerUsecase
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param GetCustomerRequest $request
     * @return array<CustomerDto>
     * @throws Exception
     */
    public function execute(GetCustomerRequest $request): array
    {
        logger()->info('START - ' . __METHOD__);
        logger()->info('INPUT - ', [
            'request' => [],
        ]);

        try {
            $customerCollection = $this->customerRepository->getCustomerCollection();
        } catch (Exception $error) {
            logger()->error('EXECUTE FAILED! Get customers.');
            logger()->error('Cause by: Unexpected error.');
            throw $error;
        }

        logger()->info('Success! Get customers.');
        logger()->info('END - ' . __METHOD__);
        return $this->createCustomerDtoList($customerCollection);
    }

    /**
     * @param CustomerCollection $customerCollection
     * @return array<CustomerDto>
     */
    private function createCustomerDtoList(CustomerCollection $customerCollection): array
    {
        $result = [];
        foreach ($customerCollection->getCustomerList() as $customer) {
            $result[] = CustomerDtoFactory::create($customer);
        }
        return $result;
    }
}

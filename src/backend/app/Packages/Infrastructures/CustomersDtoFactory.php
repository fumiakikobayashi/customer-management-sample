<?php

declare(strict_types=1);

namespace App\Packages\Infrastructures;

use App\Packages\Domains\CustomerCollection;
use App\Packages\UseCases\Dto\CustomerDto;
use App\Packages\UseCases\Dto\CustomersDto;

class CustomersDtoFactory
{
    /**
     * @param CustomerCollection $customerCollection
     * @return CustomersDto
     */
    public static function create(CustomerCollection $customerCollection): CustomersDto
    {
        $customerDtoList = [];
        foreach ($customerCollection as $customer) {
            $customerDtoList[] = new CustomerDto(
                $customer->getCustomerId()->getValue(),
                $customer->getLastName(),
                $customer->getFirstName(),
                $customer->getEmail(),
                $customer->getPhoneNumber(),
                $customer->getRemark()
            );
        }
        return new CustomersDto($customerDtoList);
    }
}

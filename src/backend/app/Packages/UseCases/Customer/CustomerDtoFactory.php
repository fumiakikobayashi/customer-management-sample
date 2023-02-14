<?php

declare(strict_types=1);

namespace App\Packages\UseCases\Customer;

use App\Packages\Domains\Customer\Customer;
use App\Packages\UseCases\Dto\CustomerDto;

class CustomerDtoFactory
{
    /**
     * @param Customer $customer
     * @return CustomerDto
     */
    public static function create(Customer $customer): CustomerDto
    {
        return new CustomerDto(
            $customer->getCustomerId()->getValue(),
            $customer->getLastName(),
            $customer->getFirstName(),
            $customer->getEmail(),
            $customer->getPhoneNumber(),
            $customer->getRemark()
        );
    }
}

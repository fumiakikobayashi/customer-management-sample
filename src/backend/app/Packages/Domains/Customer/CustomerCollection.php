<?php

declare(strict_types=1);

namespace App\Packages\Domains\Customer;

class CustomerCollection
{
    private array $customerList = [];

    /**
     * @param Customer $customer
     * @return void
     */
    public function add(Customer $customer): void
    {
        $this->customerList[] = $customer;
    }

    /**
     * @return Customer[]
     */
    public function getCustomerList(): array
    {
        return $this->customerList;
    }
}

<?php

namespace App\Packages\Domains;

class CustomerCollection
{
    private array $customerList;

    /**
     * @param Customer[] $customerList
     */
    public function __construct(array $customerList)
    {
        $this->customerList = $customerList;
    }

    public function getCustomerList(): array
    {
        return $this->customerList;
    }

    public function add(Customer $customer): void
    {
        $this->customerList[] = $customer;
    }
}

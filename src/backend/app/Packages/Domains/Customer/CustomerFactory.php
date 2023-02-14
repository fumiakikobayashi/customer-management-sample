<?php

declare(strict_types=1);

namespace App\Packages\Domains\Customer;

use App\Packages\Infrastructures\Models\Customer as CustomerModel;
use Exception;

class CustomerFactory
{
    /**
     * @param CustomerModel $customer
     * @return Customer
     * @throws Exception
     */
    public static function create(CustomerModel $customer): Customer
    {
        return new Customer(
            new CustomerId($customer->id),
            $customer->last_name,
            $customer->first_name,
            $customer->email,
            $customer->remark
        );
    }
}

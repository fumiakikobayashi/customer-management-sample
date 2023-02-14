<?php

declare(strict_types=1);

namespace App\Packages\Domains\Customer;

interface CustomerRepositoryInterface
{
    public function getCustomerCollection(): CustomerCollection;
}

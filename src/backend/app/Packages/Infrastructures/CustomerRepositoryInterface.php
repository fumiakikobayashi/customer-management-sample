<?php

namespace App\Packages\Infrastructures;

use App\Packages\Domains\CustomerCollection;

interface CustomerRepositoryInterface
{
    public function getCustomerCollection(): CustomerCollection;
}

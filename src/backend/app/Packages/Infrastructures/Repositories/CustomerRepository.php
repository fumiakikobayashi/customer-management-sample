<?php

declare(strict_types=1);

namespace App\Packages\Infrastructures\Repositories;

use App\Exceptions\RepositoryException;
use App\Packages\Domains\Customer\CustomerCollection;
use App\Packages\Domains\Customer\CustomerFactory;
use App\Packages\Domains\Customer\CustomerRepositoryInterface;
use App\Packages\Infrastructures\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @return CustomerCollection
     * @throws RepositoryException
     * @throws Exception
     */
    public function getCustomerCollection(): CustomerCollection
    {
        $customerModelCollection = Customer::query()->get();

        if ($customerModelCollection->isEmpty()) {
            throw new RepositoryException('顧客リストが見つかりませんでした。');
        }

        return $this->createCustomerCollection($customerModelCollection);
    }

    /**
     * @param Collection $customerModelCollection
     * @return CustomerCollection
     * @throws Exception
     */
    private function createCustomerCollection(Collection $customerModelCollection): CustomerCollection
    {
        $customerCollection = new CustomerCollection();
        foreach ($customerModelCollection as $customerModel) {
            $customerCollection->add(CustomerFactory::create($customerModel));
        }
        return $customerCollection;
    }
}

<?php

declare(strict_types=1);

namespace App\Packages\Domains\Customer;

use App\Exceptions\DomainException;
use Exception;

class CustomerId
{
    private int $value;

    const MIN_USER_ID = 1;

    /**
     * @throws Exception
     */
    public function __construct(int $value)
    {
        if ($value < self::MIN_USER_ID) {
            throw new DomainException('userIdは1以上の値を入力してください');
        }
        $this->value = $value;
    }

    /**
     * @param CustomerId $customerId
     * @return bool
     */
    public function equals(CustomerId $customerId): bool
    {
        return $this->getValue() === $customerId->getValue();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}

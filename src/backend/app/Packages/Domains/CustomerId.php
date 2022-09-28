<?php

declare(strict_types=1);

namespace App\Packages\Domains;

use App\Packages\Domains\Shared\Uuid;
use Exception;

class CustomerId
{
    private Uuid $uuid;

    /**
     * @throws Exception
     */
    public function __construct(string | null $value = null)
    {
        $this->uuid = new Uuid($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->uuid->getUuid();
    }

    /**
     * @param CustomerId $customerId
     * @return bool
     */
    public function equals(CustomerId $customerId): bool
    {
        return $this->getValue() === $customerId->getValue();
    }
}

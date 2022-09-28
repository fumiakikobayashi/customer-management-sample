<?php declare(strict_types=1);

namespace App\Packages\Domains\Shared;

use Exception;
use Illuminate\Support\Str;

class Uuid
{
    private const LENGTH = 36;
    private string $uuid;

    /**
     * @throws Exception
     */
    public function __construct(String | null $uuid = null)
    {
        if ($uuid === null) {
            $this->uuid = (string)Str::orderedUuid();
        } else {
            $this->uuid = $uuid;
        }

        if (strlen($this->uuid) !== self::LENGTH) {
            throw new Exception('uuid is invalid. value:' . $this->uuid);
        }
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param Uuid $uuid
     * @return bool
     */
    public function equals(Uuid $uuid): bool
    {
        return $this->uuid === $uuid->getUuid();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->uuid;
    }
}

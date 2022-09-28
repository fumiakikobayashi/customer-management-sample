<?php declare(strict_types=1);

namespace App\Packages\UseCases\Dto;

class CustomersDto
{
    private array $customersDto;

    /**
     * @param CustomerDto[] $customersDto
     */
    public function __construct(array $customersDto)
    {
        $this->customersDto = $customersDto;
    }
}

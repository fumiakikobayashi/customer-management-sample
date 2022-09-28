<?php declare(strict_types=1);

namespace App\Packages\UseCases\Dto;

class CustomerDto
{
    private string $customerId;
    private string $lastName;
    private string $firstName;
    private string $email;
    private string $phoneNumber;
    private string $remark;

    public function __construct(
        string $customerId,
        string $lastName,
        string $firstName,
        string $email,
        string $phoneNumber,
        string $remark
    ) {
        $this->customerId = $customerId;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->remark = $remark;
    }
}

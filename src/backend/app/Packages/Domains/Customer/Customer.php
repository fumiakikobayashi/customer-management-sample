<?php

declare(strict_types=1);

namespace App\Packages\Domains\Customer;

class Customer
{
    private CustomerId $customerId;
    private string     $lastName;
    private string     $firstName;
    private string     $email;
    private string     $remark;

    public function __construct(
        CustomerId $customerId,
        string     $lastName,
        string     $firstName,
        string     $email,
        string     $remark
    ) {
        $this->customerId = $customerId;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->remark = $remark;
    }

    /**
     * @return CustomerId
     */
    public function getCustomerId(): CustomerId
    {
        return $this->customerId;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }
}

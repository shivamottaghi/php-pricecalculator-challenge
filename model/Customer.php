<?php

class Customer
{
    protected string $name;
    protected string $lastName;
    protected int $groupId;
    protected int $fixedDiscount;
    protected int $variableDiscount;

    /**
     * @param string $name
     * @param string $lastName
     * @param int $groupId
     * @param int $fixedDiscount
     * @param int $variableDiscount
     */
    public function __construct(string $name, string $lastName, int $groupId, int $fixedDiscount, int $variableDiscount)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @return int
     */
    public function getFixedDiscount(): int
    {
        return $this->fixedDiscount;
    }

    /**
     * @return int
     */
    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }



}
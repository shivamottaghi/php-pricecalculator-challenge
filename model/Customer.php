<?php

class Customer
{
    protected string $name;
    protected string $lastName;
    protected int $groupId;
    protected int $fixedDiscount;
    protected int $variableDiscount;
    protected array $fixedArr;
    protected array $variableArr;

    /**
     * @param string $name
     * @param string $lastName
     * @param int $groupId
     */
    public function __construct(string $name, string $lastName, int $groupId)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
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

    /**
     * @param int $fixedDiscount
     */
    public function setFixedDiscount(int $fixedDiscount): void
    {
        $this->fixedDiscount = $fixedDiscount;
    }

    /**
     * @param int $variableDiscount
     */
    public function setVariableDiscount(int $variableDiscount): void
    {
        $this->variableDiscount = $variableDiscount;
    }



}
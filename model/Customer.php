<?php

class Customer
{
<<<<<<< HEAD
   private int $id;
   private string $name;
   private string $lastName;
   private int $groupId;
   private int $fixedDiscount;
   private int $variableDiscount;
=======
    protected int $id;
    protected string $name;
    protected string $lastName;
    protected int $groupId;
    protected int $fixedDiscount;
    protected int $variableDiscount;
    protected array $fixedArr;
    protected array $variableArr;
>>>>>>> a807a3bbb55d442479aa9ad29bcc686d2169f018

    /**
     * @param string $name
     * @param string $lastName
     * @param int $groupId
     */
<<<<<<< HEAD
    public function __construct(int $id ,string $name, string $lastName, int $groupId , int $fixed , int $variable)
=======
    public function __construct(int $id ,string $name, string $lastName, int $groupId , array $fixed , array $variable)
>>>>>>> a807a3bbb55d442479aa9ad29bcc686d2169f018
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
<<<<<<< HEAD
        $this->fixedDiscount = $fixed;
        $this->variableDiscount = $variable;
=======
        $this->fixedArr = $fixed;
        $this->variableArr = $variable;
>>>>>>> a807a3bbb55d442479aa9ad29bcc686d2169f018
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
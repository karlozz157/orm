<?php

/**
 * @table(name="resellers")
 */
class Reseller extends Entity
{
    /**
     * @column(name="id")
     *
     * @var int $id
     */
    private $id;

    /**
     * @assert(type="int") 
     * @column(name="id_company")
     *
     * @var int $company
     */
    private $company;

    /**
     * @assert(type="string", length=255) 
     * @column(name="name")
     *
     * @var string $name
     */
    private $name;

    /**
     * @assert(type="string", length=255) 
     * @column(name="last_name")
     *    
     * @var string $lastName
     */
    private $lastName;

    /**
     * @assert(type="date") 
     * @column(name="birthday")
     *
     * @var DateTime $birthday
     */
    private $birthday;

    /**
     * @assert(type="int", length=10) 
     * @column(name="cellphone")
     *    
     * @var string $cellphone
     */
    private $cellphone;

    /**
     * @assert(type="int", length=10) 
     * @column(name="telephone")
     *      
     * @var string $telephone
     */
    private $telephone;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param int $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param DateTime $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * @param string $cellphone
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}

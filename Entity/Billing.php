<?php

class Billing
{
    /**
     * @assert(type="int") 
     * @column(name="id_t_dir_facturaciones")
     *  
     * @var int $id
     */
    private $id;

    /**
     * @assert(type="int") 
     * @column(name="id_t_empresas")
     *  
     * @var int $company
     */
    private $company;

    /**
     * @assert(type="string") 
     * @column(name="calle")
     *  
     * @var int $street
     */
    private $street;

    /**
     * @assert(type="int", length=10) 
     * @column(name="numero")
     *  
     * @var int $streetNumber
     */
    private $streetNumber;

    /**
     * @assert(type="string") 
     * @column(name="colonia")
     *  
     * @var int $address
     */
    private $address;

    /**
     * @assert(type="string") 
     * @column(name="ciudad")
     *  
     * @var int $city
     */
    private $city;

    /**
     * @assert(type="string") 
     * @column(name="estado")
     *  
     * @var int $state
     */
    private $state;

    /**
     * @assert(type="int", length="5") 
     * @column(name="cp")
     *  
     * @var int $postcode
     */
    private $postcode;

    /**
     * @assert(type="string") 
     * @column(name="pais")
     *  
     * @var int $country
     */
    private $country;

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
     * @return int
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param int $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return int
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param int $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return int
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param int $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param int $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param int $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param int $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
}

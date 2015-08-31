<?php

class BankAccount
{
    /**
     * @column(name="id_c_cuentas")
     *
     * @var int $id
     */
    private $id;

    /**
     * @assert(type="string") 
     * @column(name="id_t_empresas")
     *  
     * @var int $company
     */
    private $company;

    /**
     * @assert(type="string") 
     * @column(name="no_cuenta")
     *  
     * @var int $accountNumber
     */
    private $accountNumber;

    /**
     * @assert(type="string") 
     * @column(name="sucursal")
     *  
     * @var string $sucursal
     */
    private $sucursal;

    /**
     * @assert(type="string")
     * @column(name="clabe")
     *
     * @var string $clabe
     */
    private $clabe;

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
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param int $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return string
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * @param string $sucursal
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;
    }

    /**
     * @return string
     */
    public function getClabe()
    {
        return $this->clabe;
    }

    /**
     * @param string $clabe
     */
    public function setClabe($clabe)
    {
        $this->clabe = $clabe;
    }
}

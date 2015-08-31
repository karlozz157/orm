<?php

class Company
{
    /**
     * @column(name="id")
     *
     * @var int $id
     */ 
    private $id;

    /**
     * @assert(type="string")
     * @column(name="razon_social")
     *
     * @var string $razonSocial
     */
    private $razonSocial;

    /**
     * @assert(type="string") 
     * @column(name="representante_legal")
     *
     * @var string $representanteLegal
     */ 
    private $representanteLegal;

    /**
     * @assert(type="string") 
     * @column(name="nombre_comercial")
     *
     * @var string $nombreComercial
     */ 
    private $nombreComercial;

    /**
     * @assert(type="email") 
     * @column(name="email")
     *
     * @var string $email
     */     
    private $email;

    /**
     * @assert(type="string") 
     * @column(name="rfc")
     *
     * @var string $rfc
     */     
    private $rfc;

    /**
     * @assert(type="int", length=10) 
     * @column(name="telefono")
     *
     * @var string $telefono
     */    
    private $telefono;

    /**
     * @assert(type="string") 
     * @column(name="sitio_web")
     *
     * @var string $sitioWeb
     */    
    private $sitioWeb;

    /**
     * @assert(type="date") 
     * @column(name="fecha_registro")
     *
     * @var string $fechaRegistro
     */ 
    private $fechaRegistro;

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
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * @param string $razonSocial
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    /**
     * @return string
     */
    public function getRepresentanteLegal()
    {
        return $this->representanteLegal;
    }

    /**
     * @param string $representanteLegal
     */
    public function setRepresentanteLegal($representanteLegal)
    {
        $this->representanteLegal = $representanteLegal;
    }

    /**
     * @return string
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }

    /**
     * @param string $nombreComercial
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @param string $rfc
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return string
     */
    public function getSitioWeb()
    {
        return $this->sitioWeb;
    }

    /**
     * @param string $sitioWeb
     */
    public function setSitioWeb($sitioWeb)
    {
        $this->sitioWeb = $sitioWeb;
    }

    /**
     * @return string
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * @param string $fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    }
}

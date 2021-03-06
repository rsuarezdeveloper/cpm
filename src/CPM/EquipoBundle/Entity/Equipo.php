<?php

namespace CPM\EquipoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Equipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\ModeloEquipo")
     * @ORM\JoinColumn(name="modelo", referencedColumnName="id")
     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Proveedor")
     * @ORM\JoinColumn(name="proveedor", referencedColumnName="id")
     */
    private $proveedor;

   /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Sucursal")
     * @ORM\JoinColumn(name="sucursal", referencedColumnName="id")
     */
    private $sucursal;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Localizacion")
     * @ORM\JoinColumn(name="localizacion", referencedColumnName="id")
     */
    private $localizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=255)
     */
    private $referencia;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\MarcaEquipo")
     * @ORM\JoinColumn(name="marca", referencedColumnName="id")
     */
    private $marca;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInstalacion", type="datetime")
     */
    private $fechaInstalacion;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=255)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=255)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;
    
    /**
     * @ORM\ManyToOne(targetEntity="CPM\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="responsable", referencedColumnName="id")
     */
    private $responsable;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="costo", type="decimal",scale=2)
     */
    private $costo;

    /**
     * @var string
     *
     * @ORM\Column(name="maxApagado", type="decimal", scale=2)
     */
    private $maxApagado;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

 

    /**
     * Set referencia
     *
     * @param string $referencia
     * @return Equipo
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set fechaInstalacion
     *
     * @param \DateTime $fechaInstalacion
     * @return Equipo
     */
    public function setFechaInstalacion($fechaInstalacion)
    {
        $this->fechaInstalacion = $fechaInstalacion;

        return $this;
    }

    /**
     * Get fechaInstalacion
     *
     * @return \DateTime 
     */
    public function getFechaInstalacion()
    {
        return $this->fechaInstalacion;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Equipo
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set serial
     *
     * @param string $serial
     * @return Equipo
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Equipo
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Equipo
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set maxApagado
     *
     * @param string $maxApagado
     * @return Equipo
     */
    public function setMaxApagado($maxApagado)
    {
        $this->maxApagado = $maxApagado;

        return $this;
    }

    /**
     * Get maxApagado
     *
     * @return string 
     */
    public function getMaxApagado()
    {
        return $this->maxApagado;
    }

    /**
     * Set modelo
     *
     * @param \CPM\BaseBundle\Entity\ModeloEquipo $modelo
     * @return Equipo
     */
    public function setModelo(\CPM\BaseBundle\Entity\ModeloEquipo $modelo = null)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return \CPM\BaseBundle\Entity\ModeloEquipo 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set proveedor
     *
     * @param \CPM\BaseBundle\Entity\Proveedor $proveedor
     * @return Equipo
     */
    public function setProveedor(\CPM\BaseBundle\Entity\Proveedor $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \CPM\BaseBundle\Entity\Proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set cliente
     *
     * @param \CPM\BaseBundle\Entity\Cliente $cliente
     * @return Equipo
     */
    public function setCliente(\CPM\BaseBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \CPM\BaseBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set sucursal
     *
     * @param \CPM\BaseBundle\Entity\Sucursal $sucursal
     * @return Equipo
     */
    public function setSucursal(\CPM\BaseBundle\Entity\Sucursal $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \CPM\BaseBundle\Entity\Sucursal 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set localizacion
     *
     * @param \CPM\BaseBundle\Entity\Localizacion $localizacion
     * @return Equipo
     */
    public function setLocalizacion(\CPM\BaseBundle\Entity\Localizacion $localizacion = null)
    {
        $this->localizacion = $localizacion;

        return $this;
    }

    /**
     * Get localizacion
     *
     * @return \CPM\BaseBundle\Entity\Localizacion 
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * Set marca
     *
     * @param \CPM\BaseBundle\Entity\MarcaEquipo $marca
     * @return Equipo
     */
    public function setMarca(\CPM\BaseBundle\Entity\MarcaEquipo $marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return \CPM\BaseBundle\Entity\MarcaEquipo 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set costo
     *
     * @param string $costo
     * @return Equipo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return string 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set responsable
     *
     * @param \CPM\UserBundle\Entity\User $responsable
     * @return Equipo
     */
    public function setResponsable(\CPM\UserBundle\Entity\User $responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return \CPM\UserBundle\Entity\User 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }
}

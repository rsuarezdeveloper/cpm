<?php

namespace CPM\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contacto
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Proveedor")
     * @ORM\JoinColumn(name="proveedor", referencedColumnName="id")
     */
    private $proveedor;

   /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Sucursal")
     * @ORM\JoinColumn(name="sucursal", referencedColumnName="id")
     */
    private $sucursal;

    /**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Cargo")
     * @ORM\JoinColumn(name="cargo", referencedColumnName="id")
     */
    private $cargo;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Contacto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Contacto
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contacto
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
	/**
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->nombre;
    }

    

    /**
     * Set cliente
     *
     * @param \CPM\BaseBundle\Entity\Cliente $cliente
     * @return Contacto
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
     * Set proveedor
     *
     * @param \CPM\BaseBundle\Entity\Proveedor $proveedor
     * @return Contacto
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
     * Set sucursal
     *
     * @param \CPM\BaseBundle\Entity\Sucursal $sucursal
     * @return Contacto
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
     * Set cargo
     *
     * @param \CPM\BaseBundle\Entity\Cargo $cargo
     * @return Contacto
     */
    public function setCargo(\CPM\BaseBundle\Entity\Cargo $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \CPM\BaseBundle\Entity\Cargo 
     */
    public function getCargo()
    {
        return $this->cargo;
    }
}

<?php

namespace CPM\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sucursal
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sucursal
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
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     */
    private $cliente;
	
	/**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Municipio")
     * @ORM\JoinColumn(name="municipio", referencedColumnName="id")
     */
    private $municipio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

	/**
     * @ORM\ManyToOne(targetEntity="CPM\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="responsable", referencedColumnName="id")
     */
    private $responsable;
    
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Sucursal
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    /**
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->descripcion;
    }

    /**
     * Set cliente
     *
     * @param \CPM\BaseBundle\Entity\Cliente $cliente
     * @return Sucursal
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
     * Set municipio
     *
     * @param \CPM\BaseBundle\Entity\Municipio $municipio
     * @return Sucursal
     */
    public function setMunicipio(\CPM\BaseBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \CPM\BaseBundle\Entity\Municipio 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set responsable
     *
     * @param \CPM\UserBundle\Entity\User $responsable
     * @return Sucursal
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

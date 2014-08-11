<?php

namespace CPM\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localizacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Localizacion
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
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Sucursal")
     * @ORM\JoinColumn(name="sucursal", referencedColumnName="id")
     */
    private $sucursal;

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
     * Set cliente
     *
     * @param integer $cliente
     * @return Localizacion
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return integer 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Localizacion
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
     * Set sucursal
     *
     * @param \CPM\BaseBundle\Entity\Sucursal $sucursal
     * @return Localizacion
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
}

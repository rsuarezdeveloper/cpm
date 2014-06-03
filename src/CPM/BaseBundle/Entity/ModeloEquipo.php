<?php

namespace CPM\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloEquipo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ModeloEquipo
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
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\MarcaEquipo")
     * @ORM\JoinColumn(name="marca", referencedColumnName="id")
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;
	
	/**
     * @ORM\ManyToOne(targetEntity="CPM\BaseBundle\Entity\Documento")
     * @ORM\JoinColumn(name="imagen", referencedColumnName="id")
     */
    private $imagen;

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
     * @return ModeloEquipo
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
     * Set imagen
     *
     * @param \CPM\BaseBundle\Entity\Documento $imagen
     * @return ModeloEquipo
     */
    public function setImagen(\CPM\BaseBundle\Entity\Documento $imagen = null)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return \CPM\BaseBundle\Entity\Documento 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set marca
     *
     * @param \CPM\BaseBundle\Entity\MarcaEquipo $marca
     * @return ModeloEquipo
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
}

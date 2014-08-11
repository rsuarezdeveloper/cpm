<?php

namespace CPM\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Uigen\Bundle\GeneratorBundle\Entity\Entityobject;

/**
 * Cargo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cargo extends Entityobject
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


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
     * @return Cargo
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
    
    
}

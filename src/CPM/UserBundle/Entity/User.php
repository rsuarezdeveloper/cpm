<?php
// src/Acme/UserBundle/Entity/User.php

namespace CPM\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Usuario")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nombre="";
    
   
    
    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre(){
	        return $this->nombre;
        }
     
    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
        
    
    
    /**
     *@return string
     */
     public function __toString(){
	     return $this->nombre;
     }
     
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
<?php

namespace DevelopSoft\InmueblesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InmuebleNegocio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DevelopSoft\InmueblesBundle\Entity\InmuebleNegocioRepository")
 */
class InmuebleNegocio
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
	* @ORM\ManyToOne(targetEntity="Inmueble")
	* @ORM\JoinColumn(name="idInmueble", referencedColumnName="id")
	*/
    private $inmueble;

	/**
	* @ORM\ManyToOne(targetEntity="Negocio")
	* @ORM\JoinColumn(name="idNegocio", referencedColumnName="id")
	*/
    private $negocio;


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
     * Set inmueble
     *
     * @param integer $inmueble
     * @return InmuebleNegocio
     */
    public function setInmueble($inmueble)
    {
        $this->inmueble = $inmueble;

        return $this;
    }

    /**
     * Get inmueble
     *
     * @return integer 
     */
    public function getInmueble()
    {
        return $this->inmueble;
    }

    /**
     * Set negocio
     *
     * @param integer $negocio
     * @return InmuebleNegocio
     */
    public function setNegocio($negocio)
    {
        $this->negocio = $negocio;

        return $this;
    }

    /**
     * Get negocio
     *
     * @return integer 
     */
    public function getNegocio()
    {
        return $this->negocio;
    }
}

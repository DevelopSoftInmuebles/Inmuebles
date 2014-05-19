<?php

namespace DevelopSoft\InmueblesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pago
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DevelopSoft\InmueblesBundle\Entity\PagoRepository")
 */
class Pago
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
     * @ORM\Column(name="tipoPago", type="string", length=45)
     */
    private $tipoPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="monto", type="integer")
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="pagosCol", type="string", length=45)
     */
    private $pagosCol;



	/**
	* @ORM\OneToMany(targetEntity="Usuario", mappedBy="pagos")
	*/
    private $usuarios;

	/**
	* @ORM\OneToMany(targetEntity="Inmueble", mappedBy="pagos")
	*/
    private $inmuebles;





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
     * Set tipoPago
     *
     * @param string $tipoPago
     * @return Pago
     */
    public function setTipoPago($tipoPago)
    {
        $this->tipoPago = $tipoPago;

        return $this;
    }

    /**
     * Get tipoPago
     *
     * @return string 
     */
    public function getTipoPago()
    {
        return $this->tipoPago;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Pago
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set monto
     *
     * @param integer $monto
     * @return Pago
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return integer 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set pagosCol
     *
     * @param string $pagosCol
     * @return Pago
     */
    public function setPagosCol($pagosCol)
    {
        $this->pagosCol = $pagosCol;

        return $this;
    }

    /**
     * Get pagosCol
     *
     * @return string 
     */
    public function getPagosCol()
    {
        return $this->pagosCol;
    }
}

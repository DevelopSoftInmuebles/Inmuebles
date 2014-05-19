<?php

namespace DevelopSoft\InmueblesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inmueble
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DevelopSoft\InmueblesBundle\Entity\InmuebleRepository")
 */
class Inmueble
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
     * @ORM\Column(name="tipo", type="string", length=45)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estrato", type="integer")
     */
    private $estrato;

    /**
     * @var boolean
     *
     * @ORM\Column(name="agua", type="boolean")
     */
    private $agua;

    /**
     * @var boolean
     *
     * @ORM\Column(name="luz", type="boolean")
     */
    private $luz;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gas", type="boolean")
     */
    private $gas;

    /**
     * @var boolean
     *
     * @ORM\Column(name="telefono", type="boolean")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="reparaciones", type="text")
     */
    private $reparaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="mejoras", type="text")
     */
    private $mejoras;

    /**
     * @var string
     *
     * @ORM\Column(name="novedades", type="text")
     */
    private $novedades;

    /**
     * @var string
     *
     * @ORM\Column(name="inversiones", type="text")
     */
    private $inversiones;


	/**
	* @ORM\ManyToOne(targetEntity="Pago")
	* @ORM\JoinColumn(name="idPago", referencedColumnName="id")
	*/
    private $pagos;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=1024)
     */
    private $url;


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
     * Set tipo
     *
     * @param string $tipo
     * @return Inmueble
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Inmueble
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set estrato
     *
     * @param integer $estrato
     * @return Inmueble
     */
    public function setEstrato($estrato)
    {
        $this->estrato = $estrato;

        return $this;
    }

    /**
     * Get estrato
     *
     * @return integer 
     */
    public function getEstrato()
    {
        return $this->estrato;
    }

    /**
     * Set agua
     *
     * @param boolean $agua
     * @return Inmueble
     */
    public function setAgua($agua)
    {
        $this->agua = $agua;

        return $this;
    }

    /**
     * Get agua
     *
     * @return boolean 
     */
    public function getAgua()
    {
        return $this->agua;
    }

    /**
     * Set luz
     *
     * @param boolean $luz
     * @return Inmueble
     */
    public function setLuz($luz)
    {
        $this->luz = $luz;

        return $this;
    }

    /**
     * Get luz
     *
     * @return boolean 
     */
    public function getLuz()
    {
        return $this->luz;
    }

    /**
     * Set gas
     *
     * @param boolean $gas
     * @return Inmueble
     */
    public function setGas($gas)
    {
        $this->gas = $gas;

        return $this;
    }

    /**
     * Get gas
     *
     * @return boolean 
     */
    public function getGas()
    {
        return $this->gas;
    }

    /**
     * Set telefono
     *
     * @param boolean $telefono
     * @return Inmueble
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return boolean 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set reparaciones
     *
     * @param string $reparaciones
     * @return Inmueble
     */
    public function setReparaciones($reparaciones)
    {
        $this->reparaciones = $reparaciones;

        return $this;
    }

    /**
     * Get reparaciones
     *
     * @return string 
     */
    public function getReparaciones()
    {
        return $this->reparaciones;
    }

    /**
     * Set mejoras
     *
     * @param string $mejoras
     * @return Inmueble
     */
    public function setMejoras($mejoras)
    {
        $this->mejoras = $mejoras;

        return $this;
    }

    /**
     * Get mejoras
     *
     * @return string 
     */
    public function getMejoras()
    {
        return $this->mejoras;
    }

    /**
     * Set novedades
     *
     * @param string $novedades
     * @return Inmueble
     */
    public function setNovedades($novedades)
    {
        $this->novedades = $novedades;

        return $this;
    }

    /**
     * Get novedades
     *
     * @return string 
     */
    public function getNovedades()
    {
        return $this->novedades;
    }

    /**
     * Set inversiones
     *
     * @param string $inversiones
     * @return Inmueble
     */
    public function setInversiones($inversiones)
    {
        $this->inversiones = $inversiones;

        return $this;
    }

    /**
     * Get inversiones
     *
     * @return string 
     */
    public function getInversiones()
    {
        return $this->inversiones;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Inmueble
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set pagos
     *
     * @param \DevelopSoft\InmueblesBundle\Entity\Pago $pagos
     * @return Inmueble
     */
    public function setPagos(\DevelopSoft\InmueblesBundle\Entity\Pago $pagos = null)
    {
        $this->pagos = $pagos;

        return $this;
    }

    /**
     * Get pagos
     *
     * @return \DevelopSoft\InmueblesBundle\Entity\Pago 
     */
    public function getPagos()
    {
        return $this->pagos;
    }
}

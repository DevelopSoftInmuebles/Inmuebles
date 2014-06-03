<?php

namespace DevelopSoft\InmueblesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuario implements UserInterface, \Serializable, EquatableInterface
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
     * @var integer
     *
     * @ORM\Column(name="cedula", type="integer")
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreUsuario", type="string", length=255)
     */
    private $nombreUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=255)
     */
    private $contrasena;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion", type="integer")
     */
    private $calificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=45)
     */
    private $telefono;

	/**
	* @ORM\OneToMany(targetEntity="Cita", mappedBy="usuarios")
	*/
    private $citas;

	/**
	* @ORM\ManyToOne(targetEntity="Pago")
	* @ORM\JoinColumn(name="idPago", referencedColumnName="id")
	*/
    private $pagos;




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
     * Set cedula
     *
     * @param integer $cedula
     * @return Usuario
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return integer 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
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
     * Set email
     *
     * @param string $email
     * @return Usuario
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
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     * @return Usuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string 
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     * @return Usuario
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string 
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set calificacion
     *
     * @param integer $calificacion
     * @return Usuario
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    /**
     * Get calificacion
     *
     * @return integer 
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Usuario
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
     * Constructor
     */
    public function __construct()
    {
        $this->citas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add citas
     *
     * @param \DevelopSoft\InmueblesBundle\Entity\Cita $citas
     * @return Usuario
     */
    public function addCita(\DevelopSoft\InmueblesBundle\Entity\Cita $citas)
    {
        $this->citas[] = $citas;

        return $this;
    }

    /**
     * Remove citas
     *
     * @param \DevelopSoft\InmueblesBundle\Entity\Cita $citas
     */
    public function removeCita(\DevelopSoft\InmueblesBundle\Entity\Cita $citas)
    {
        $this->citas->removeElement($citas);
    }

    /**
     * Get citas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCitas()
    {
        return $this->citas;
    }

    /**
     * Set pagos
     *
     * @param \DevelopSoft\InmueblesBundle\Entity\Pago $pagos
     * @return Usuario
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




////////////////////////////////////////////////////////////////////////////////


    /**
	* Set salt
	*
	* @param string $salt
	* @return Usuario
	*/
    public function setSalt($salt)
    {
        return $this;
    }

    /**
	* Get salt
	*
	* @return string
	*/
    public function getSalt()
    {
        return "";
    }



//////////////////////////////////////

    public function getPassword()
    {
        return $this->contrasena;
    }

    public function getUsername()
    {
        return $this->nombreUsuario;
    }
	public function getRoles()
	{
		return array("ROLE_ADMIN");
	}
	public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {

        if (!$user instanceof Usuario) {
            return false;
        }

        if ($this->contrasena !== $user->getPassword()) {
            return false;
        }

        if ($this->getSalt() !== $user->getSalt()) {
            return false;
        }

        if ($this->nombreUsuario !== $user->getUsername()) {
            return false;
        }

        return true;
    }


    /**
     * Serializes the content of the current User object
     * @return string
     */
    public function serialize()
    {
        return \serialize(
                array(
        	$this->id,
        	$this->cedula,
        	$this->nombre,
        	$this->email,
        	$this->nombreUsuario,
        	$this->contrasena,
        	$this->calificacion,
        	$this->telefono
                    ));
    }

    /**
     * Unserializes the given string in the current User object
     * @param serialized
     */
    public function unserialize($serialized)
    {
        list(
        	$this->id,
        	$this->cedula,
        	$this->nombre,
        	$this->email,
        	$this->nombreUsuario,
        	$this->contrasena,
        	$this->calificacion,
        	$this->telefono
            ) 
                   = \unserialize($serialized);
    }






}

<?php
// src/DevelopSoft/InmueblesBundle/Form/LoginForm.php
namespace DevelopSoft\InmueblesBundle\Form;


class LoginForm
{
	protected $usuario;
	protected $clave;
	public function getUsuario()
	{
		return $this->usuario;
	}
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}
	public function getClave()
	{
		return $this->clave;
	}
	public function setClave($clave = null)
	{
		$this->clave = $clave;
	}
}


<?php

namespace DevelopSoft\InmueblesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario', 'text', array('label' => 'Usuario'))
            ->add('contrasena', 'repeated', array(
					'type' => 'password',
					'invalid_message' => 'Las claves deben ser iguales.',
					'options' => array('attr' => array('class' => 'password-field')),
					'required' => true,
					'first_options'  => array('label' => 'Clave'),
					'second_options' => array('label' => 'Repita la clave')
				)
			)
            ->add('cedula', 'number', array('label' => 'Cedula'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('email', 'email', array('label' => 'Correo electrónico'))
            ->add('telefono', 'number', array('label' => 'Teléfono'))
//            ->add('salt')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DevelopSoft\InmueblesBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'developsoft_inmueblesbundle_usuario';
    }
}


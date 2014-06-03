<?php

namespace DevelopSoft\InmueblesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InmuebleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo')
            ->add('direccion')
            ->add('estrato')
            ->add('agua', "checkbox", array("required"=>false))
            ->add('luz', "checkbox", array("required"=>false))
            ->add('gas', "checkbox", array("required"=>false))
            ->add('telefono', "checkbox", array("required"=>false))
            ->add('reparaciones')
            ->add('mejoras')
            ->add('novedades')
            ->add('inversiones')
            ->add('url')
            ->add('pagos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DevelopSoft\InmueblesBundle\Entity\Inmueble'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'developsoft_inmueblesbundle_inmueble';
    }
}

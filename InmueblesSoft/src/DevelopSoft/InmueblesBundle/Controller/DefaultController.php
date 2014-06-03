<?php

namespace DevelopSoft\InmueblesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DevelopSoft\InmueblesBundle\Form\LoginForm;
use DevelopSoft\InmueblesBundle\Entity\Usuario;
use DevelopSoft\InmueblesBundle\Form\UsuarioType;


class DefaultController extends Controller
{
    public function indexAction()
    {
    
		$user = $this->getUser();
		if (isset($user)){
			return $this->redirect($this->generateUrl('inmueble'));
		}
    
        $em = $this->getDoctrine()->getManager();        
        $entitys = $em->getRepository('InmueblesBundle:Inmueble')->findAll();

    
		return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entitys[0]->getId())));
    }
    
    public function registroAction()
    {
    	$request = $this->get('request');
		$entity = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('registro'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Registrarse'));
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);
			$password = $encoder->encodePassword($entity->getPassword(), "");
			$entity->setContrasena($password);
			$entity->setCalificacion(0);
			$entity->setSalt("");
            
            $em->persist($entity);
            $em->flush();
            
            //ToDo: Colocar en la bolsa el mensaje sobre el registro

            return $this->redirect($this->generateUrl('inmuebles_homepage'));
        }

        return $this->render('InmueblesBundle:Default:registro.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));

    }

    public function loginAction()
    {
		$request = $this->getRequest();
		$session = $request->getSession();
		// get the login error if there is one
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(
				SecurityContext::AUTHENTICATION_ERROR
			);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}

        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('InmueblesBundle:Usuario')->findAll();

		return $this->render(
				'InmueblesBundle:Default:login.html.twig',
				array(
					// last username entered by the user
					'last_username' => $session->get(SecurityContext::LAST_USERNAME),
					'error'=> $error,
					'usuarios'=>$usuarios,
				)
			);
	}
}

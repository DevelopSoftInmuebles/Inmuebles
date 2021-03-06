<?php

namespace DevelopSoft\InmueblesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DevelopSoft\InmueblesBundle\Entity\Inmueble;
use DevelopSoft\InmueblesBundle\Form\InmuebleType;

/**
 * Inmueble controller.
 *
 * @Route("/inmueble")
 */
class InmuebleController extends Controller
{

    /**
     * Lists all Inmueble entities.
     *
     * @Route("/", name="inmueble")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
	    $user = $this->getUser();
		if (!isset($user)){
			$entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
			return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entities[0]->getId())));
		}

        $entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Inmueble entity.
     *
     * @Route("/", name="inmueble_create")
     * @Method("POST")
     * @Template("InmueblesBundle:Inmueble:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Inmueble();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('inmueble_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Inmueble entity.
    *
    * @param Inmueble $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Inmueble $entity)
    {
        $form = $this->createForm(new InmuebleType(), $entity, array(
            'action' => $this->generateUrl('inmueble_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Inmueble entity.
     *
     * @Route("/new", name="inmueble_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Inmueble();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Inmueble entity.
     *
     * @Route("/{id}", name="inmueble_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InmueblesBundle:Inmueble')->find($id);

        if (!$entity) {
			$entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
			$entity = $entities[0];
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Inmueble entity.
     *
     * @Route("/{id}/edit", name="inmueble_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
   	    $user = $this->getUser();
		if (!isset($user)){
			$entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
			return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entities[0]->getId())));
		}


        $entity = $em->getRepository('InmueblesBundle:Inmueble')->find($id);

        if (!$entity) {
			$entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
			return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entities[0]->getId())));
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Inmueble entity.
    *
    * @param Inmueble $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Inmueble $entity)
    {
        $form = $this->createForm(new InmuebleType(), $entity, array(
            'action' => $this->generateUrl('inmueble_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Inmueble entity.
     *
     * @Route("/{id}", name="inmueble_update")
     * @Method("PUT")
     * @Template("InmueblesBundle:Inmueble:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InmueblesBundle:Inmueble')->find($id);

        if (!$entity) {
        	$entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
			return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entities[0]->getId())));
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('inmueble_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Inmueble entity.
     *
     * @Route("/{id}", name="inmueble_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();        
   	    $user = $this->getUser();
		if (!isset($user)){
			$entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
			return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entities[0]->getId())));
		}

        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InmueblesBundle:Inmueble')->find($id);

            if (!$entity) {
                $entities = $em->getRepository('InmueblesBundle:Inmueble')->findAll();
				return $this->redirect($this->generateUrl('inmueble_show', array("id"=>$entities[0]->getId())));
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('inmueble'));
    }

    /**
     * Creates a form to delete a Inmueble entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inmueble_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

<?php

namespace DevelopSoft\InmueblesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InmueblesBundle:Default:index.html.twig', array());
    }
}

<?php

namespace Levi9\SonataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}", name="sonata_index")
     */
    public function indexAction($name)
    {
        return $this->render('Levi9SonataBundle:Default:index.html.twig', array('name' => $name));
    }
}

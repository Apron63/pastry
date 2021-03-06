<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        return $this->render('default/about.html.twig.');
    }

    /**
     * @Route("/order", name="order")
     */
    public function orderAction(Request $request)
    {
        return $this->render('default/order.html.twig.');
    }

    /**
     * @Route("/club", name="club")
     */
    public function clubAction(Request $request)
    {
        return $this->render('default/club.html.twig.');
    }
}

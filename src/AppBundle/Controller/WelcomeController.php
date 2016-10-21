<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/hello")
 */
class WelcomeController extends Controller
{
    /**
     * @Route("/world/")
     * @Method({"POST", "GET"})
     *
     * @return Response
     */
    public function helloWolrdAction()
    {
        return new Response('Hello World!');
    }

    /**
     * @Route("/{name}/")
     *
     * @param string $name
     *
     * @return Response
     */
    public function helloYouAction($name)
    {
        return new Response(sprintf('Hello %s', $name));
    }

    /**
     * @Route("/world/{name}/")
     *
     * @param string $name
     *
     * @return Response
     */
    public function helloTemplateAction($name)
    {
        return $this->render('AppBundle:Welcome:hello.html.twig', array('name' => $name));
    }
}

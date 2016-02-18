<?php

namespace LojaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LojaBundle\Entity\Genero;

/**
 * Genero controller.
 *
 * @Route("/genero")
 */
class GeneroController extends Controller
{
    /**
     * Lists all Genero entities.
     *
     * @Route("/", name="genero_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $generos = $em->getRepository('LojaBundle:Genero')->findAll();

        return $this->render('genero/index.html.twig', array(
            'generos' => $generos,
        ));
    }

    /**
     * Finds and displays a Genero entity.
     *
     * @Route("/{id}", name="genero_show")
     * @Method("GET")
     */
    public function showAction(Genero $genero)
    {

        return $this->render('genero/show.html.twig', array(
            'genero' => $genero,
        ));
    }
}

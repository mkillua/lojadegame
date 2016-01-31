<?php

namespace LojaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LojaBundle\Entity\Jogos;
use LojaBundle\Form\JogosType;

/**
 * Jogos controller.
 *
 * @Route("/jogos")
 */
class JogosController extends Controller
{
    /**
     * Lists all Jogos entities.
     *
     * @Route("/", name="lojadegames_jogos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jogos = $em->getRepository('LojaBundle:Jogos')->findAll();

        return $this->render('jogos/index.html.twig', array(
            'jogos' => $jogos,
        ));
    }

    /**
     * Creates a new Jogos entity.
     *
     * @Route("/new", name="lojadegames_jogos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $jogo = new Jogos();
       
        $form = $this->createForm('LojaBundle\Form\JogosType', $jogo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            var_dump($em);
            die();
            $em->persist($jogo);
            $em->flush();

            return $this->redirectToRoute('lojadegames_jogos_show', array('id' => $jogos->getId()));
        }

        return $this->render('jogos/new.html.twig', array(
            'jogo' => $jogo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jogos entity.
     *
     * @Route("/{id}", name="lojadegames_jogos_show")
     * @Method("GET")
     */
    public function showAction(Jogos $jogo)
    {
        $deleteForm = $this->createDeleteForm($jogo);

        return $this->render('jogos/show.html.twig', array(
            'jogo' => $jogo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Jogos entity.
     *
     * @Route("/{id}/edit", name="lojadegames_jogos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Jogos $jogo)
    {
        $deleteForm = $this->createDeleteForm($jogo);
        $editForm = $this->createForm('LojaBundle\Form\JogosType', $jogo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jogo);
            $em->flush();

            return $this->redirectToRoute('lojadegames_jogos_edit', array('id' => $jogo->getId()));
        }

        return $this->render('jogos/edit.html.twig', array(
            'jogo' => $jogo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Jogos entity.
     *
     * @Route("/{id}", name="lojadegames_jogos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Jogos $jogo)
    {
        $form = $this->createDeleteForm($jogo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jogo);
            $em->flush();
        }

        return $this->redirectToRoute('lojadegames_jogos_index');
    }

    /**
     * Creates a form to delete a Jogos entity.
     *
     * @param Jogos $jogo The Jogos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jogos $jogo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lojadegames_jogos_delete', array('id' => $jogo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

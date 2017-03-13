<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ordering;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ordering controller.
 *
 * @Route("ordering")
 */
class OrderingController extends Controller
{
    /**
     * Lists all ordering entities.
     *
     * @Route("/", name="ordering_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orderings = $em->getRepository('AppBundle:Ordering')->findAll();

        return $this->render('ordering/index.html.twig', array(
            'orderings' => $orderings,
        ));
    }

    /**
     * Creates a new ordering entity.
     *
     * @Route("/new", name="ordering_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ordering = new Ordering();
        $form = $this->createForm('AppBundle\Form\OrderingType', $ordering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ordering);
            $em->flush($ordering);

            return $this->redirectToRoute('ordering_show', array('id' => $ordering->getId()));
        }

        return $this->render('ordering/form.html.twig', [
            'ordering' => $ordering,
            'form' => $form->createView(),
            'title' => 'Новый заказ',
        ]);
    }

    /**
     * Finds and displays a ordering entity.
     *
     * @Route("/{id}", name="ordering_show")
     * @Method("GET")
     */
    public function showAction(Ordering $ordering)
    {
        $deleteForm = $this->createDeleteForm($ordering);

        return $this->render('ordering/show.html.twig', array(
            'ordering' => $ordering,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ordering entity.
     *
     * @Route("/{id}/edit", name="ordering_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ordering $ordering)
    {
        $deleteForm = $this->createDeleteForm($ordering);
        $editForm = $this->createForm('AppBundle\Form\OrderingType', $ordering);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordering_edit', array('id' => $ordering->getId()));
        }

        return $this->render('ordering/edit.html.twig', array(
            'ordering' => $ordering,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ordering entity.
     *
     * @Route("/{id}", name="ordering_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ordering $ordering)
    {
        $form = $this->createDeleteForm($ordering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ordering);
            $em->flush();
        }

        return $this->redirectToRoute('ordering_index');
    }

    /**
     * Creates a form to delete a ordering entity.
     *
     * @param Ordering $ordering The ordering entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ordering $ordering)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ordering_delete', array('id' => $ordering->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

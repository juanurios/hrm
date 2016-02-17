<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Curriculum;
use AppBundle\Form\CurriculumType;

/**
 * Curriculum controller.
 *
 * @Route("/curriculum")
 */
class CurriculumController extends Controller
{
    /**
     * Lists all Curriculum entities.
     *
     * @Route("/", name="curriculum_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $curricula = $em->getRepository('AppBundle:Curriculum')->findAll();

        return $this->render('AppBundle:Curriculum:index.html.twig', array(
            'curricula' => $curricula,
        ));
    }

    /**
     * Creates a new Curriculum entity.
     *
     * @Route("/new", name="curriculum_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $curriculum = new Curriculum();
        $form = $this->createForm('AppBundle\Form\CurriculumType', $curriculum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->get('app.curriculumManager')->createCurriculum($curriculum);

            return $this->redirectToRoute('curriculum_show', array('id' => $curriculum->getId()));
        }

        return $this->render('AppBundle:Curriculum:new.html.twig', array(
            'curriculum' => $curriculum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Curriculum entity.
     *
     * @Route("/{id}", name="curriculum_show")
     * @Method("GET")
     */
    public function showAction(Curriculum $curriculum)
    {
        $deleteForm = $this->createDeleteForm($curriculum);

        return $this->render('AppBundle:Curriculum:show.html.twig', array(
            'curriculum' => $curriculum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Curriculum entity.
     *
     * @Route("/{id}/edit", name="curriculum_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Curriculum $curriculum)
    {
        $deleteForm = $this->createDeleteForm($curriculum);
        $editForm = $this->createForm('AppBundle\Form\CurriculumType', $curriculum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->get('app.curriculumManager')->createCurriculum($curriculum);

            return $this->redirectToRoute('curriculum_edit', array('id' => $curriculum->getId()));
        }

        return $this->render('AppBundle:Curriculum:edit.html.twig', array(
            'curriculum' => $curriculum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Curriculum entity.
     *
     * @Route("/{id}", name="curriculum_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Curriculum $curriculum)
    {
        $form = $this->createDeleteForm($curriculum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->get('app.curriculumManager')->deleteCurriculum($curriculum);
        }

        return $this->redirectToRoute('curriculum_index');
    }

    /**
     * Creates a form to delete a Curriculum entity.
     *
     * @param Curriculum $curriculum The Curriculum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Curriculum $curriculum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('curriculum_delete', array('id' => $curriculum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

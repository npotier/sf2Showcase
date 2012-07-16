<?php

namespace ACSEO\Bundle\PHPUnitShowcaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACSEO\Bundle\PHPUnitShowcaseBundle\Entity\Humain;
use ACSEO\Bundle\PHPUnitShowcaseBundle\Form\HumainType;

/**
 * Humain controller.
 *
 * @Route("/admin/humain")
 */
class HumainController extends Controller
{
    /**
     * Lists all Humain entities.
     *
     * @Route("/", name="admin_humain")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ACSEOPHPUnitShowcaseBundle:Humain')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Humain entity.
     *
     * @Route("/{id}/show", name="admin_humain_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACSEOPHPUnitShowcaseBundle:Humain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Humain entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Humain entity.
     *
     * @Route("/new", name="admin_humain_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Humain();
        $form   = $this->createForm(new HumainType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Humain entity.
     *
     * @Route("/create", name="admin_humain_create")
     * @Method("post")
     * @Template("ACSEOPHPUnitShowcaseBundle:Humain:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Humain();
        $request = $this->getRequest();
        $form    = $this->createForm(new HumainType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_humain_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Humain entity.
     *
     * @Route("/{id}/edit", name="admin_humain_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACSEOPHPUnitShowcaseBundle:Humain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Humain entity.');
        }

        $editForm = $this->createForm(new HumainType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Humain entity.
     *
     * @Route("/{id}/update", name="admin_humain_update")
     * @Method("post")
     * @Template("ACSEOPHPUnitShowcaseBundle:Humain:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACSEOPHPUnitShowcaseBundle:Humain')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Humain entity.');
        }

        $editForm   = $this->createForm(new HumainType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_humain_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Humain entity.
     *
     * @Route("/{id}/delete", name="admin_humain_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ACSEOPHPUnitShowcaseBundle:Humain')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Humain entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_humain'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

<?php

namespace CPM\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CPM\BaseBundle\Entity\Documento;
use CPM\BaseBundle\Form\DocumentoType;

/**
 * Document controller.
 *
 * @Route("/documento")
 */
class DocumentoController extends Controller
{
    /**
     * Lists all Document entities.
     *
     * @Route("/", name="documento")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CPMBaseBundle:Document')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Document entity.
     *
     * @Route("/{id}/show", name="document_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Document entity.
     *
     * @Route("/new", name="document_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Document();
        $form   = $this->createForm(new DocumentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Document entity.
     *
     * @Route("/create", name="document_create")
     * @Method("POST")
     * @Template("CPMBaseBundle:Document:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Document();
        $form = $this->createForm(new DocumentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setPath('test.csv');
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('document_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Document entity.
     *
     * @Route("/{id}/edit", name="document_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $editForm = $this->createForm(new DocumentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Document entity.
     *
     * @Route("/{id}/update", name="document_update")
     * @Method("POST")
     * @Template("CPMBaseBundle:Document:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DocumentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('document_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Document entity.
     *
     * @Route("/{id}/delete", name="document_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CPMBaseBundle:Documento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Document entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('document'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

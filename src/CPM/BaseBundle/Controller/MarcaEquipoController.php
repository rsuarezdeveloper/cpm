<?php

namespace CPM\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CPM\BaseBundle\Entity\MarcaEquipo;
use CPM\BaseBundle\Form\MarcaEquipoType;

/**
 * MarcaEquipo controller.
 *
 * @Route("/marcaequipo")
 */
class MarcaEquipoController extends Controller
{

    /**
     * Lists all MarcaEquipo entities.
     *
     * @Route("/", name="marcaequipo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CPMBaseBundle:MarcaEquipo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MarcaEquipo entity.
     *
     * @Route("/", name="marcaequipo_create")
     * @Method("POST")
     * @Template("CPMBaseBundle:MarcaEquipo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MarcaEquipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('marcaequipo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a MarcaEquipo entity.
    *
    * @param MarcaEquipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(MarcaEquipo $entity)
    {
        $form = $this->createForm(new MarcaEquipoType(), $entity, array(
            'action' => $this->generateUrl('marcaequipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MarcaEquipo entity.
     *
     * @Route("/new", name="marcaequipo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MarcaEquipo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MarcaEquipo entity.
     *
     * @Route("/{id}", name="marcaequipo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:MarcaEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MarcaEquipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MarcaEquipo entity.
     *
     * @Route("/{id}/edit", name="marcaequipo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:MarcaEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MarcaEquipo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a MarcaEquipo entity.
    *
    * @param MarcaEquipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MarcaEquipo $entity)
    {
        $form = $this->createForm(new MarcaEquipoType(), $entity, array(
            'action' => $this->generateUrl('marcaequipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MarcaEquipo entity.
     *
     * @Route("/{id}", name="marcaequipo_update")
     * @Method("PUT")
     * @Template("CPMBaseBundle:MarcaEquipo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:MarcaEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MarcaEquipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('marcaequipo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MarcaEquipo entity.
     *
     * @Route("/{id}", name="marcaequipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CPMBaseBundle:MarcaEquipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MarcaEquipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('marcaequipo'));
    }

    /**
     * Creates a form to delete a MarcaEquipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marcaequipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

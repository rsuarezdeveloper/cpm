<?php

namespace CPM\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CPM\BaseBundle\Entity\ModeloEquipo;
use CPM\BaseBundle\Form\ModeloEquipoType;

/**
 * ModeloEquipo controller.
 *
 * @Route("/modeloequipo")
 */
class ModeloEquipoController extends Controller
{

    /**
     * Lists all ModeloEquipo entities.
     *
     * @Route("/", name="modeloequipo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CPMBaseBundle:ModeloEquipo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ModeloEquipo entity.
     *
     * @Route("/", name="modeloequipo_create")
     * @Method("POST")
     * @Template("CPMBaseBundle:ModeloEquipo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ModeloEquipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('modeloequipo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ModeloEquipo entity.
    *
    * @param ModeloEquipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ModeloEquipo $entity)
    {
        $form = $this->createForm(new ModeloEquipoType(), $entity, array(
            'action' => $this->generateUrl('modeloequipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ModeloEquipo entity.
     *
     * @Route("/new", name="modeloequipo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ModeloEquipo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ModeloEquipo entity.
     *
     * @Route("/{id}", name="modeloequipo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:ModeloEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ModeloEquipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ModeloEquipo entity.
     *
     * @Route("/{id}/edit", name="modeloequipo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:ModeloEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ModeloEquipo entity.');
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
    * Creates a form to edit a ModeloEquipo entity.
    *
    * @param ModeloEquipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ModeloEquipo $entity)
    {
        $form = $this->createForm(new ModeloEquipoType(), $entity, array(
            'action' => $this->generateUrl('modeloequipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar','attr'=>array('class'=>"btn btn-mini btn-primary")));

        return $form;
    }
    /**
     * Edits an existing ModeloEquipo entity.
     *
     * @Route("/{id}", name="modeloequipo_update")
     * @Method("PUT")
     * @Template("CPMBaseBundle:ModeloEquipo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:ModeloEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ModeloEquipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('modeloequipo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ModeloEquipo entity.
     *
     * @Route("/{id}", name="modeloequipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CPMBaseBundle:ModeloEquipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ModeloEquipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('modeloequipo'));
    }

    /**
     * Creates a form to delete a ModeloEquipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modeloequipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

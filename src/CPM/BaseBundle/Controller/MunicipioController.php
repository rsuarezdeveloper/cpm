<?php

namespace CPM\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CPM\BaseBundle\Entity\Municipio;
use CPM\BaseBundle\Form\MunicipioType;

/**
 * Municipio controller.
 *
 * @Route("/municipio")
 */
class MunicipioController extends Controller
{

    /**
     * Lists all Municipio entities.
     *
     * @Route("/", name="municipio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CPMBaseBundle:Municipio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Municipio entity.
     *
     * @Route("/", name="municipio_create")
     * @Method("POST")
     * @Template("CPMBaseBundle:Municipio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Municipio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('municipio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Municipio entity.
    *
    * @param Municipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Municipio $entity)
    {
        $form = $this->createForm(new MunicipioType(), $entity, array(
            'action' => $this->generateUrl('municipio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Municipio entity.
     *
     * @Route("/new", name="municipio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Municipio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Municipio entity.
     *
     * @Route("/{id}", name="municipio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:Municipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Municipio entity.
     *
     * @Route("/{id}/edit", name="municipio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:Municipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipio entity.');
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
    * Creates a form to edit a Municipio entity.
    *
    * @param Municipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Municipio $entity)
    {
        $form = $this->createForm(new MunicipioType(), $entity, array(
            'action' => $this->generateUrl('municipio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Municipio entity.
     *
     * @Route("/{id}", name="municipio_update")
     * @Method("PUT")
     * @Template("CPMBaseBundle:Municipio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CPMBaseBundle:Municipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('municipio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Municipio entity.
     *
     * @Route("/{id}", name="municipio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CPMBaseBundle:Municipio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Municipio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('municipio'));
    }

    /**
     * Creates a form to delete a Municipio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('municipio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

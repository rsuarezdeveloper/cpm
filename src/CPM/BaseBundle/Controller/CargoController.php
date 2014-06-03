<?php

namespace CPM\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CPM\BaseBundle\Entity\Cargo;

/**
 * Cargo controller.
 *
 * @Route("/cargo")
 */
class CargoController extends Controller
{	
	/**
	 * Show Grid
	 *
     * @Route("/", name="cargo")
     * @Template()
	 */
	public function indexAction()
	{

		return $this->render('CPMBaseBundle:Cargo:index.html.twig');
	}
	/**
	 * create a new Cargo entity.
	 *
	 * @Route("/create", name="cargo_create")
	 * @Template()
	 */
	public function createAction()
	{
		$filterArray = array();
								$form = $this->getRequest()->request->get('form');
		
	    $em = $this->getDoctrine()->getEntityManager();
	
	    $entity  = new Cargo();
	
		
		

		$entity->setDescripcion('');

		if($form)$entity->fromArray(json_decode($form));
	    $em->persist($entity);
	    $em->flush();

    
	    return new Response(1);
	}

	/**
	 * return a json formatted list of Cargo entities.
	 *
	 * @Route("/read", name="cargo_read")
	 * @Template()
	 */
	public function readAction()
	{
		$filterArray = array();
		$return_array = array();
	    $start = $this->getRequest()->query->get('start');
	
								
	    $em = $this->getDoctrine()->getEntityManager();
		
			    $entities = $em->getRepository('CPMBaseBundle:Cargo')->findBy(
		$filterArray,    
		array('id' => 'DESC'),
		25,
		$start
		);
				
		foreach($entities as $entity){
			$return_array[] = $entity->toArray();
		}
		if(!isset($return_array))$return_array = array();

		$returnObject['items'] = $return_array;
				
		$query = $em->createQuery('SELECT COUNT(e.id) FROM CPMBaseBundle:Cargo e');
		$returnObject['count'] = $query->getSingleScalarResult();
		
	    return new Response(json_encode($returnObject));
	}
	/**
	 * Edits an existing Cargo entity.
	 *
	 * @Route("/update", name="cargo_update")
	 * @Method("post")
	 */
	public function updateAction()
	{

	    $data = $this->getRequest()->request->get('data'); 

		$entities = json_decode($data);

		$em = $this->getDoctrine()->getEntityManager();
	
		foreach($entities as $data_entity){
		 
			$entity = $em->getRepository('CPMBaseBundle:Cargo')->find($data_entity->id);
			
			$filterArray = array();
			
			
	        if ($entity) {
																
				
				unset($data_entity->id);
				$entity->fromArray($data_entity);
	
	
				
																
								$em->persist($entity);
				
	        }
			
		    $em->flush();
		
					}
	
	
	    return new Response(1);
	}
	/**
	 * Deletes a Cargo entity.
	 *
	 * @Route("/{id}/destroy", name="cargo_destroy")
	 * @Method("get")
	 */
	public function destroyAction($id)
	{
		$filterArray = array();
		
	    $em = $this->getDoctrine()->getEntityManager();
	    $entity = $em->getRepository('CPMBaseBundle:Cargo')->find($id);

	    if (!$entity) {
	        return new Response(0);
	    }
		
								
		
	    $em->remove($entity);
		
		$em->flush();
			
	    return new Response(1);
	}	/**
	 * return a json formatted list of Cargo entities for combobox.
	 *
	 * @Route("/listCargo_idcombo", name="cargo_listCargocombo")
	 * @Template()
	 */
	public function listCargoIdcomboAction()
	{
		
	    $start = $this->getRequest()->query->get('start');
	
	    $em = $this->getDoctrine()->getEntityManager();
		
	    $entities = $em->getRepository('CPMBaseBundle:Cargo')->findBy(
		array()
		);
		
		$return_array[] = array('id' => '','name' => 'all');
		foreach($entities as $entity){
			$return_array[] = array('id' => $entity->getId(),'name' => $entity->getName());
		}
				
	    return new Response(json_encode($return_array));
	}
}
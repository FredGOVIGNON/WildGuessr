<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{
	public function showAction($id)
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$place=$em->getRepository('PlaceBundle:Place')->findOneById($id);
		return $this->render('UserBundle:Default:place.html.twig', array(
			'place'=>$place,
			'user'=>$user
			));
	}
}
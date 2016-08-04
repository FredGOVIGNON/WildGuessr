<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller
{
	public function showAction()
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		return $this->render('UserBundle:Default:map.html.twig');
	}
}
<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PlaceBundle\Entity\Place;
use PlaceBundle\Entity\Checkpoint;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class PlaceController extends Controller
{
	public function showAction($id)
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$place=$em->getRepository('PlaceBundle:Place')->findOneById($id);
		$checkpoint=$em->getRepository('PlaceBundle:Checkpoint')->findOneBy(array('iduser'=>$user->getId(), 'idplace'=>$place->getId()));
		if(empty($checkpoint))
		{
			$checkpoint = new Checkpoint();
			$checkpoint -> setIdplace($place->getId());
			$checkpoint -> setIduser($user->getId());
			$checkpoint -> setIsonit(true);
			$checkpoint -> setIsnamed(false);
			$checkpoint -> setScored(1);
			$em->persist($checkpoint);
			$em->flush();
		}
		else
		{
			$checkpoint->setIsonit(true);
			$em->persist($checkpoint);
			$em->flush();
		}
		return $this->render('UserBundle:Default:place.html.twig', array(
			'place'=>$place,
			'user'=>$user,
			'checkpoint'=>$checkpoint,
			));
	}
	public function checkNameAction(Request $request, $id)
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$testname=$request->request->get('placename');

		$place=$em->getRepository('PlaceBundle:Place')->findOneById($id);
		$checkpoint=$em->getRepository('PlaceBundle:Checkpoint')->findOneBy(array('iduser'=>$user->getId(), 'idplace'=>$place->getId()));

		if($testname == $place->getName())
		{
			$checkpoint->setIsnamed(true);
			$em->persist($checkpoint);
			$em->flush();
		}
		$url = $this -> generateUrl('place_informations', array('id'=>$id));
        $response = new RedirectResponse($url);
        return $response;
	}
}
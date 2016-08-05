<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;

class ProfileController extends Controller
{
	public function showAction()
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$datauser=$em->getRepository('UserBundle:DataUser')->findOneByIduser($user->getId());
		$team=$em->getRepository('UserBundle:Team')->findOneById($datauser->getIdteam())->getName();
		return $this->render('UserBundle:Default:profile.html.twig', array('user'=>$user, 'team'=>$team, 'datauser'=>$datauser));
	}
}
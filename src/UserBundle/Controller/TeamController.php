<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use UserBundle\Entity\Team;
use UserBundle\Entity\DataUser;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TeamController extends Controller
{
	public function showAction()
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$scoretotal=0;
		$datauser=$em->getRepository('UserBundle:DataUser')->findOneByIduser($user->getId());
		$team=$em->getRepository('UserBundle:Team')->findOneById($datauser->getIdteam());
		if(empty($team))
		{
			$team=0; 
		}
		else
		{
			$teammates=$em->getRepository('UserBundle:DataUser')->findByIdteam($team->getId());
			foreach ($teammates as $teammate)
			{
				$scoretotal=$scoretotal+($teammate->getScoreuser());
			}
			$team->setScore($scoretotal);
			$em->persist($team);
			$em->flush();
		}
		return $this->render('UserBundle:Default:team.html.twig', array('user'=>$user,'team'=>$team));
	}
	public function classementAction()
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$teams = $em->getRepository('UserBundle:Team')->findAll('all',array('score'=>'desc'));
		return $this->render('UserBundle:Default:classement.html.twig', array('user'=>$user, 'teams'=>$teams ));
	}
	public function newAction(Request $request)
	{
		$em=$this->getDoctrine()->getManager();
		$user=$this->getUser();
		$datauser=$em->getRepository('UserBundle:DataUser')->findOneByIduser($user->getId());
		$newteam = $request->request->get("newteam");
		$oldteam = $em->getRepository('UserBundle:Team')->findOneById($datauser->getIdteam());
		$oldscore = $oldteam->getScore();
		if(!empty($newteam))
		{
			$addteam = new Team();
			$addteam->setName($newteam);
			$addteam->setScore(0);

			$em->persist($addteam);
			$em->flush();

			$datauser->setIdteam($addteam->getId());

			$em->persist($datauser);
			$em->flush();
			$oldteam->setScore($oldscore-$datauser->getScoreuser());
		}
		$url = $this -> generateUrl('team');
        $response = new RedirectResponse($url);
        return $response;

	}
}
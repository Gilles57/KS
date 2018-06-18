<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectsController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $projects = ['TDM', 'Bidon', 'Test','Autre']    ;

        
        
//        $project = new \AppBundle\Entity\Project();
//        $project
//                ->setName('Test')
//                ->setDescription('Projet de test')
//                ->setTargetAmount(7890);
//        
//        $em->persist($project);
//        $em->flush();

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('\AppBundle\Entity\Project');
        $projects = $rep->findAll();
        
        return $this->render('projects/index.html.twig', 
        ['projects'=>$projects]);
    }
}

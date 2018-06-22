<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectsController extends Controller
{
    /**
     * @Route("/projets", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Project::class);
        $projects = $rep->findBy([],['name'=>'ASC']);
        
        return $this->render('projects/index.html.twig', 
            compact('projects'));
    }
    
    /**
     * @Route("/projets/{name}", name="projet")
     */
    public function showAction(Project $project)
    {
        return $this->render('projects/show.html.twig', compact('project'));
    }
}
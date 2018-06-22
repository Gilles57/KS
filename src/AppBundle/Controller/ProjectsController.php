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
     * @Route("/projets/{id}", name="projet",requirements = {   "id" : "[0-9]+"} )
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Project::class);
        $project = $rep->find($id);
        
        if(!$project){
            throw $this->createNotFoundException("Pas de projet avec ce numéro");
        }
        return $this->render('projects/show.html.twig', compact('project'));
    }
}
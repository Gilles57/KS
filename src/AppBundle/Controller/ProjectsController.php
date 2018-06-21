<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Service\MarkdownTransformer;
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
       

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Project::class);
        $projects = $rep->findBy([],['name'=>'ASC']);
        
        return $this->render('projects/index.html.twig', 
            compact('projects'));
    }
}

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
        $sMD = '**Ceci** est du *Markdown*';
        
        $sMD = $this->get('app.markdown_transformer')->parse($sMD);
        

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('\AppBundle\Entity\Project');
        $projects = $rep->findAll();
        
        return $this->render('projects/index.html.twig', 
            compact('projects','sMD'));
    }
}

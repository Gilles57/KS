<?php

namespace AppBundle\Twig;

use Symfony\Component\Config\Definition\Exception\Exception;
use Twig_Extension;
use Twig_SimpleFunction;
use AppBundle\Entity\Project;


class AppExtension extends Twig_Extension
{
   
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('pluralize', [$this, 'pluralize']),
            new Twig_SimpleFunction('format_price', [$this, 'formatPrice']),
        ];
    }
    
    public function formatPrice(Project $project) {
        if ($project->getTargetAmount()==0){
            return 'Gratuit' ;
        } else {
            return twig_localized_currency_filter($project->getTargetAmount(), "EUR", "en");
        }
    }
    
    
    public function pluralize($nb, $singulier, $pluriel=null) {
        if(! is_numeric($nb)){
            throw new Exception('$nb doit être un entier');
        } else {
            if($nb<2){
                $str = $singulier;
            } else {
                if(is_null($pluriel)){
                    $str = $singulier."s";
                } else{
                    $str = $pluriel;
                }
            }
        }
        return sprintf("%d %s", $nb ,$str);
    }
}
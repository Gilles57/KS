<?php

namespace AppBundle\Twig;

use AppBundle\Entity\Project;
use DateTime;
use Symfony\Component\Config\Definition\Exception\Exception;
use Twig_Extension;
use Twig_SimpleFunction;


class AppExtension extends Twig_Extension
{
   
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('pluralize', [$this, 'pluralize']),
            new Twig_SimpleFunction('format_price', [$this, 'formatPrice'], ['is_safe'=>['html']]),
            new Twig_SimpleFunction('format_date', [$this, 'formatDate']),
        ];
    }
    
    public function formatPrice(Project $project) {
        if ($project->isFree()){
            return '<strong>Gratuit</strong>' ;
        } else {
            return twig_localized_currency_filter($project->getTargetAmount(), "EUR", "en");
        }
    }
    
    public function formatDate(Project $project) {
        if ($project->getExpiredOn()==null){
            return 'N.C.' ;
        } 
        if ($project->getExpiredOn()>=new DateTime()){
            return  'Arrivé à expiration';
        }
        return $project->getExpiredOn()->diff(new DateTime())->format('%a jours restants') ;
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
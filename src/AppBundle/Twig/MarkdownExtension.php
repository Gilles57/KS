<?php

namespace AppBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use AppBundle\Service\MarkdownTransformer;


class MarkdownExtension extends AbstractExtension
{
    private $markdownTransformer;
    
    public function __construct(MarkdownTransformer $markdownTransformer) {
        $this->markdownTransformer = $markdownTransformer;
    }

    public function getFilters()
    {
        return
            [new TwigFilter('markdownify', 
            [$this, 'parseMarkdown'],
            ['is_safe'=>['html']])]
        ;
    }

    public function parseMarkdown($str)
    {
        return $this->markdownTransformer->parse($str);
    }
}
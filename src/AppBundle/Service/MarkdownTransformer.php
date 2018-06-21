<?php

namespace AppBundle\Service;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class MarkdownTransformer {

    private $markdownParser;
    private $cache;

    public function __construct(MarkdownParserInterface $markdownParser, $cache) {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
    }

    public function parse($content) {
        $key = md5($content);

        if ($this->cache->contains($key)) {
            return $this->cache->fetch($key);
        }
//        sleep(1);
        $content = $this->markdownParser->transform($content);
        $this->cache->save($key, $content);
        return $content;
    }

}

<?php

namespace Bundle\MarkdownBundle\Twig\Extension;

use Bundle\MarkdownBundle\Helper\MarkdownHelper;
use Bundle\MarkdownBundle\Twig\TokenParser\Markdown as MarkdownTokenParser;

class MarkdownTwigExtension extends \Twig_Extension
{
    protected $helper;

    function __construct(MarkdownHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getTokenParsers()
    {
        return array(
            new MarkdownTokenParser(),
        );
    }

    public function getFilters()
    {
        return array(
            'markdown' => new \Twig_Filter_Method($this, 'markdown'),
        );
    }

    public function markdown($txt)
    {
        return $this->helper->transform($txt);
    }

    public function getName()
    {
        return 'markdown';
    }
}

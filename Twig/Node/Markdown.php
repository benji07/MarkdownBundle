<?php

namespace Bundle\MarkdownBundle\Twig\Node;

/**
 * Represents a markdown node.
 *
 * @package    twig
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class Markdown extends \Twig_Node
{
    public function __construct(\Twig_NodeInterface $body, $lineno, $tag = null)
    {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler A Twig_Compiler instance
     */
    public function compile($compiler)
    {
        $compiler->addDebugInfo($this);

        $compiler
            ->write("ob_start(array(\$context['_view']['markdown'], 'transform'));\n")
            ->subcompile($this->getNode('body'))
            ->write("ob_end_flush();\n")
        ;
    }

}

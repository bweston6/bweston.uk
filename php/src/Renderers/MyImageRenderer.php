<?php

namespace App\Renderers;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use League\CommonMark\Extension\CommonMark\Renderer\Inline\ImageRenderer;
use League\CommonMark\Node\Inline\Newline;
use League\CommonMark\Node\Node;
use League\CommonMark\Node\NodeIterator;
use League\CommonMark\Node\StringContainerInterface;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class MyImageRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): HtmlElement
    {
        if (!$node instanceof Image) {
            return null;
        }

        $attrs = $node->data->get('attributes');
        $attrs['src'] = $node->getUrl();
        $attrs['alt'] = $this->getAltText($node);
        $attrs['loading'] = 'lazy';

        if (($title = $node->getTitle()) !== null) {
            $attrs['title'] = $title;
        }

        $path = PUBLIC_DIR . $attrs['src'];
        [$width, $height] = getimagesize($path);

        if ($width && $height) {
            $attrs['style'] = "aspect-ratio: $width / $height";
            if ($height >= $width) {
                $attrs['class'] = 'width-50';
            }
        }

        return new HtmlElement('img', $attrs, '', true);
    }

    private function getAltText(Image $node): string
    {
        $altText = '';

        foreach ((new NodeIterator($node)) as $n) {
            if ($n instanceof StringContainerInterface) {
                $altText .= $n->getLiteral();
            } elseif ($n instanceof Newline) {
                $altText .= "\n";
            }
        }

        return $altText;
    }
}

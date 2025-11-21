<?php

namespace App\Models;

use App\Renderers\MyImageRenderer;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use League\CommonMark\Extension\DescriptionList\DescriptionListExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;
use League\CommonMark\MarkdownConverter;
use TuchSoft\CommonMarkHeadingShifter\HeadingShifterExtension;

class PostModel
{
    public static function getPosts(): array
    {
        $markdownConfig = [
          'heading_shifter' => [
            'shift_by' => 1
          ]
        ];

        $environment = new Environment($markdownConfig);
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new DescriptionListExtension());
        $environment->addExtension(new FrontMatterExtension());
        $environment->addExtension(new HeadingShifterExtension());

        $environment->addRenderer(Image::class, new MyImageRenderer());

        $converter = new MarkdownConverter($environment);

        $posts = [];

        $post_files = glob(BASEPATH . '/Posts/*.md');
        foreach ($post_files as $post_file) {
            $result = $converter->convert(file_get_contents($post_file));

            $post = [
                "slug" => basename($post_file, ".md"),
                "result" => $result
            ];

            if ($result instanceof RenderedContentWithFrontMatter) {
                $post["front_matter"] = $result->getFrontMatter();
            }

            $posts[] = $post;
        }

        return $posts;
    }

    public static function getPost($slug): array
    {
        $markdownConfig = [
          'heading_shifter' => [
            'shift_by' => 1
          ]
        ];

        $environment = new Environment($markdownConfig);
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new DescriptionListExtension());
        $environment->addExtension(new FrontMatterExtension());
        $environment->addExtension(new HeadingShifterExtension());

        $environment->addRenderer(Image::class, new MyImageRenderer());

        $converter = new MarkdownConverter($environment);

        $post_file_contents = file_get_contents(BASEPATH . "/Posts/$slug.md");
        if (!$post_file_contents) {
            http_response_code(404);
            echo "404 Not Found";
            die();
        }

        $result = $converter->convert($post_file_contents);

        $post = ["result" => $result];
        if ($result instanceof RenderedContentWithFrontMatter) {
            $post["front_matter"] = $result->getFrontMatter();
        }

        return $post;
    }
}

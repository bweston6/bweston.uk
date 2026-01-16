<?php

namespace App\Controllers;

use App\Controller;
use App\Models\PostModel;

class RssController extends Controller
{
    public function show(): string
    {
        $posts = PostModel::getPosts();
        header('Content-Type: application/xml');
        return $this->render('rss', ["posts" => $posts]);
    }
}

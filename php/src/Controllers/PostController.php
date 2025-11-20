<?php

namespace App\Controllers;

use App\Controller;
use App\Models\PostModel;

class PostController extends Controller
{
    public function show(array $params): string
    {
        $post = PostModel::getPost($params["slug"]);
        return $this->render('post', ["post" => $post]);
    }
}

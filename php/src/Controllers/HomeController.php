<?php

namespace App\Controllers;

use App\Controller;
use App\Models\PostModel;

class HomeController extends Controller
{
    public function index(): string
    {
        $posts = PostModel::getPosts();
        return $this->render('index', ["posts" => $posts]);
    }
}

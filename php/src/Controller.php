<?php
declare(strict_types = 1);

namespace App;

class Controller
{
    protected function render(string $view, array $data = []):void
    {
        extract($data);

        include "Views/$view.php";
    }
}

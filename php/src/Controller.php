<?php

declare(strict_types=1);

namespace App;

class Controller
{
    protected function render(string $view, array $data = []): string
    {
        extract($data);

        ob_start();
        include "Views/$view.php";
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}

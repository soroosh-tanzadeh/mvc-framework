<?php

namespace App\Core\Template;

use Twig\Environment as TwingEnvironment;
use Twig\Loader\FilesystemLoader;

class TemplateEngine
{
    private TwingEnvironment $twig;

    public function __construct()
    {
        $this->twig =  new TwingEnvironment(new FilesystemLoader(BASEPATH . "/views"), [
            'cache' => filter_var($_ENV["TEMPLATE_CACHE"], FILTER_VALIDATE_BOOLEAN) ? BASEPATH . "/storage/cache" : false,
        ]);
    }

    public function render(string $template, array $data = [])
    {
        return $this->twig->render("$template.twig.html", $data);
    }
}

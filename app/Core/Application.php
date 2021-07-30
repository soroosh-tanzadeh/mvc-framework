<?php

namespace App\Core;

use Dotenv\Dotenv;
use App\Core\TemplateEngine;


class Application
{
    public Router $router;
    public Request $request;
    public TemplateEngine $templateEngine;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->templateEngine = new TemplateEngine();
    }

    public function view(string $view, array $data)
    {
        return $this->templateEngine->render($view, $data);
    }

    public function run()
    {
        $this->router->resolve();
    }
}

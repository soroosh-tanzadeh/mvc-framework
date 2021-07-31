<?php

namespace App\Core;

use Dotenv\Dotenv;
use App\Core\TemplateEngine;


class Application
{
    public Router $router;
    public Request $request;
    public TemplateEngine $templateEngine;

    public static Application $app;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->templateEngine = new TemplateEngine();

        Application::$app = $this;
    }

    public function view(string $view, array $data): string
    {
        return $this->templateEngine->render($view, $data);
    }

    public function run()
    {
        $this->router->resolve();
    }
}

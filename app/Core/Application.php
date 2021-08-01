<?php

namespace App\Core;

use App\Core\Database\DBBoot;
use App\Core\Database\QueryBuilder\Query;
use App\Core\Http\Request;
use App\Core\Http\Router;
use App\Core\Template\TemplateEngine;
use Dotenv\Dotenv;


class Application
{
    public Router $router;
    public Request $request;
    public TemplateEngine $templateEngine;


    private Query $queryBuilder;

    public static Application $app;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->templateEngine = new TemplateEngine();

        $this->queryBuilder = (new DBBoot())->boot();

        session_start();
        Application::$app = $this;
    }

    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    public function view(string $view, array $data): string
    {
        return $this->templateEngine->render($view, $data);
    }

    public function run()
    {
        $this->router->resolve();
        $this->queryBuilder->close();
    }
}

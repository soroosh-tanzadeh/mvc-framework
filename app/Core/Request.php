<?php

namespace App\Core;

class Request
{
    private array $body;


    public function __construct()
    {
        $this->body = $this->getBody();
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        $position = strpos($path, "?");
        if ($position) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function getBody(): array
    {
        $body = [];
        if ($this->getMethod() == "get") {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() == "post") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    public function get(string $key)
    {
        return $this->body[$key] ?? null;
    }

    public function has(string $key)
    {
        return isset($this->body[$key]);
    }
}

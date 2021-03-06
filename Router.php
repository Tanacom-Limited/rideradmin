<?php

class Router
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($route, $file)
    {

        $uri = trim($this->request, "/");

        $uri = explode("/", $uri);

        require $file . '.php';

        if ($uri[0] == trim($route, "/")) {
            array_shift($uri);
            require $file . '.php';

        }

    }

}
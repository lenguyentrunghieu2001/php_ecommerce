<?php

class Controller
{
    protected $render = [];
    protected $middleware;

    public function __construct()
    {
        $this->render = new Render();
        $this->middleware = new Middleware();
    }
}

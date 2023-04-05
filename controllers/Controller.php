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

    public function menu($categorymodel)
    {
        return $categorymodel->category('tbl_category_product');
    }
}

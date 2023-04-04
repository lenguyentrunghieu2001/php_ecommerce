<?php

class HomeController extends Controller
{
    public function __construct()
    {
        session::init();
        parent::__construct();
        $this->middleware->auth();
    }

    public function index()
    {
        $this->render->layoutUser('shop/home');
    }

    public function notfound()
    {
        $this->render->view('error/404');
    }
}

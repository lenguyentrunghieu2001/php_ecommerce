<?php

class HomeController extends Controller
{

    public function __construct()
    {
        session::init();
        parent::__construct();
    }

    public function index()
    {
        $data['category'] = $this->menu($this->render->model('CategoryModel'));
        $this->render->view('shop/inc/menu', $data);
        $this->render->view('shop/inc/slider');
        $this->render->layoutUser('shop/home');
    }


    public function notfound()
    {
        $this->render->view('error/404');
    }
}

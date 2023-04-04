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
        $categorymodel = $this->render->model('CategoryModel');
        $data['category'] = $categorymodel->category('tbl_category_product');

        $this->render->view('shop/inc/menu', $data);
        $this->render->view('shop/inc/slider');
        $this->render->layoutUser('shop/home');
    }


    public function notfound()
    {
        $this->render->view('error/404');
    }
}

<?php

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $productmodel = $this->render->model('ProductModel');
        $postmodel = $this->render->model('PostModel');
        $data['product'] = $productmodel->findLimitHot('tbl_product', 5);
        $data['product_new'] = $productmodel->findLimitNew('tbl_product', 5);
        $data['post'] = $postmodel->findLimitPostNew('tbl_post', 3);
        $data['category'] = $this->menu($this->render->model('CategoryModel'));
        $this->render->view('shop/inc/menu', $data);
        $this->render->view('shop/inc/slider', $data);
        $this->render->layoutUser('shop/home', $data);
    }


    public function notfound()
    {
        $this->render->view('error/404');
    }
}

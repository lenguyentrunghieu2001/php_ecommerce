<?php

class CartController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_product';
    protected $categorymodel;
    protected $productmodel;

    public function __construct()
    {
        session::init();
        parent::__construct();
        $this->categorymodel = $this->render->model('CategoryModel');
        $this->productmodel = $this->render->model('ProductModel');
    }

    public function index()
    {

        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/cart', $this->data);
    }
}

<?php

class ProductController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_category_product';
    protected $table_product = 'tbl_product';
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

        $this->data['product'] = $this->productmodel->product($this->table_product);

        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/product', $this->data);
    }
    public function detail($id)
    {

        $this->data['category_id'] = $this->categorymodel->categoryById($this->table, $id);
        $this->data['product'] = $this->productmodel->findProduct($this->table_product, $id);

        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/product/detail', $this->data);
    }
}

<?php

class CartController extends Controller
{
    protected $data = [];
    protected $message;
    protected $table = 'tbl_product';
    protected $categorymodel;
    protected $productmodel;

    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->categorymodel = $this->render->model('CategoryModel');
        $this->productmodel = $this->render->model('ProductModel');
    }

    public function index()
    {
        session::init();
        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/cart', $this->data);
    }

    public function addcart()
    {
        session::init();

        if (isset($_SESSION["shopping_cart"])) {
            $avaiable = 0;
            if ($avaiable == 0) {
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity'],
                );

                $_SESSION["shopping_cart"][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity'],
            );

            $_SESSION["shopping_cart"][] = $item;
        }
        header('location:' . route_cart);
    }
}

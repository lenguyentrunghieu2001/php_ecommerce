<?php

class CartController extends Controller
{
    protected $data = [];
    protected $message;
    protected $table = 'tbl_product';
    protected $table_order = 'tlb_order';
    protected $table_order_detail = 'tbl_order_detail';
    protected $categorymodel;
    protected $productmodel;
    protected $ordermodel;

    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->categorymodel = $this->render->model('CategoryModel');
        $this->productmodel = $this->render->model('ProductModel');
        $this->ordermodel = $this->render->model('OrderModel');
    }

    public function index()
    {
        session::init();
        if (isset($_SESSION['shopping_cart'])) {
            $this->data['cart'] = $_SESSION["shopping_cart"];
        } else {
            $this->data['cart'] = 0;
        }
        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/cart', $this->data);
    }

    public function addcart()
    {
        session::init();

        if (isset($_SESSION["shopping_cart"])) {
            $avaiable = 0;
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']) {
                    $avaiable++;
                    $_SESSION["shopping_cart"][$key]['product_quantity'] += $_POST['product_quantity'];
                }
            }
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

    public function updatecart()
    {
        session::init();
        if (isset($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $key => $values) {
                if ($values['product_id'] == $_POST['product_id']) {
                    $_SESSION["shopping_cart"][$key]['product_quantity'] = $_POST['product_quantity'];;
                }
            }
            header('location:' . route_cart);
        }
    }

    public function deletecart($product_id)
    {
        session::init();
        if (isset($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $key => $values) {
                if ($values['product_id'] == $product_id) {

                    unset($_SESSION["shopping_cart"][$key]);
                }
            }
        } else {
        }
        header('location:' . route_cart);
    }

    public function order()
    {
        session::init();
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        $order_code = rand(0, 9999);

        date_default_timezone_set('asia/ho_chi_minh');
        $date = date("d/m/Y");
        $hour = date("h:i:sa");
        $this->data['order'] = array(
            'status' => 0,
            'code' => $order_code,
            'date' => $date . ' ' . $hour,
        );
        $this->data['result_order'] = $this->ordermodel->insertOrder($this->table_order, $this->data['order']);

        if (session::get('shopping_cart') == true) {
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                $this->data['order_detail'] = array(
                    'code' => $order_code,
                    'product_id' => $value['product_id'],
                    'quantity' => $value['product_quantity'],
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'content' => $content,
                );
                $this->data['result_order_detail'] = $this->ordermodel->insertOrder($this->table_order_detail, $this->data['order_detail']);
            }
            unset($_SESSION["shopping_cart"]);
        }
        header('location:' . route_cart);
    }
}

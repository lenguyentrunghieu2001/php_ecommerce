<?php

class OrderController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tlb_order';
    protected $table_detail = 'tbl_order_detail';
    protected $table_product = 'tbl_product';
    protected $ordermodel;


    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->middleware->isAdmin(session::get('role_id'));
        $this->ordermodel = $this->render->model('OrderModel');
    }

    public function index()
    {
        $this->data['order'] = $this->ordermodel->order($this->table);
        $this->render->layoutAdmin('admin/order', $this->data);
    }


    public function orderdetail($ordercode)
    {
        $this->data['order_detail'] = $this->ordermodel->orderDetail($this->table_detail, $this->table_product, $ordercode);
        $this->render->layoutAdmin('admin/order/detail', $this->data);
    }

    public function orderproccess($id)
    {
        $this->ordermodel->updateProccessOrder($this->table, ['status' => 1], 'id', $id);
        header('location:' . route_order);
    }
}

<?php

class AccountController extends Controller
{
    protected $data;
    protected $table = 'tbl_account';
    protected $accountmodel;
    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        session::get('role_id');
        $this->middleware->isAdmin(session::get('role_id'));
        $this->accountmodel = $this->render->model('AccountModel');
    }

    public function index()
    {

        $this->data['account'] = $this->accountmodel->getAllAccounts($this->table);

        $this->render->layoutAdmin('admin/account', $this->data);
    }

    public function updateroleid($id)
    {
        $getIdAccount = $this->accountmodel->getByIdAccount($this->table, $id);

        if ($getIdAccount['role_id'] === 1) {
            $this->accountmodel->updateRole($this->table, ['role_id' => 0], 'id', $id);
        } else {
            $this->accountmodel->updateRole($this->table, ['role_id' => 1], 'id', $id);
        }

        header('location:' . route_account);
    }
}

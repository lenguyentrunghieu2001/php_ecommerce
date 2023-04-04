<?php

class LoginController extends Controller
{
    protected $message;
    protected $table = 'tbl_account';
    protected $accountmodel;
    public function __construct()
    {
        parent::__construct();
        $this->accountmodel = $this->render->model('AccountModel');
    }

    public function index()
    {
        $this->login();
    }


    public function login()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)) {
                if (empty($username)) {
                    $this->message['username'] = 'username is required';
                }
                if (empty($password)) {
                    $this->message['password'] = 'password is required';
                }
            } else {
                $this->authentication();
                die();
            }
        }
        $this->render->view('login', [], $this->message);
    }

    public function authentication()
    {
        if (!isset($_POST['login'])) {
            header('location:' . route_login);
            die();
        }
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $count = $this->accountmodel->login($this->table, $username, $password);
        if ($count > 0) {
            $getLogin = $this->accountmodel->getLogin($this->table, 'username', $username);
            session::init();
            session::set('login', true);
            session::set('username', $getLogin['username']);
            session::set('userid', $getLogin['id']);
            session::set('role_id', $getLogin['role_id']);
            if ($getLogin['role_id'] === 1) {
                header('location:' . BASE_URL . 'admin');
            } else {
                header('location:' . BASE_URL);
            }
        } else {
            $this->message['login'] = 'Username or Password dont match';
            $this->render->view('login', [], $this->message);
        }
    }

    public function logout()
    {
        session::init();
        session::destroy();
        header('location:' . BASE_URL);
    }
}

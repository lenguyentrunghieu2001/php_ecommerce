<?php

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        session::get('role_id');
        $this->middleware->isAdmin(session::get('role_id'));
    }

    public function index()
    {
        $this->render->layoutAdmin('admin/dashboard');
    }

    public function notfound()
    {
        $this->render->view('error/404');
    }
}

<?php
class Middleware
{
    public function auth()
    {
        session::init();
        if (session::get('login') === false) {
            session_destroy();
            header('location:' . route_login);
        }
    }
    public function isAdmin($role_id)
    {
        if ($role_id !== 1) {
            header('location:' . BASE_URL);
        }
    }
}

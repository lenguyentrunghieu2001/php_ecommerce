<?php

class AccountModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($table, $username, $password)
    {
        $sql = "SELECT * FROM $table WHERE username = ? AND password = ?";

        return $this->db->affectedRow($sql, [$username, $password]);
    }

    public function getLogin($table, $name, $username)
    {
        $sql = "SELECT * FROM $table WHERE $name LIKE '$username'";

        return $this->db->find($sql);
    }

    public function getAllAccounts($table)
    {
        return $this->db->select($table);
    }

    public function getByIdAccount($table, $id)
    {
        return $this->db->findOne($table, $id);
    }

    public function updateRole($table, $data  = [], $cond = 'id', $id = 0)
    {
        $this->db->update($table, $data, $cond, $id);
    }
}

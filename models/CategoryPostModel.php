<?php

class CategoryPostModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($table)
    {
        return $this->db->select($table);
    }

    public function categoryById($table, $id)
    {
        return $this->db->findOne($table, $id);
    }

    public function insertCategory($table, $data = [])
    {
        $this->db->insert($table, $data);
    }

    public function updateCategory($table, $data  = [], $cond = 'id', $id = 0)
    {
        $this->db->update($table, $data, $cond, $id);
    }

    public function deleteCategory($table, $cond = 'id', $id = 0)
    {
        $this->db->delete($table, $cond, $id);
    }
}

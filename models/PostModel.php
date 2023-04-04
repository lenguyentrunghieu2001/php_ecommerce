<?php

class PostModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function post($table)
    {
        return $this->db->select($table);
    }


    public function postById($table, $id)
    {
        return $this->db->findOne($table, $id);
    }

    public function insertPost($table, $data = [])
    {
        $this->db->insert($table, $data);
    }

    public function selectCategoryPost($table,  $tableJoin, $id, $data = [])
    {
        $putName = '';
        foreach ($data as $key => $value) {
            $putName .= " ,$tableJoin.$key as '$value'";
        }
        $sql = "SELECT $table.* $putName FROM $table INNER JOIN $tableJoin  ON $table.$id =$tableJoin.id ORDER BY $table.id DESC";
        return $this->db->selectRaw($sql);
    }

    public function deletePost($table, $cond = 'id', $id = 0)
    {
        $this->db->delete($table, $cond, $id);
    }


    public function updatePost($table, $data  = [], $cond = 'id', $id = 0)
    {
        $this->db->update($table, $data, $cond, $id);
    }
}

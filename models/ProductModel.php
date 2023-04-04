<?php

class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function product($table)
    {
        return $this->db->select($table);
    }


    public function productById($table, $id)
    {
        return $this->db->findOne($table, $id);
    }

    public function insertProduct($table, $data = [])
    {
        $this->db->insert($table, $data);
    }

    public function selectCategory($table,  $tableJoin, $id, $data = [])
    {
        $putName = '';
        foreach ($data as $key => $value) {
            $putName .= " ,$tableJoin.$key as '$value'";
        }
        $sql = "SELECT $table.* $putName FROM $table INNER JOIN $tableJoin  ON $table.$id =$tableJoin.id ORDER BY $table.id DESC";
        return $this->db->selectRaw($sql);
    }

    public function deleteProduct($table, $cond = 'id', $id = 0)
    {
        $this->db->delete($table, $cond, $id);
    }


    public function updateProduct($table, $data  = [], $cond = 'id', $id = 0)
    {
        $this->db->update($table, $data, $cond, $id);
    }
}

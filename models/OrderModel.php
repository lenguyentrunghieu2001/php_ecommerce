<?php

class OrderModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function order($table)
    {
        return $this->db->select($table);
    }

    public function orderDetail($table, $tabletwo, $orderCode)
    {
        $sql = "SELECT $table.*,$tabletwo.name as 'product_name', $tabletwo.image as 'image' FROM $table,$tabletwo WHERE $table.product_id = $tabletwo.id AND code = $orderCode";
        return $this->db->selectRaw($sql);
    }

    public function insertOrder($table, $data = [])
    {
        return $this->db->insert($table, $data);
    }


    public function updateProccessOrder($table, $data  = [], $cond = 'id', $id = 0)
    {
        $this->db->update($table, $data, $cond, $id);
    }
}

<?php

class Database extends PDO
{
    public function __construct()
    {
        try {
            $connect = "mysql:host=localhost;dbname=ecommerce_figure";
            $user = 'root';
            $pass = '';
            parent::__construct($connect, $user, $pass);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function select($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function selectRaw($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }


    public function findOne($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id =:id";
        $statement = $this->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }


    public function find($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function findAccount($sql)
    {
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }


    public function insert($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        return $statement->execute();
    }

    public function update($table, $data, $cond, $valueCond)
    {
        $updateKeys = NULL;
        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key,";
        }
        $updateKeys = rtrim($updateKeys, ",");

        $sql = "UPDATE $table SET $updateKeys WHERE $cond=$valueCond";

        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        return $statement->execute();
    }

    public function delete($table, $cond, $valueCond)
    {
        $sql = "DELETE FROM $table WHERE $cond=$valueCond";
        return $this->exec($sql);
    }

    public function deleteMutiple($table, $cond, $data)
    {
        foreach ($data as $value) {
            $sql = "DELETE FROM $table WHERE $cond=$value";
        }
        return $this->exec($sql);
    }

    public function affectedRow($sql, $array = [])
    {
        $statement = $this->prepare($sql);
        $statement->execute($array);
        return $statement->rowCount();
    }
}

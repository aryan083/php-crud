<?php

class update
{
    private $conn;
    private $table;
    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }
    public function updateData($data, $id)
    {
        $key = array_keys($data);
        $value = array_values($data);
        for ($i = 0; $i < count($key); $i++) {
            $update = "UPDATE " . $this->table . " SET " . $key[$i] . "='$value[$i]' WHERE id = $id";
            $result = $this->conn->query($update);
        }
        $this->conn->close();
        if ($result != null) {
            return $dbname = updateSuccess;
        }
    }
}

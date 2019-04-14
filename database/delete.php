<?php

class delete
{
    private $conn;
    private $table;
    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }
    public function deleteData($id)
    {
        $delete = "DELETE FROM " . $this->table . " WHERE id='$id'";
        $result = $this->conn->query($delete);
        $this->conn->close();
        if ($result != null) {
            return $dbname = deleteSuccess;
        }
    }
}

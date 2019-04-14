<?php

class select
{
    private $conn;
    private $table;
    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }
    public function selectData()
    {
        $data = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($data);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        } else {
            echo "0 results";
        }
        $this->conn->close();
    }
}

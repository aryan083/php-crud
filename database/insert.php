<?php

class insert
{

    
    private $conn;
    private $table;

    /**
     * Constructor to initialize connection and table.
     *
     * @param PDO $conn  The PDO connection object.
     * @param string $table  The name of the table.
     */
    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    /**
     * Inserts data into the table.
     *
     * @param array $data  An associative array of column names and values.
     * @return string|null  The success message or null if an error occurs.
     */
    public function insertData($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->conn->prepare("INSERT INTO $this->table ($columns) VALUES ($placeholders)");

        try {
            $stmt->execute($data);
            return insertSuccess;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }


    //Note from contributor: This function is only added cuase it is very useful in many projects
    /**
     * Inserts data into the table and returns the last inserted ID.
     *
     * @param array $data  An associative array of column names and values.
     * @return int|string|null  The last inserted ID or null if an error occurs.
     */
    public function insertDataReturnId($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->conn->prepare("INSERT INTO $this->table ($columns) VALUES ($placeholders)");

        try {
            $stmt->execute($data);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>

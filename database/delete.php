<?php

class delete
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
     * Deletes records from the table based on the provided conditions.
     *
     * @param array $conditions  An associative array of column names and values for the WHERE clause.
     * @return string|null  The success message or null if an error occurs.
     */
    public function deleteData($conditions)
    {
        $whereClause = "";
        $params = [];

        foreach ($conditions as $column => $value) {
            $whereClause .= "$column = :$column AND ";
            $params[$column] = $value;
        }
        
        // Remove the trailing ' AND '
        $whereClause = rtrim($whereClause, " AND ");

        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE $whereClause");

        try {
            $stmt->execute($params);
            return deleteSuccess;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>

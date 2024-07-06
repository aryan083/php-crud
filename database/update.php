<?php

class update
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
     * Updates records in the table based on the provided conditions.
     *
     * @param array $data  An associative array of column names and values to update.
     * @param array $conditions  An associative array of column names and values for the WHERE clause.
     * @return string|null  The success message or null if an error occurs.
     */
    public function updateData($data, $conditions)
    {
        $setString = "";
        $params = [];

        foreach ($data as $key => $value) {
            $setString .= "$key = :$key, ";
            $params[$key] = $value;
        }
        $setString = rtrim($setString, ", ");

        $whereClause = "";
        foreach ($conditions as $column => $value) {
            $whereClause .= "$column = :$column AND ";
            $params[$column] = $value;
        }
        $whereClause = rtrim($whereClause, " AND ");

        $stmt = $this->conn->prepare("UPDATE $this->table SET $setString WHERE $whereClause");

        try {
            $stmt->execute($params);
            return updateSuccess;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>

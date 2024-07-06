<?php

class select
{
    private $conn;
    private $table;
    /**
     * Constructor to initialize connection and table.
     *
     * @param PDO $conn  The PDO connection object.
     * @param string $table  The name of the table.
     */    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    /**
     * Selects all data from the table.
     *
     * @return array  An associative array of all records in the table or an empty array if an error occurs.
     */
    public function selectAllData()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");

        try {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Selects data from the table based on the provided conditions.
     *
     * @param array $conditions  An associative array of column names and values for the WHERE clause.
     * @return array  An associative array of the selected records or an empty array if an error occurs.
     */
    public function selectByConditions($conditions)
    {
        $whereClause = "";
        $params = [];
        
        foreach ($conditions as $column => $value) {
            $whereClause .= "$column = :$column AND ";
            $params[$column] = $value;
        }
        
        // Remove the trailing ' AND ' or the last AND that was added by the loop
        $whereClause = rtrim($whereClause, " AND ");

        $query = "SELECT * FROM $this->table WHERE $whereClause";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
?>

<?php

include 'db_connection.php';
include 'select.php';
include 'update.php';
include 'insert.php';
include 'delete.php';
/**
 * Class DB
 *
 * A static class providing methods for database operations such as select, insert, update, and delete.
 */
class DB
{
    /**
     * Retrieves a PDO database connection.
     *
     * @return PDO|null  The PDO connection object or null if connection fails.
     */
    private static function getDBConnection()
    {
        $host   = DB_HOST;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dbname = DB_NAME;

        // Establish database connection using dbConnection class
        $db = new dbConnection($host, $user, $pass, $dbname);
        return $db->getConnection();
    }

    /**
     * Selects all records from a specified table.
     *
     * @param string $table  The name of the table to select from.
     * @return array  An associative array of all records in the table or an empty array if an error occurs.
     */
    static function selectAll($table)
    {
        $conn = self::getDBConnection();
        $select = new select($conn, $table);
        return $select->selectAllData();
    }

    /**
     * Selects records from a table based on provided conditions.
     *
     * @param string $table  The name of the table to select from.
     * @param array $conditions  An associative array of column names and values for the WHERE clause.
     * @return array  An associative array of selected records or an empty array if an error occurs.
     */
    static function selectWithConditions($table, $conditions)
    {
        $conn = self::getDBConnection();
        $select = new select($conn, $table);
        return $select->selectByConditions($conditions);
    }

    /**
     * Updates records in a table based on provided data and conditions.
     *
     * @param string $table  The name of the table to update.
     * @param array $data  An associative array of column names and values to update.
     * @param array $conditions  An associative array of column names and values for the WHERE clause.
     * @return string|null  The success message or null if an error occurs.
     */
    static function update($table, $data, $conditions)
    {
        $conn = self::getDBConnection();
        $update = new update($conn, $table);
        return $update->updateData($data, $conditions);
    }

    /**
     * Inserts data into a table.
     *
     * @param string $table  The name of the table to insert into.
     * @param array $data  An associative array of column names and values to insert.
     * @return string|null  The success message or null if an error occurs.
     */
    static function insert($table, $data)
    {
        $conn = self::getDBConnection();
        $insert = new insert($conn, $table);
        return $insert->insertData($data);
    }

    /**
     * Inserts data into a table and returns the last inserted ID.
     *
     * @param string $table  The name of the table to insert into.
     * @param array $data  An associative array of column names and values to insert.
     * @return string|null  The last inserted ID or null if an error occurs.
     */
    static function insertAndRetrunID($table, $data)
    {
        $conn = self::getDBConnection();
        $insert = new insert($conn, $table);
        return $insert->insertDataReturnId($data);
    }

    /**
     * Deletes records from a table based on provided conditions.
     *
     * @param string $table  The name of the table to delete from.
     * @param array $conditions  An associative array of column names and values for the WHERE clause.
     * @return string|null  The success message or null if an error occurs.
     */
    static function delete($table, $conditions)
    {
        $conn = self::getDBConnection();
        $delete = new delete($conn, $table);
        return $delete->deleteData($conditions);
    }
}
?>

<?php

include 'db_connection.php';

class index
{
    static function select($table)
    {
        $host   = DB_HOST;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dbname = DB_NAME;
        $db = new dbConnection($host, $user, $pass, $dbname);
        $select = new select($db->connection(), $table);
        $row = $select->selectData();
        return $row;
    }

    static function update($table, $data, $id = null)
    {
        $host   = DB_HOST;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dbname = DB_NAME;
        $db = new dbConnection($host, $user, $pass, $dbname);
        $select = new update($db->connection(), $table);
        $row = $select->updateData($data, $id);
        return $row;
    }

    static function insert($table, $data)
    {
        $host   = DB_HOST;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dbname = DB_NAME;
        $db = new dbConnection($host, $user, $pass, $dbname);
        $select = new insert($db->connection(), $table);
        $row = $select->insertData($data);
        return $row;
    }

    static function delete($table, $id)
    {
        $host   = DB_HOST;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dbname = DB_NAME;
        $db = new dbConnection($host, $user, $pass, $dbname);
        $select = new delete($db->connection(), $table);
        $row = $select->deleteData($id);
        return $row;
    }
}

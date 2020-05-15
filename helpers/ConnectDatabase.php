<?php

/**
 * Class ConnectDatabase
 */
class ConnectDatabase
{
    /**
     * @param $config|array
     * @return PDO
     */
    public static function connectDb($config)
    {
        try {
            $conn = new PDO("mysql:host=" . $config['db']['host'] . ";port=" . $config['db']['port'] . ";dbname=" . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
}



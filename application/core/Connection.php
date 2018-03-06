<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 03.03.18
 * Time: 15:32
 */

namespace Core;

class Connection
{
    /**
     * @var
     */
    protected static $_instance;
    /**
     * @var mysqli
     */
    public $db;

    /**
     * @return Connection
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * Connection constructor.
     */
    private function __construct()
    {
        $this->db = $this->getConnection();
    }

    private function __clone() {}

    private function __wakeup() {}

    /**
     * @return mysqli
     */
    private function getConnection()
    {
        $db = require(__DIR__ . '/../config/db.php');

        if(!$db)
        {
            throw new \Exception("DB Connection failed: check config!");
        }

        $connection = @mysqli_connect($db['host'], $db['username'], $db['password'], $db['dbname']);

        if (!$connection) {
            throw new \Exception("DB Connection failed");
        }

        return $connection;
    }
}
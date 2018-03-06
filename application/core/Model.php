<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 03.03.18
 * Time: 15:30
 */

namespace Core;

/**
 * Class Model
 * @package Core
 */
abstract class Model
{
    /**
     * @var mysqli
     */
    public $db;

    /**
     * Model constructor.
     */
    function __construct()
    {
        $this->db = Connection::getInstance()->db;
    }

    /**
     * @return bool
     */
    abstract public function create();

    /**
     * @param array $data
     * @return bool
     */
    abstract public function update($data);

    /**
     * @return array
     */
    abstract public function findAll();

    /**
     * @param array $data
     * @return bool
     */
    abstract public function load($data);
}
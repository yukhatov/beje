<?php

namespace Models;

use Core\Model;

/**
 * Class ModelTask
 * @package Models
 */
class ModelTask extends Model
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $image;

    /**
     * ModelTask constructor.
     */
    function __construct()
	{
		parent::__construct();
	}

    /**
     * @return bool
     */
    public function create()
    {
        $sql = sprintf(
                "INSERT INTO task (username, email, description, image) VALUES ('%s', '%s', '%s', '%s')",
                $this->username,
                $this->email,
                $this->description,
                $this->image
            );

        $result = $this->db->query($sql);
        $this->db->close();

        if ($result) {
            return true;
        }

        return false;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update($data)
    {
        $sql = sprintf(
                "UPDATE task SET description = '%s', status = '%s' WHERE id=%s",

                $data['description'],
                isset($data['status']) ? 1 : 0,
                $data['id']
            );

        $result = $this->db->query($sql);
        $this->db->close();

        if ($result) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM task';
        $result = $this->db->query($sql);
        $result = $result->fetch_all(MYSQLI_ASSOC);

        $this->db->close();

        return $result;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findById($id) 
    {
        $sql = "SELECT * FROM task WHERE id=$id";
        $result = $this->db->query($sql);
        $result = $result->fetch_assoc();

        $this->db->close();

        return $result;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function load($data)
    {
        if (
            isset($data['username']) and $data['username'] != "" and
            isset($data['email']) and $data['email'] != "" and
            isset($data['description']) and $data['description'] != "" and
            isset($data['image']) and $data['image'] != ""
        ) {
            $this->username = $data['username'];
            $this->email = $data['email'];
            $this->description = $data['description'];
            $this->image = $data['image'];

            return true;
        }

        return false;
    }
}

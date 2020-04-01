<?php

namespace Admin\Src\Repository;

use Lib\Db;

class UserService {

    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getUser(array $data) {
        //admin123
        $sql = "SELECT username
                FROM users WHERE username='". $data['username'] . "' AND password='".base64_encode($data['password'])."'";
        return $this->db->fetchAll($sql);
    }

}
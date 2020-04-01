<?php

namespace Lib;

use Symfony\Component\Yaml\Yaml;

class Db {

    private $db;
    public function __construct()
    {
        $config = Yaml::parseFile(__DIR__ . "/../config/config.yml");
        $this->db = $this->connection($config['DB']);
    }

    protected function connection($data) {
        try {
            $db = new \PDO("mysql:host=". $data['DB_HOST'] . ";dbname="
                . $data['DB_NAME'], $data['DB_USER'], $data['DB_PASSWORD']);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $db;
    }

    public function fetchAll($sql) {
        if ($result = $this->db->query($sql)) {
           return $result->fetchAll(\PDO::FETCH_OBJ);
        } else {
            echo "There was an error with the query!";
            var_dump($this->db->errorInfo());
        }
        return false;
    }

    public function insert($sql) {
        if ($result = $this->db->query($sql)) {
            return true;
        } else {
            echo "There was an error with the query!";
            var_dump($this->db->errorInfo());
        }
        return false;
    }

}
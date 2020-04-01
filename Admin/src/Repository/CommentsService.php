<?php

namespace Admin\Src\Repository;

use Lib\Db;

class CommentsService {
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getComments() {
        $sql = "SELECT c.id, c.product_id, c.email, c.comment, c.name, c.public, c.date_created, p.title
                FROM comments c JOIN products p ON p.id = c.product_id";
        return $this->db->fetchAll($sql);
    }

    public function updateStatus(int $id, int $status) {
        $sql = sprintf("UPDATE comments SET public = %d WHERE id = %d", $status, $id);
        if($this->db->insert($sql)) {
            return true;
        }
        return false;
    }

}
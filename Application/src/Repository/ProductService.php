<?php

namespace Application\Src\Repository;

use Application\Src\Controller\IndexController;
use Lib\Db;

class ProductService {

    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getProducts(int $id = null, int $limit = null, int $offset = null) {
        $sql = "SELECT p.id, p.title, p.description, pi.path
                FROM products p JOIN product_images pi ON p.id = pi.product_id WHERE 1";
        if(!empty($id)) {
            $sql .= " AND p.id = '$id'";
        }
        $sql .= " LIMIT $limit";
        if(!is_null($offset)) {
            $sql .= "  OFFSET $offset";
        }
        return $this->db->fetchAll($sql);
    }

    public function addComment(array $data) {
        if(!empty($data['email'])) {
            if($this->commentExists($data['email']) === 0) {
                $sql = sprintf("INSERT INTO comments (name, email, comment, product_id, date_created)
                                        VALUES ('%s','%s', '%s', %d, NOW())",
                                        $data['name'], $data['email'], $data['comment'], $data['product_id']);
                if($this->db->insert($sql)) {
                    return true;
                }
            }
        }
        return false;
    }

    protected function commentExists($email) {
        $sql = "SELECT id FROM comments WHERE email = '$email'";
        $result = $this->db->fetchAll($sql);
        return count($result);
    }

    public function getComments(int $id) {
        $sql = "SELECT comment, name, email, date_created FROM comments WHERE product_id = '$id' AND public = 1";
        $result = $this->db->fetchAll($sql);
        return $result;
    }

    public function getPagination() {
        $perPage = IndexController::PRODUCTS_PER_PAGE;
        $sql = "SELECT count(*) as hits
                FROM products p JOIN product_images pi ON p.id = pi.product_id ";
        $result = $this->db->fetchAll($sql);
        $number = ceil($result[0]->hits / $perPage);
        return $number;
    }
}
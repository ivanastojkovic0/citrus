<?php

namespace Application\Src\Controller;

use Application\Src\Helper\View;
use Application\Src\Repository\ProductService;

class IndexController {

    CONST PRODUCTS_PER_PAGE = 9;

    private $view;
    private $id;

    public function __construct()
    {
        $this->view = "Application";
    }

    private function getPost() {
        $data = [];
        $data['email'] = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL);
        $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $data['comment'] = filter_input(INPUT_POST, 'comment',FILTER_SANITIZE_STRING);
        $data['product_id'] = $this->id;
        return $data;
    }

    public function getView() {
        return $this->view;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function indexAction() {
        $limit = self::PRODUCTS_PER_PAGE;
        $offset = null;
        $page = null;
        $id = $this->id;
        $products = new ProductService();
        if(!empty($this->id)) {
            $page = $this->id;
            $id = null;
            $offset = $limit * $page - $limit;
        }
        $result = $products->getProducts($id, $limit, $offset);
        $result['pages'] = $products->getPagination();
        return new View($result);
    }

    public function getProductAction() {
        $products = new ProductService();
        $result = $products->getProducts($this->id, 1);
        $comments = $products->getComments($this->id);
        return new View(['data' => $result, 'comments' => $comments]);
    }

    public function addCommentAction() {
        $response = false;
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $service = new ProductService();
            $response = $service->addComment($this->getPost());
        }
        return new View(['status' => $response]);
    }

}

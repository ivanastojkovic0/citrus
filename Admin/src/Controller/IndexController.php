<?php

namespace Admin\Src\Controller;
use Admin\Src\Repository\CommentsService;
use Admin\Src\Repository\UserService;
use Application\Src\Helper\View;

class IndexController {

    private $view;

    public function __construct()
    {
        $this->view = "Admin";
    }
    public function getView() {
        return $this->view;
    }

    public function indexAction() {
        if(!isset($_SESSION['user'])) {
            return $this->loginAction();
        } else {
            return $this->panelAction();
        }
    }

    public function loginAction() {
        $result['status'] = false;
        $post = $this->getPost();
        if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($post['username']) && !empty($post['password'])) {
            $service = new UserService();
            $user = $service->getUser($post);
            if(!empty($user)) {
                $_SESSION['user'] = $user[0]->username;
                header("Location: /panel/");
            }
            $result['status'] = false;
        }
        return new View($result);
    }

    public function logoutAction() {
        if(isset($_SESSION['user'])) {
            session_unset();
            session_destroy();
            return new View(['message' => "Logged out"]);
        } else {
            header("Location: /adminpanel/");
        }

    }

    private function getPost() {
        $data = [];
        $data['username'] = filter_input(INPUT_POST, 'username' , FILTER_SANITIZE_STRING);
        $data['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        return $data;
    }

    public function panelAction() {
        $service = new CommentsService();
        $comments = $service->getComments();
        return new View($comments);

    }

    public function changeCommentStatusAction() {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
        $service = new CommentsService();
        $comments = $service->updateStatus($id, !$status);
        echo json_encode(['status' => $comments]);
        exit();
    }
}
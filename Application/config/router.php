<?php

use Application\Src\Controller\IndexController;
use Admin\Src\Controller\IndexController as AdminIndex;

return [
    'router' => [
        'index' => [
            'controller' => IndexController::class,
            'action' => 'index'
        ],
        'product' => [
            'controller' => IndexController::class,
            'action' => 'getProduct'
        ],
        'addcomment' => [
            'controller' => IndexController::class,
            'action' => 'addComment'
        ],
        'adminpanel' => [
            'controller' => AdminIndex::class,
            'action' => 'index'
        ],
        'login' => [
            'controller' => AdminIndex::class,
            'action' => 'login'
        ],
        'logout' => [
            'controller' => AdminIndex::class,
            'action' => 'logout'
        ],
        'panel' => [
            'controller' => AdminIndex::class,
            'action' => 'panel'
        ],
        'change-status' => [
            'controller' => AdminIndex::class,
            'action' => 'changeCommentStatus'
        ],

    ]
];
<?php

namespace Application\Src\Helper;

class View
{

    private $params;

    function __construct(array $params = [])
    {
        $this->params = $params;
    }

    public function getParams() {
        return $this->params;
    }
}
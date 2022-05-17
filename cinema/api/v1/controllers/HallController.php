<?php

class HallController extends BaseController
{
    private $hallModel;

    public function __construct()
    {
        $this->hallModel = new Hall();
    }

    public function main($id = 0)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET':
                $this->get($id);
                break;
            default:
                $this->showNotAllowed();
                break;
        }
    }

    public function get($data)
    {
        if (!empty($data)) {
            $id = $data[0];
            $this->answer = $this->hallModel->getById($id);
            $this->sendAnswer();
        } else {
            $this->answer = $this->hallModel->getAll();
            $this->sendAnswer();
        }
    }
}
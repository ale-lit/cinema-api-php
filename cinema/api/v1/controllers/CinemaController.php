<?php

class CinemaController extends BaseController
{
    private $cinemaModel;

    public function __construct()
    {
        $this->cinemaModel = new Cinema();
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
            $this->answer = $this->cinemaModel->getById($id);
            $this->sendAnswer();
        } else {
            $this->answer = $this->cinemaModel->getAll();
            $this->sendAnswer();
        }
    }
}
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

    // private function post()
    // {
    //     $data = json_decode(file_get_contents("php://input"), true);
    //     $this->answer = $this->recipeModel->add($data);
    //     $this->sendAnswer();
    // }

    // public function patch($data)
    // {
    //     $id = $data[0];
    //     $data = json_decode(file_get_contents("php://input"), true);
    //     $this->answer = $this->recipeModel->edit($data, $id);
    //     $this->sendAnswer();
    // }

    // public function remove($data)
    // {
    //     $id = $data[0];
    //     $this->answer = $this->recipeModel->remove($id);
    //     $this->sendAnswer();
    // }
}
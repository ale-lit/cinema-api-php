<?php

class SeanceController extends BaseController
{
    private $seanceModel;

    public function __construct()
    {
        $this->seanceModel = new Seance();
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
            $date = $data[0];
            $this->answer = $this->seanceModel->getByDate($date);
            $this->sendAnswer();
        } else {
            $this->answer = $this->seanceModel->getAll();
            $this->sendAnswer();
        }
    }
}

<?php

class SeanceController extends BaseController
{
    private $seanceModel;

    public function __construct()
    {
        $this->seanceModel = new Seance();
    }

    public function main($data = 0)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'GET') {
            if (!empty($data)) {
                echo "222";
                $id = $data[0];
                $this->answer = $this->seanceModel->getById($id);
                $this->sendAnswer();
            } else {
                
                $this->answer = $this->seanceModel->getAll();
                $this->sendAnswer();
            }
        } else {
            $this->showNotAllowed();
        }
    }    

    public function date($data = 0)
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!empty($data)) {
                $date = $data[0];
                $this->answer = $this->seanceModel->getByDate($date);
                $this->sendAnswer();
            } else {
                echo "12333"; // TODO!!!
            }
        } else {
            $this->showNotAllowed();
        }
    }
}

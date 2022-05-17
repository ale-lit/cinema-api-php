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
                $id = $data[0];
                $id = htmlentities($id);
                if (!preg_match("/^[0-9]{1,10}$/i", $id)) {
                    $this->showBadRequest();
                    die("Указан не корректный id сеанса или дата");
                }
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
            $date = $data[0];
            $date = htmlentities($date);
            $this->answer = $this->seanceModel->getByDate($date);
            $this->sendAnswer();
        } else {
            $this->showNotAllowed();
        }
    }
}

<?php

class PlaceController extends BaseController
{
    private $placeModel;

    public function __construct()
    {
        $this->placeModel = new Place();
    }

    public function main($data = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $seanceId = $data[0];
            $seanceId = htmlentities($seanceId);
            if (!preg_match("/^[0-9]{1,10}$/i", $seanceId)) {
                $this->showBadRequest();
                die("Указан не корректный id сеанса");
            }
            $this->answer = $this->placeModel->getAll($seanceId);
            $this->sendAnswer();
        } else {
            $this->showNotAllowed();
        }
    }

    public function check()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!isset($_GET['seance']) || !isset($_GET['row']) || !isset($_GET['number'])) {
                return $this->showBadRequest();
            }
            $seance = htmlentities($_GET['seance']);
            if (!preg_match("/^[0-9]{1,10}$/i", $seance)) {
                $this->showBadRequest();
                die("Указан не корректный id сеанса");
            }
            $row = htmlentities($_GET['row']);
            $number = htmlentities($_GET['number']);
            if (!preg_match("/^[0-9]{1,2}$/i", $row) || !preg_match("/^[0-9]{1,2}$/i", $number)) {
                $this->showBadRequest();
                die("Указан не корректный ряд или место");
            }
            $this->answer = $this->placeModel->checkPlace($seance, $row, $number);
            $this->sendAnswer();
        } else {
            $this->showNotAllowed();
        }
    }
}

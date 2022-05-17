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
}

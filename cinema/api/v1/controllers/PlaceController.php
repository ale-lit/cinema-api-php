<?php

class PlaceController extends BaseController
{
    private $placeModel;

    public function __construct()
    {
        $this->placeModel = new Place();
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
        $seanceId = $data[0];
        $this->answer = $this->placeModel->getAll($seanceId);
        $this->sendAnswer();
    }
}

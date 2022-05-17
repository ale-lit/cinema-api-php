<?php

class CinemaController extends BaseController
{
    private $cinemaModel;

    public function __construct()
    {
        $this->cinemaModel = new Cinema();
    }

    public function main($data = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!empty($data)) {
                $id = $data[0];
                $id = htmlentities($id);            
                if (!preg_match("/^[0-9]{1,10}$/i", $id)) {
                    $this->showBadRequest();
                    die("Указан не корректный id кинотеатра");
                }
                $this->answer = $this->cinemaModel->getById($id);
                $this->sendAnswer();
            } else {
                $this->answer = $this->cinemaModel->getAll();
                $this->sendAnswer();
            }
        } else {
            $this->showNotAllowed();
        }
    }
}

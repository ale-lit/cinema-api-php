<?php

class HallController extends BaseController
{
    private $hallModel;

    public function __construct()
    {
        $this->hallModel = new Hall();
    }

    public function main($data = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!empty($data)) {
                $id = $data[0];
                $id = htmlentities($id);            
                if (!preg_match("/^[0-9]{1,10}$/i", $id)) {
                    $this->showBadRequest();
                    die("Указан не корректный id зала");
                }
                $this->answer = $this->hallModel->getById($id);
                $this->sendAnswer();
            } else {
                $this->answer = $this->hallModel->getAll();
                $this->sendAnswer();
            }
        } else {
            $this->showNotAllowed();
        }
    }
}

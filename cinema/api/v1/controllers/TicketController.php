<?php

class TicketController extends BaseController
{
    private $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new Ticket();
    }

    public function main($data = 0)
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!empty($data)) {
                $id = $data[0];
                $id = htmlentities($id);
                if (!preg_match("/^[0-9]{1,10}$/i", $id)) {
                    $this->showBadRequest();
                    die("Указан не корректный id билета");
                }
                $this->answer = $this->ticketModel->getById($id);
                $this->sendAnswer();
            } else {
                $this->answer = $this->ticketModel->getAll();
                $this->sendAnswer();
            }
        } else {
            $this->showNotAllowed();
        }
    }
}

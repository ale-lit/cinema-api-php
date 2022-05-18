<?php

class TicketController extends BaseController
{
    private $ticketModel;
    private $placeModel;

    public function __construct()
    {
        $this->ticketModel = new Ticket();
        $this->placeModel = new Place();
    }

    public function main($data = 0)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->get($data);
                break;
            case 'POST':
                $this->post();
                break;
            case 'PATCH':
                $this->patch($data);
                break;
            case 'DELETE':
                $this->remove($data);
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
    }

    private function post()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        
        // Проверки
        if (!isset($data['seance']) || !isset($data['row']) || !isset($data['number'])) {
            return $this->showBadRequest();
        }

        $seance = htmlentities($data['seance']);
        if (!preg_match("/^[0-9]{1,10}$/i", $seance)) {
            $this->showBadRequest();
            die("Указан не корректный id сеанса");
        }

        $row = htmlentities($data['row']);
        $number = htmlentities($data['number']);
        if (!preg_match("/^[0-9]{1,2}$/i", $row) || !preg_match("/^[0-9]{1,2}$/i", $number)) {
            $this->showBadRequest();
            die("Указан не корректный ряд или место");
        }

        // Перед продажей проверяем на доступность
        $checkStatus = $this->placeModel->checkPlace($seance, $row, $number);
        if ($checkStatus) {
            // Билет уже продан (есть в базе)
            $this->showNotAllowed();
        } else {
            // Добавляем билет в базу
            $this->answer = $this->ticketModel->add($data);
            $this->sendAnswer();
        }
    }

    public function patch($data)
    {
        $id = $data[0];
        $data = json_decode(file_get_contents("php://input"), true);
        $newStatus = htmlentities($data['status']);
        if (!preg_match("/^[1-2]$/i", $newStatus)) {
            $this->showBadRequest();
            die("Указан не корректный статус для билета");
        }
        $this->answer = $this->ticketModel->edit($newStatus, $id);
        $this->sendAnswer();
    }

    public function remove($data)
    {
        $id = $data[0];
        $this->answer = $this->ticketModel->remove($id);
        $this->sendAnswer();
    }
}

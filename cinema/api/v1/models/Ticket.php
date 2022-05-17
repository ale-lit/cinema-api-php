<?php

class Ticket extends BaseModel
{
    public function getAll()
    {
        $query = "
            SELECT `ticket`.`ID` AS 'id', `row`, `number`, `ID_seance` AS 'seance id', IFNULL(`status`.`name`, 'Свободен') AS 'status'
                FROM `ticket`
                LEFT JOIN `status` ON `status`.`ID` = `ticket`.`ID_status`
                ORDER BY `row`, `number`;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $query = "
            SELECT `row`, `number`, `ID_seance` AS 'seance id', IFNULL(`status`.`name`, 'Свободен') AS 'status'
                FROM `ticket`
                LEFT JOIN `status` ON `status`.`ID` = `ticket`.`ID_status`
                WHERE `ticket`.`ID` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }
}

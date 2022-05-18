<?php

class Place extends BaseModel
{
    public function getAll($seanceId)
    {
        $query = "
            SELECT `place`.`row`, `place`.`number`, IFNULL(`status`.`name`, 'Свободен') AS 'status'
                FROM `place`
                LEFT JOIN `seance` ON `seance`.`ID` = $seanceId
                LEFT JOIN `ticket` ON `ticket`.`ID_seance` = `seance`.`ID` AND `ticket`.`row` = `place`.`row` AND `ticket`.`number` = `place`.`number`
                LEFT JOIN `status` ON `status`.`ID` = `ticket`.`ID_status`
                WHERE `place`.`ID_hall` = `seance`.`ID_hall`
                ORDER BY `row`, `number`;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function checkPlace($seance, $row, $number)
    {
        $query = "
            SELECT IFNULL(`name`, 'Свободен') AS 'status'
                FROM `ticket`
                LEFT JOIN `status` ON `status`.`ID` = `ticket`.`ID_status`
                WHERE `ID_seance` = $seance AND `row` = $row AND `number` = $number;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }
}

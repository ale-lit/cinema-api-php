<?php

class Cinema extends BaseModel
{
    public function getAll()
    {
        $query = "
            SELECT * FROM `cinema`;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $query = "
            SELECT `cinema`.`name`, `address`, GROUP_CONCAT(`hall`.`name`) AS 'halls'
                FROM `cinema`
                LEFT JOIN `hall` ON `hall`.`ID_cinema` = `cinema`.`ID`
                WHERE `cinema`.`ID` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }
}

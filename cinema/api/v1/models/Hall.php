<?php

class Hall extends BaseModel
{
    public function getAll()
    {
        $query = "
            SELECT `hall`.`ID` AS 'id', `hall`.`name`, `hall`.`ID_cinema` AS 'cinema id', `cinema`.`name` AS 'cinema name', `cinema`.`address`
                FROM `hall`
                LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $query = "
            SELECT `hall`.`name`, `cinema`.`name` AS 'cinema name', `cinema`.`address`
                FROM `hall`
                LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`
                WHERE `hall`.`ID` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }
}

<?php

class Hall extends BaseModel
{
    public function getAll()
    {
        $query = "
            SELECT `hall`.`ID` as 'id', `hall`.`name`, `hall`.`ID_cinema` as 'cinema id', `cinema`.`name` as 'cinema name', `cinema`.`address`
                FROM `hall`
                LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $query = "
            SELECT `hall`.`name`, `cinema`.`name` as 'cinema name', `cinema`.`address`
                FROM `hall`
                LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`
                WHERE `hall`.`ID` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }
}

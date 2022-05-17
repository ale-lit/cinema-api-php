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
            SELECT `name`, `address`
                FROM `cinema`
                WHERE `ID` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }
}

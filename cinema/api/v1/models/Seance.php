<?php

class Seance extends BaseModel
{
    public function getAll()
    {
        $query = "
            SELECT `seance`.`ID` as 'id', `seance`.`datetime`, `seance`.`price`, `hall`.`name` as 'hall name',
                `cinema`.`ID` as 'cinema id', `cinema`.`name` as 'cinema name', `cinema`.`address`, `movies`.`name`,
                `movies`.`census`, `movies`.`desc`, `genre`.`name` as 'genre', CONCAT(`directed`.`first_name`, ' ', `directed`.`last_name`) as 'directed' 
                    FROM `seance`
                    LEFT JOIN `hall` ON `hall`.`ID` = `seance`.`ID_hall`
                    LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`
                    LEFT JOIN `movies` ON `movies`.`ID` = `seance`.`ID_movie`
                    LEFT JOIN `genre` ON `genre`.`ID` = `movies`.`ID_genre`
                    LEFT JOIN `directed` ON `directed`.`ID` = `movies`.`ID_directed`
                    ORDER BY `seance`.`datetime` ASC;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getByDate($date)
    {
        $query = "
            SELECT `seance`.`ID` as 'id', `seance`.`datetime`, `seance`.`price`, `hall`.`name` as 'hall name',
                    `cinema`.`ID` as 'cinema id', `cinema`.`name` as 'cinema name', `cinema`.`address`, `movies`.`name`,
                    `movies`.`census`, `movies`.`desc`, `genre`.`name` as 'genre', CONCAT(`directed`.`first_name`, ' ', `directed`.`last_name`) as 'directed' 
                        FROM `seance`
                        LEFT JOIN `hall` ON `hall`.`ID` = `seance`.`ID_hall`
                        LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`
                        LEFT JOIN `movies` ON `movies`.`ID` = `seance`.`ID_movie`
                        LEFT JOIN `genre` ON `genre`.`ID` = `movies`.`ID_genre`
                        LEFT JOIN `directed` ON `directed`.`ID` = `movies`.`ID_directed`
                        WHERE `seance`.`datetime` >= '$date' AND `seance`.`datetime` < DATE_ADD('$date', INTERVAL 1 DAY)
                        ORDER BY `seance`.`datetime` ASC;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

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

    public function getById($id)
    {
        $query = "
            SELECT `seance`.`datetime`, `cinema`.`ID` AS 'cinema id', `cinema`.`name` AS 'cinema name', `cinema`.`address`,
                `hall`.`name` AS 'hall name', `movies`.`name`, `seance`.`price`,`movies`.`census`, `movies`.`desc`,
                `genre`.`name` AS 'genre', CONCAT(`directed`.`first_name`, ' ', `directed`.`last_name`) AS 'directed',
                GROUP_CONCAT(CONCAT(`actor`.`first_name`, ' ', `actor`.`last_name`) SEPARATOR ', ') AS 'actors'
                    FROM `seance`
                    LEFT JOIN `hall` ON `hall`.`ID` = `seance`.`ID_hall`
                    LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`
                    LEFT JOIN `movies` ON `movies`.`ID` = `seance`.`ID_movie`
                    LEFT JOIN `genre` ON `genre`.`ID` = `movies`.`ID_genre`
                    LEFT JOIN `directed` ON `directed`.`ID` = `movies`.`ID_directed`
                    LEFT JOIN `actor_list` ON `actor_list`.`ID_movis` = `movies`.`ID`
                    RIGHT JOIN `actor` ON `actor`.`ID` = `actor_list`.`ID_actor`
                    WHERE `seance`.`ID` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }

    public function getByDate($date)
    {
        $query = "
            SELECT `seance`.`ID` AS 'id', `seance`.`datetime`, `seance`.`price`, `hall`.`name` AS 'hall name', `cinema`.`ID` AS 'cinema id',
                `cinema`.`name` AS 'cinema name', `cinema`.`address`, `movies`.`name`, `movies`.`census`, `movies`.`desc`, `genre`.`name` AS 'genre',
                CONCAT(`directed`.`first_name`, ' ', `directed`.`last_name`) AS 'directed', GROUP_CONCAT(CONCAT(`actor`.`first_name`, ' ', `actor`.`last_name`) SEPARATOR ', ') AS 'actors'
                        FROM `seance`
                        LEFT JOIN `hall` ON `hall`.`ID` = `seance`.`ID_hall`
                        LEFT JOIN `cinema` ON `cinema`.`ID` = `hall`.`ID_cinema`
                        LEFT JOIN `movies` ON `movies`.`ID` = `seance`.`ID_movie`
                        LEFT JOIN `genre` ON `genre`.`ID` = `movies`.`ID_genre`
                        LEFT JOIN `directed` ON `directed`.`ID` = `movies`.`ID_directed`
                        LEFT JOIN `actor_list` ON `actor_list`.`ID_movis` = `movies`.`ID`
                        RIGHT JOIN `actor` ON `actor`.`ID` = `actor_list`.`ID_actor`
                        WHERE `seance`.`datetime` >= '$date' AND `seance`.`datetime` < DATE_ADD('$date', INTERVAL 1 DAY)
                        GROUP BY `seance`.`ID`
                        ORDER BY `seance`.`datetime` ASC;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

<?php

$routes = array(
    'CinemaController' => array(
        'cinemas/([0-9]+)' => 'main/$1',
        'cinemas' => 'main'
    ),
    'HallController' => array(
        'halls/([0-9]+)' => 'main/$1',
        'halls' => 'main'
    )
);

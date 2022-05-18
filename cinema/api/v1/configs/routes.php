<?php

$routes = array(
    'CinemaController' => array(
        'cinemas/([0-9]+)' => 'main/$1',
        'cinemas' => 'main'
    ),
    'HallController' => array(
        'halls/([0-9]+)' => 'main/$1',
        'halls' => 'main'
    ),
    'SeanceController' => array(        
        'seances/date/([0-9]+\-[0-9]+\-[0-9]+)' => 'date/$1',
        'seances/([0-9]+)' => 'main/$1',
        'seances' => 'main'
    ),
    'PlaceController' => array(
        'places/check/' => 'check',
        'places/([0-9]+)' => 'main/$1'
    ),
    'TicketController' => array(
        'tickets/([0-9]+)' => 'main/$1',
        'tickets' => 'main'
    )
);

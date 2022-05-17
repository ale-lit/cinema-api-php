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
        'places/([0-9]+)' => 'main/$1'
    ),
    'TicketController' => array(
        'ticket/add' => 'add',
        'ticket/edit/([0-9]+)' => 'edit/$1',
        'ticket/delete/([0-9]+)' => 'delete/$1',
        'tickets/([0-9]+)' => 'main/$1',
        'tickets' => 'main'
    )
);

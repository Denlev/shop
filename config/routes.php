<?php
    return [
        'cart' => 'cart/index',
        'remove/([a-zA-Z]+)/([0-9]+)' => 'cart/remove/$1/$2',
        'add/([a-zA-Z]+)' => 'main/addToCart/$1',
        'any/([a-zA-Z]+)/([0-9]+)' => 'cart/addAny/$1/$2',
        'star/([a-zA-Z]+)/([0-9]+)'=> 'main/rate/$1/$2',
        '' => 'main/index'
    ];

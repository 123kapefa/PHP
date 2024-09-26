<?php

return [
    'phone' => env ('APP_PHONE', ''),
    'menu' => [
        [
            'link' => '/',
            'text' => 'Main',
            'current' => false
        ],
        [
            'link' => '/login',
            'text' => 'Login',
            'current' => false
        ],
        [
            'link' => '/registration',
            'text' => 'Registration',
            'current' => false
        ],
        [
            'link' => '/about',
            'text' => 'About',
            'current' => false
        ],
        [
            'link' => '/service',
            'text' => 'Services',
            'current' => false
        ],
        [
            'link' => '/contact',
            'text' => 'Contact Us',
            'current' => false
        ],
    ],
];

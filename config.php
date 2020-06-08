<?php

if (!session_id()) {
    session_start();
}
return $config = [
    //Location where to redirect users once they authenticate with a provider
    'callback' => 'http://localhost/SNL/index.php',
    //Providers specifics
    'facebook' => [
        'app_id' => '173467900711404',
        'app_secret' => '6fca77af9889374fa41beaf17e900281',
        'default_graph_version' => 'v7.0',
        'callback' => 'http://localhost/snlapi/index.php'
    ],
    'google' => [
        'app_id' => '964615641200-bc6aakj87l295etqlmgieeqnhv5tmf0k.apps.googleusercontent.com',
        'app_secret' => 'QeQLgQ-xZiguFWL-EzKBgbfb',
        'callback' => 'http://localhost/SNL/?provider=google'

    ]

];
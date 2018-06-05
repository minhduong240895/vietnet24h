<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.yandex.com'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' =>  env('MAIL_FROM','robot@mydomain.combroadcast@xzone.work'),
        'name' =>  env('MAIL_NAME','Xzone Boardcast System'),
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
    'username' => env('MAIL_USERNAME','broadcast@xzone.work'),
    'password' => env('MAIL_PASSWORD','?yS#UwPJm&32/(UF'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
];
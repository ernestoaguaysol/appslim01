<?php

$base = __DIR__.'/../app/';

$folders = [
    'lib',
    'model',
    'middleware',
    'validation',
    'route',
];

foreach ($folders as $f) {
    # code...
    foreach (glob($base,"$f/*.php") as $k => $filename) {
        # code...
        require $filename;
    }
}
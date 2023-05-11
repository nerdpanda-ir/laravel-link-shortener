<?php
return [
    'log' => env('log_queries',true) ,
    'console_display' => env('DISPLAY_EXECUTED_QUERY_ON_CONSOLE' , false) ,
    'web_display' => env('DISPLAY_EXECUTED_QUERY_ON_WEB', false) ,
];

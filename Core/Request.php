<?php
namespace Core;
// Protège les variables
class Request{

    private function __construct(){}

        public static $body;
        public static $params;
    
}

Request::$body = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); //TODO
Request::$params = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING); //TODO
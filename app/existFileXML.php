<?php

if (!function_exists('existFileXML')) {

    function existFileXML()
    {

        $urlPath = 'C:\xampp\htdocs\reto-api\public\subscribers.xml';
        if (file_exists($urlPath)) {
            return simplexml_load_file($urlPath);
            //Comprobar que existe el fichero xml
        } else {
            return false;
        }
    }
}

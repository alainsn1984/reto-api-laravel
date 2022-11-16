<?php


if (!function_exists('existFileXML')) {

    function existFileXML()
    {

        $urlPath = 'C:\xampp\htdocs\reto-api\public\subscribers.xml';
        if (file_exists($urlPath)) {
            $valor = simplexml_load_file($urlPath);
            return $valor;
            //Comprobar que existe el fichero xml
        } else {
            return false;
        }
    }
}

if (!function_exists('subscriptionsUser')) {

    function subscriptionsUser($uid)
    {
        $subscriptor = existFileXML();

        if (!$subscriptor) {
            exit('Error, there is a problem with a xml file');
        }
        $result = [];
        $count = 0;
        //looking for all subscriptiones
        foreach ($subscriptor->children() as $children) {
            if ($children->user == $uid) {
                $start = new DateTime($children->start);
                $stop = new DateTime($children->stop);
                $diferent = $start->diff($stop);
                $user['type'] = 'abbo-' . $diferent->format('%a');
                $user['start'] = $start->format('Y-m-d');
                $user['end'] = $stop->format('Y-m-d');
                $result[$count] = $user;
                $count++;
            }
        }
        if (count($result) == 0) {
            return response('There is no abbonamento for this user');
        }
        return response($result);
    }
}

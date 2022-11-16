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
        $user = [];
        $arrSubscritors = existFileXML();
        foreach ($arrSubscritors->children() as $children) {
            if ($children->user == $uid) {
                $start = new DateTime($children->start);
                $stop = $children->stop;
                $diferent = $start->diff($stop);
                $user['type'] = 'abbo-' . $diferent->format('%a');
                $user['start'] = $start;
                $user['end'] = $stop;
                # code...
            }
        }
        return $user;
    }
}

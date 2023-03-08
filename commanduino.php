<?php
    /*function strikeOpen(){ //Opens only the strike.
        $status = 'A';
        $url = "http://192.168.1.177/?status=".$status; // IP address of the Arduino board
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
    };
    function doorOpen(){ //Opens both the strike and the door.
        $status = 'B';
        $url = "http://192.168.1.177/?status=".$status; // IP address of the Arduino board
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
    };*/
    function doorControl($ORDER){
        $url = "http://192.168.1.177/?status=".$ORDER; // IP address of the Arduino board
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
    };
?>

<?php
    include_once('php_serial.class.php');

    function init(){

    }
    function strikeOpen(){
        $serial = new phpSerial;
        $serial->deviceSet("COM1");
        $serial->deviceOpen();
        $serial->sendMessage('1');
        $serial->deviceClose();
        /*
        if(!$fp = fopen("/dev/serial", "w")){
            echo("Impossible de communiquer avec la carte Arduino.");
        }
        else{
            fwrite($fp, true);
            sleep(2);
            fwrite($fp, false);
            fclose($fp);
        };
        */
    };
    function doorOpen(){
        
    };
?>

<?php
    function strikeOpen(){
        if(!$fp = fopen("/dev/ttyUSB0", "w")){
            echo("Impossible de communiquer avec la carte Arduino.");
        }
        else{
            fwrite($fp, true);
            sleep(2);
            fwrite($fp, false);
            fclose($fp);
        };
    };
    function doorOpen(){
        
    };
?>

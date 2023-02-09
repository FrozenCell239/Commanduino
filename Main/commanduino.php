<?php
    function strikeOpen(){
        if(!$fp = fopen("/dev/serial", "w")){
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

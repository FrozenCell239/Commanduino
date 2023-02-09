<?php
    function strikeOpen(){
        $fp = fopen("/dev/ttyUSB0", "w");
        fwrite($fp, true);
        sleep(2);
        fwrite($fp, false);
        fclose($fp);
    };
    function doorOpen(){
        
    };
?>
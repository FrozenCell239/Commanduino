<?php
    function strikeOpen(){ //Sends the order to command only the strike.
        $fp = fopen("/dev/ttyACM0", "wb+"); //"/dev/ttyACM0" is the path of your Arduino board on Debian-based Linux distros.
        if(!$fp){
            echo "Error: impossible to dial with Arduino board !";
        }
        else{
            fwrite($fp, '1');
            fclose($fp); //That's better to close the connection once the order is sent.
        };
    };
    function doorOpen(){ //Sends the order to command both the strike and the door.
        $fp = fopen("/dev/ttyACM0", "wb+");
        if(!$fp){
            echo "Error: impossible to dial with Arduino board !";
        }
        else{
            fwrite($fp, '2');
            fclose($fp);
        };
    };
?>

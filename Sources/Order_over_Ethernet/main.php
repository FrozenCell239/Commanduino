<html lang="en">
    <head>
        <!--Character encoding type declaration.-->
        <meta charset="utf-8">

        <!--Style sheets.-->
        <link rel="stylesheet" href="style.css"> <!--Customised style sheet.-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> <!--Bootstrap 5 (v5.2.3).-->

        <!--JS scripts.-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

        <!--PHP scripts.-->
        <?php
            function doorControl($ORDER){ //Sends the order to command only the strike.
                if($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)){
                    $udp_port = 8888;
                    $arduino_ip = '192.168.1.177';
                    socket_sendto($socket, $ORDER, strlen($ORDER), 0, $arduino_ip, $udp_port);
                    //socket_recvfrom($socket, $udp_buffer, 64, 0, $arduino_ip, $udp_port); //Uncomment this line and the following one if you want to get a response from the Arduino board.
                    //echo "Acknowledgement : $udp_buffer<br>";
                    sleep(1);
                }
                else{echo("Can't create socket.<br>");}; //Happens only if the socket haven't been created for some reason.
            };
        ?>

        <!--Others.-->
        <title>Arduino command panel</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.png"> <!--Favicon.-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Permet l'adaptation de la page et la disposition de ses éléments à tous les terminaux.-->
    </head>
    <body>
        <header>
            
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1>Let's test !</h1>
                        <hr>
                        <form action="main.php" method="post">
                            <button type="submit" name="door_unlock">Unlock the door.</button>
                        </form>
                        <form action="main.php" method="post">
                            <button type="submit" name="door_open">Open the door.</button>
                        </form>
                        <?php
	                    	if(isset($_POST['door_unlock'])){
                                doorControl('$');
	                    	};
                            if(isset($_POST['door_open'])){
                                doorControl('#');
	                    	};
                            $_POST = array();
	                    ?>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            
        </footer>
    </body>
</html>

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
        <?php include('commanduino.php'); ?>

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
                                strikeOpen();
                                unset($_POST['door_unlock']);
	                    	};
                            if(isset($_POST['door_open'])){
                                doorOpen();
                                unset($_POST['door_open']);
	                    	};
	                    ?>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            
        </footer>
    </body>
</html>

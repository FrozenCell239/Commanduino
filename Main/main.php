<html lang="fr">
    <head>
        <!--Character encoding type declaration.-->
        <meta charset="utf-8">

        <!--Style sheets.-->
        <link rel="stylesheet" href="global.css"> <!--Customised style sheet.-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> <!--Bootstrap 5 (v5.2.3).-->

        <!--JS scripts.-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

        <!--PHP scripts.-->
        <?php
            include('server.php');
	    if(!isset($_SERVER['username'])){header("Location: index.php");};
            if($_SESSION['profession'] == "secretaire"){include_once('commanduino.php');};
        ?>

        <!--Others.-->
        <title>Tableau de bord</title>
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
                        <h1>Connecté(e) en tant que <b><?php echo $_SESSION['name']; echo " "; echo $_SESSION['last_name']; ?></b>, poste <?php echo $_SESSION['profession']; ?>.</h1>
                        <hr>
                        <?php if($_SESSION['profession'] == "secretaire"){ //Interface propre à la secrétaire ?>
                        <form action="main.php" method="post">
                            <button type="submit" name="door_unlock">Déverrouiller la porte.</button>
                        </form>
                        <?php
                            };
	                    	if(isset($_POST['door_unlock'])){
                                strikeOpen();
                                unset($_POST['door_unlock']);
	                    	};
	                    ?>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <center>
                <form action="logout.php" method="post">
                    <button type="submit">Se déconnecter.</button>
                </form>
            </center>
        </footer>
    </body>
</html>

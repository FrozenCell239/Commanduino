<!DOCTYPE html>
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
        ?>

        <!--Others.-->
        <title>Connexion</title>
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
                        <h1>Veuillez vous authentifier.</h1>
                        <form action="index.php" method="post">
                            <input type="text" name="login" placeholder="Login" required>
                            <input type="password" name="psswrd" placeholder="Mot de passe" required>
                            <button type="submit">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            
        </footer>
    </body>
</html>
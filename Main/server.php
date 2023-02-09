<?php
	session_start(); //Start session.

	$errors = array(); //Used to collect errors if some happen.
	$conn = mysqli_connect('localhost:3307', 'root', '', 'cabinet'); //Connection to the database on a Windows computer.
	//$conn = mysqli_connect('mariadb', 'root', 'root', 'cabinet'); //Connection to the database on a Debian server.
	
	# Registration
	if(isset($_POST['register'])){
	    $email = $_POST['email'];
	    $username = $_POST['username'];
	    $password1 = md5($_POST['password1']);
	    $password2 = md5($_POST['password2']);
	    $class = $_POST['class'];

	    if(empty(strpos($email, "@"))){ //Check if email is entered.
	        array_push($errors, "Email required");
	    };

	    if(empty($username)){ //Check if username is entered.
	      	array_push($errors, "Username required");
	    };

	    // Check if password is entered
	    if(empty($password1)){
	      	array_push($errors, "Password required");
	    };

	    // check if passwords match
	    if($password1 != $password2){
	      	array_push($errors, "Passwords do not match");
	    };

	    // Check if class is entered
	    if(empty($class)){
	      	array_push($errors, "Class required");
	    };

	    // Check if email exist
	    $email_check = "SELECT id FROM users WHERE email='$email'";
	    $email_result = mysqli_query($conn, $email_check);

	    if(mysqli_num_rows($email_result) != 0){
	      	array_push($errors, "Email already taken");
	    };

	    // Check if user exist
	    $user_check = "SELECT id FROM users WHERE username='$username'";
	    $user_result = mysqli_query($conn, $user_check);

	    if(mysqli_num_rows($user_result) != 0){
	      	array_push($errors, "Username already taken");
	    };

	    // If no errors, register & login
	    if(count($errors) == 0){
	      	$insert = "INSERT INTO users (email, username, password, class) VALUES ('$email', '$username', '$password1', '$class')"; //Ajouter encryption MD5.
	      	$insert_result = mysqli_query($conn, $insert);

	      	header("Refresh: 3; url=index.php");
	    }
		else{ //Else show errors.
	      	echo "<pre>";
	      	print_r($errors);
	      	echo "</pre>";
	    };
	};

	# Login
	if(isset($_POST['login'])){ //Check if Login button is pressed.
	    $username = $_POST['login'];
	    $password = md5($_POST['psswrd']);

	    if(empty($username)){ //Checking if username is entered.
	        array_push($errors, "Username required.");
	    };
	    if(empty($password)){ //Checking if password is entered.
	        array_push($errors, "Password required.");
	    };
	    if(count($errors) == 0){ //If no errors, then log in.
	        $login_query = "SELECT identifiant, profession, nom_personnel, prenom_personnel FROM personnel WHERE identifiant='$username' AND mot_de_passe='$password';";
	        $login_query_result = mysqli_query($conn, $login_query);
	        $select_row = mysqli_fetch_array($login_query_result, MYSQLI_ASSOC);

	        if(mysqli_num_rows($login_query_result) > 0){
	            $_SESSION['username'] = $select_row['identifiant'];
	            $_SESSION['profession'] = $select_row['profession'];
				$_SESSION['name'] = $select_row['prenom_personnel'];
				$_SESSION['last_name'] = $select_row['nom_personnel'];
	            header("Refresh: 0; url=main.php");
	        }
	        else{
				//array_push($errors, "Username or password incorrect");
				?>
				<script>
					alert("Incorrect username or password.");
				</script>
				<?php
	        };
	    };
	};
?>
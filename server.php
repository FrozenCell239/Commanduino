<?php
	session_start();

	$errors = array(); //Used to collect errors if some happen.
	$conn = mysqli_connect('localhost', 'phpmyadmin', 'phpmyadmin', 'cabinet');
	
	# Registration {TOUT À REVOIR !!!}
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
	    if(empty($password1)){ //Check if password is entered.
	      	array_push($errors, "Password required");
	    };
	    if($password1 != $password2){ //Check if passwords match.
	      	array_push($errors, "Passwords do not match");
	    };
	    if(empty($class)){ //Check if class is entered.
	      	array_push($errors, "Class required");
	    };
	    $email_check = "SELECT id FROM users WHERE email='$email'";
	    $email_result = mysqli_query($conn, $email_check);
	    if(mysqli_num_rows($email_result) != 0){ //Check if email exist.
	      	array_push($errors, "Email already taken");
	    };
	    $user_check = "SELECT id FROM users WHERE username='$username'";
	    $user_result = mysqli_query($conn, $user_check);
	    if(mysqli_num_rows($user_result) != 0){ //Check if user exist.
	      	array_push($errors, "Username already taken");
	    };
	    if(count($errors) == 0){ //If no errors, register & login.
	      	$insert = "INSERT INTO users (email, username, password, class) VALUES ('$email', '$username', '$password1', '$class')"; //Ajouter encryption MD5.
	      	$insert_result = mysqli_query($conn, $insert);

	      	header("Refresh: 3; url=index.php");
	    }
		else{ //Else show errors.
	      	echo "<pre>";			//
	      	print_r($errors);		//
	      	echo "</pre>";			//
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
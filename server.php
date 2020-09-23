<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$Nume    = "";
	$Prenume    = "";
	$Email    = "";
	$Sex    = "";
	$Telefon    = "";
	$Tara    = "";
	$Oras    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'formula1');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$Nume = mysqli_real_escape_string($db, $_POST['Nume']);
		$Prenume = mysqli_real_escape_string($db, $_POST['Prenume']);
		$Email = mysqli_real_escape_string($db, $_POST['Email']);
		$Sex = mysqli_real_escape_string($db, $_POST['Sex']);
		$Telefon = mysqli_real_escape_string($db, $_POST['Telefon']);
		$Tara = mysqli_real_escape_string($db, $_POST['Tara']);
		$Oras = mysqli_real_escape_string($db, $_POST['Oras']);
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = $password_1;
			$query = "INSERT INTO user_acc (username, password) 
					  VALUES('$username', '$password')";
			mysqli_query($db, $query);
			if($Telefon == "" and $Oras != "" and $Tara != ""){
			$query1 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Sex,Tara,Oras) 
					  VALUES('$Nume', '$Prenume', '$Email', '$Sex', '$Tara', '$Oras')";
			mysqli_query($db,$query1);}
			else
			if($Tara == "" and $Oras != "" and $Telefon !=""){
			$query2 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Telefon,Sex,Oras) 
					  VALUES('$Nume', '$Prenume', '$Email', '$Telefon', '$Sex', '$Oras')";
			mysqli_query($db, $query2);}
			else
			if($Oras == "" and $Telefon != "" and $Tara != ""){
			$query3 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Telefon,Sex,Tara) 
					  VALUES('$Nume', '$Prenume', '$Email', '$Telefon', '$Sex', '$Tara')";
			mysqli_query($db, $query3);}
			else
			if($Telefon == "" and $Oras == "" and $Tara != ""){
			$query4 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Sex,Tara) 
					  VALUES('$Nume', '$Prenume', '$Email', '$Sex', '$Tara')";
			mysqli_query($db, $query4);}
			else
			if($Telefon == "" and $Tara == "" and $Oras != ""){
			$query5 = "INSERT INTO user_profile1 (Nume, Prenume, Email,SexOras) 
					  VALUES('$Nume', '$Prenume', '$Email',, '$Sex', '$Oras')";
			mysqli_query($db, $query5);}
			else
			if($Tara == "" and $Oras == "" and $Telefon != ""){
			$query6 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Telefon,Sex) 
					  VALUES('$Nume', '$Prenume', '$Email', '$Telefon', '$Sex')";
			mysqli_query($db, $query6);}
			else
			if($Telefon == "" and $Tara == "" and $Oras == ""){
			$query7 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Sex) 
					  VALUES('$Nume', '$Prenume', '$Email','$Sex')";
			mysqli_query($db, $query7);}
			else{
			$query8 = "INSERT INTO user_profile1 (Nume, Prenume, Email,Telefon,Sex,Tara,Oras) 
					  VALUES('$Nume', '$Prenume', '$Email', '$Telefon', '$Sex', '$Tara', '$Oras')";
			mysqli_query($db, $query8);}

			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}


	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = $password;
			$query = "SELECT * FROM user_acc WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
				
			
		
		}
	}
	
	

?>
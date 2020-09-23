<?php 
	session_start(); 
	
	//connect to mysql database
	$db = mysqli_connect('localhost', 'root', '', 'formula1');

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	
	$us = $_SESSION['username'];			//am preluat username-ul utilizatorului conectat
	$query = "SELECT id FROM user_acc WHERE username='$us'";	//am aflat id-ul user-ului conectat
	$result = mysqli_query($db, $query);
	if($result)
	{
	if(mysqli_num_rows($result))
	{
	while($rows = mysqli_fetch_array($result))
	{
	$isadmin = $rows['id'];		//am prealuat id-ul user-ului conectat
	}							// voi considera user-ul cu id=33 administrator
	}else{
	echo("No data are available!");	
	}
	} else{
	echo("Result error");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>The official home of Formula 1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 
	
	<div class="header">
		
		<h2><a href="index.html"><img src="images/f1.png"></a> SET NO LIMITS, <br><p style="font-size:35px;">STOP AT NOTHING</br></h2>

</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p> <a href="races.php" style="color: Black;">USERNAME:</a> <strong><?php echo $_SESSION['username']; ?></strong></p>
			<br>
			Adauga/Sterge/Editeaza</br>
			<p> <a href="races.php" style="color: red;">Detalii despre curse</a> </p>
			<p> <a href="driver.php" style="color: red;">Detalii despre un pilot</a> </p>
			<p> <a href="tickets.php" style="color: red;">Detalii despre un bilet in tribuna unei curse</a> </p>
			<br>
			<br>Cauta 🏎️</br>
			<p> <a href="find1.php" style="color: red;">Pilotul tau</a> </p>
			<p> <a href="find2.php" style="color: red;">Cursa ta</a> </p>
			<p> <a href="find4.php" style="color: red;">Biletul tau</a> </p>
			<br>Cauta(Suplimentar)</br>
			<p> <a href="find3.php" style="color: red;">Cauta cine a participa la o anumita cursa</a> </p>
			<p> <a href="find5.php" style="color: red;">Cauta la ce cursa a participat un anumit pilot</a> </p>
			<p> <a href="find6.php" style="color: red;">Cauta detalii despre echipa unui anumit pilot</a> </p>
		
			<!-- verific daca user-ul conectat este administratorul -->
			<?php if ($isadmin == 33) : ?>
			<br>ADMIN 😈 </br>
			<p> <a href="sel1.php" style="color: red;">Vezi ce utilizatori apartin oraselor in care sunt curse</p>
			<p> <a href="sel2.php" style="color: black;">Vezi ce utilizatori au introdus date</p>
			<p> <a href="sel3.php" style="color: red;">Vezi detalii despre toti utilizatorii</a> </p>
			<p> <a href="sel4.php" style="color: black;">Vezi cine a adugat curse in trecut</a> </p>
			<br>
			<?php endif; ?>
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>
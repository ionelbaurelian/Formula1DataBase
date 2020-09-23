<!doctype html>

<?php
// variable declaration
$info="";	//valoarea introdusa de utilizator din interfata
			//va fi folosita in clauza WHERE a interogarii

$link = mysqli_connect("localhost", "root", "", "formula1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['search'])){
$info =$_POST['info'];
 
// Attempt select query execution
$sql = "SELECT ID_ticket, Race_ticket, Country_ticket,  Price_ticket  FROM `tickets`  WHERE tickets.race_ticket='$info'" ;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		echo" <br>";
		echo "<br>";
		echo" <br>";
		echo "<br>";
		//design-ul tabelului 
		echo'<div align="center" style="vertical-align:bottom">';
		echo'<div align="center" style="vertical-align:bottom">';
		echo '<style>
				table {
					border-collapse: collapse;
				}
				th, td {
					border: 1px solid #ccc;
					padding: 10px;
					text-align: left;
				}
				tr:nth-child(even) {
					background-color: #eee;
				}
				tr:nth-child(odd) {
					background-color: #fff;
				}            
			</style>';
		        echo "<table>";
            echo "<tr>";
                echo "<th>ID_bilet</th>";
                echo "<th>Numele Cursei</th>";
                echo "<th>Tara de desfasurare</th>";
				echo "<th>Pretul biletului</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['ID_ticket'] . "</td>";
                echo "<td>" . $row['Race_ticket'] . "</td>";
                echo "<td>" . $row['Country_ticket'] . "</td>";
				echo "<td>" . $row['Price_ticket'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
		echo" <br>";
		echo "<br>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>

<html>
<head>
<title>Cauta un bilet</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
		<center> <h3> Gaseste biletul la cursa dorita! </h3></center>	
		<form method ="post" action="find4.php">
		<label>Introduceti:</label><br>
		<input type="varchar" name="info" placeholder="Numele cursei" value="<?php echo($info);?>"><br><br>
		<div>
		<input type="submit" name="search" value="Cauta">
		</div
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
</body>
</html>

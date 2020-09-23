<!doctype html>

<?php
// variable declaration
$info="";	//preia valoarea introdusa de utilizator din interfata
			//va fi folosita in clauza WHERE a interogarii

$link = mysqli_connect("localhost", "root", "", "formula1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['search'])){
$info =$_POST['info'];
 
// Attempt select query execution
$sql = "SELECT Nume, Prenume, Echipa, Puncte FROM `driver` JOIN `date_curse` ON date_curse.ID_date=driver.cursa WHERE driver.cursa='$info'" ;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		echo" <br>";
		echo "<br>";
		echo" <br>";
		echo "<br>";
		//design-ul tabelului in care se vor afisa datele rezultate in urma interogarii
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
                echo "<th>Nume</th>";
                echo "<th>Prenume</th>";
				echo "<th>Echipa</th>";
                echo "<th>Puncte</th>";
				
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Nume'] . "</td>";
                echo "<td>" . $row['Prenume'] . "</td>";
				echo "<td>" . $row['Echipa'] . "</td>";
                echo "<td>" . $row['Puncte'] . "</td>";
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
<title>FORMULA ONE</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
		<center> <h3> Cauta ce piloti au luat parte la o anumita cursa </h3></center>
		<form method ="post" action="find3.php">
		<label>Introduceti </label><br>
		<input type="int" name="info" placeholder="Numarul cursei" value="<?php echo($info);?>"><br><br>
		<div>
		<input type="submit" name="search" value="Cauta">
		</div
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
</body>
</html>

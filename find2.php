<!doctype html>

<?php
// variable declaration
$info="";	//variabila introdusa de utilizator
			//va fi folosita in clauza WHERE a interogarii

$link = mysqli_connect("localhost", "root", "", "formula1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['search'])){
$info =$_POST['info'];
 
// Attempt select query execution
$sql = "SELECT ID_race, Race_name, Race_country, Race_date, Cursa  FROM `races`WHERE races.race_country='$info'" ;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		//design-ul tabelului in care se afiseaza datele rezultate
		echo" <br>";
		echo "<br>";
		echo" <br>";
		echo "<br>";
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
                echo "<th>ID_cursa</th>";
                echo "<th>Numere cursei</th>";
				echo "<th>Tara</th>";
				echo "<th>Data desfasurarii</th>";
				echo "<th>Numarul cursei</th>";
				
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['ID_race'] . "</td>";
                echo "<td>" . $row['Race_name'] . "</td>";
				echo "<td>" . $row['Race_country'] . "</td>";
				echo "<td>" . $row['Race_date'] . "</td>";
				echo "<td>" . $row['Cursa'] . "</td>";
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
<title>Cauta o cursa</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
		<center> <h3> Cauta o anumita cursa dupa tara</h3></center>
		<form method ="post" action="find2.php">
		<label>Introduceti: </label><br>
		<input type="varchar" name="info" placeholder="Tara in care sa fie cursa" value="<?php echo($info);?>"><br><br>
		<div>
		<input type="submit" name="search" value="Cauta">
		</div
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
</body>
</html>

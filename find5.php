<!doctype html>

<?php
// variable declaration
$info="";	//valoarea pe care utilizatorul o introduce din interfata
			//va fi folosita in clauza WHERE a interogarii

$link = mysqli_connect("localhost", "root", "", "formula1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['search'])){
$info =$_POST['info'];
 
// Attempt select query execution
$sql = "SELECT Data, Race_name , Race_country FROM `date_curse` JOIN `driver` ON date_curse.ID_date=driver.cursa WHERE driver.nume='$info'" ;
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
			echo "<th>Data</th>";
			echo "<th>Numele cursei </th>";
			echo "<th>Tara </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Data'] . "</td>";
                echo "<td>" . $row['Race_name'] . "</td>";
		echo "<td>" . $row['Race_country'] . "</td>";
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
		<center> <h3> Cauta la ce curse a participat un anumit pilot </h3></center>
		<form method ="post" action="find5.php">
		<label>Introduceti Numele Pilotului:</label><br>
		<input type="varchar" name="info" placeholder="Numele Pilotului" value="<?php echo($info);?>"><br><br>
		<div>
		<input type="submit" name="search" value="Cauta">
		</div
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
</body>
</html>

<?php

$link = mysqli_connect("localhost", "root", "", "formula1");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
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
$sql = "SELECT Data, Race_name, Race_country FROM date_curse WHERE ID_user IN (SELECT ID_user='$info' FROM user_profile1 )" ;
echo '<center> <h3> Curse din trecut: </h3></center>';
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		// design-ul tabelului
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
                echo "<th>Race Name</th>";
                echo "<th>Race Country</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Data'] . "</td>";
                echo "<td>" . $row['Race_name'] . "</td>";
                echo "<td>" . $row['Race_country'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
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
		<center> <h3> Cine a adugat curse in trecut: </h3></center>
		<form method ="post" action="sel4.php">
		<label>Curse vechi</label><br>
		<input type="varchar" name="info" placeholder="Dati ID_user-ul unui utilizator" value="<?php echo($info);?>"><br><br>
		<div>
		<input type="submit" name="search" value="Cauta">
		</div
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
</body>
</html>
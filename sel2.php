<?php

$link = mysqli_connect("localhost", "root", "", "formula1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT Nume , Prenume, Tara, Oras FROM user_profile1 WHERE ID_user NOT IN ( SELECT ID_user FROM date_curse) ORDER BY Nume" ;
echo '<center> <h3> Utilizatori ce nu au introdus date: </h3></center>';
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
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
				echo "<th>Tara</th>";
                echo "<th>Oras</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Nume'] . "</td>";
                echo "<td>" . $row['Prenume'] . "</td>";
				echo "<td>" . $row['Tara'] . "</td>";
                echo "<td>" . $row['Oras'] . "</td>";
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

?>
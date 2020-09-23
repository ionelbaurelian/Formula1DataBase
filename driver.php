<!doctype html>
<?php
session_start();
// variable declaration
$ID_driver="";
$Nume="";
$Prenume="";
$Echipa="";
$Puncte="";
$Cursa="";
 
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
$db = mysqli_connect('localhost', 'root', '', 'formula1');

//get data from the form
function getData()
{
$data = array();
$data[0]=$_POST['ID_driver'];
$data[1]=$_POST['Nume'];
$data[2]=$_POST['Prenume'];
$data[3]=$_POST['Echipa'];
$data[4]=$_POST['Puncte'];
$data[5]=$_POST['Cursa'];
return $data;
}

//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM driver WHERE ID_driver='$info[0]' OR Nume = '$info[1]' OR Prenume='$info[2]' OR Echipa='$info[3]' OR Puncte='$info[4]'";
$search_result=mysqli_query($db, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ID_driver = $rows['ID_driver'];
$Nume = $rows['Nume'];
$Prenume = $rows['Prenume'];
$Echipa = $rows['Echipa'];
$Puncte = $rows['Puncte'];
$Cursa = $rows['Cursa'];
}
}else{
echo("No data are available!");
}
} else{
echo("Result error");
}
 
}

//insert
if(isset($_POST['insert'])){
$info = getData();
// verificam daca toate campurile au fost completate
if($info[4]=="" and $info[2]!="" and $info[3]!="")
	$insert_query="INSERT INTO driver (Nume, Prenume, Echipa, Cursa) VALUES ('$info[1]','$info[2]','$info[3]', '$info[5]')";
else
if($info[3]=="" and $info[2]!="" and $info[4]!="")
	$insert_query="INSERT INTO driver (Nume, Prenume, Puncte, Cursa) VALUES ('$info[1]','$info[2]', '$info[4]', '$info[5]')";
else
if($info[2]=="" and $info[4]!="" and $info[3]!="")
	$insert_query="INSERT INTO driver (Nume, Echipa, Puncte, Cursa) VALUES ('$info[1]','$info[3]', '$info[4]', '$info[5]')";
else
if($info[2]=="" and $info[3]=="" and $info[4]!="")
	$insert_query="INSERT INTO driver (Nume, Puncte, Cursa) VALUES ('$info[1]', '$info[4]', '$info[5]')";
else
if($info[2]=="" and $info[4]=="" and $info[3]!="")
	$insert_query="INSERT INTO driver (Nume, Echipa, Cursa) VALUES ('$info[1]','$info[3]', '$info[5]')";
else
if($info[3]=="" and $info[4]=="" and $info[3]!="")
	$insert_query="INSERT INTO driver (Nume, Prenume, Cursa) VALUES ('$info[1]','$info[2]', '$info[5]')";
else
if($info[2]=="" and $info[3]="" and $info[4]=="")
	$insert_query="INSERT INTO driver (Nume, Cursa) VALUES ('$info[1]', '$info[5]')";
else
	$insert_query="INSERT INTO driver (Nume, Prenume, Echipa, Puncte, Cursa) VALUES ('$info[1]','$info[2]','$info[3]', '$info[4]', '$info[5]')";
try{
$insert_result=mysqli_query($db, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($db)>0){
echo("Data inserted successfully!");
 
}else{
echo("Data are not inserted!");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}

//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM driver WHERE ID_driver = '$info[0]'";
try{
$delete_result = mysqli_query($db, $delete_query);
if($delete_result){
if(mysqli_affected_rows($db)>0)
{
echo("Data deleted!");
}else{
echo("Data not deleted!");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
}
}

//update
if(isset($_POST['update'])){
$info = getData();
//verificam daca toate campurilor au fost completate in vederea editarii
if($info[1]!="" ){
	$update_query1="UPDATE driver SET  Nume='$info[1]' WHERE ID_driver = '$info[0]'";
	try{
	$update_result=mysqli_query($db, $update_query1);
	if($update_result){
	if(mysqli_affected_rows($db)>0){
	echo("Data updated!");
	}else{
	echo("Data not updated!");
	}
	}
	}catch(Exception $ex){
	echo("error in update".$ex->getMessage());
	}
	}
	
if($info[2]!="" ){
	$update_query2="UPDATE driver SET  Prenume='$info[2]' WHERE ID_driver = '$info[0]'";
	try{
	$update_result=mysqli_query($db, $update_query2);
	if($update_result){
	if(mysqli_affected_rows($db)>0){
	echo("Data updated!");
	}else{
	echo("Data not updated!");
	}
	}
	}catch(Exception $ex){
	echo("error in update".$ex->getMessage());
	}
	}	

if($info[3]!="" ){
	$update_query3="UPDATE driver SET  Echipa='$info[3]' WHERE ID_driver = '$info[0]'";
	try{
	$update_result=mysqli_query($db, $update_query3);
	if($update_result){
	if(mysqli_affected_rows($db)>0){
	echo("Data updated!");
	}else{
	echo("Data not updated!");
	}
	}
	}catch(Exception $ex){
	echo("error in update".$ex->getMessage());
	}
	}

if($info[4]!="" ){
	$update_query4="UPDATE driver SET  Puncte='$info[4]' WHERE ID_driver = '$info[0]'";
	try{
	$update_result=mysqli_query($db, $update_query4);
	if($update_result){
	if(mysqli_affected_rows($db)>0){
	echo("Data updated!");
	}else{
	echo("Data not updated!");
	}
	}
	}catch(Exception $ex){
	echo("error in update".$ex->getMessage());
	}
	}
	
if($info[5]!="" ){
	$update_query5="UPDATE driver SET  Cursa='$info[5]' WHERE ID_driver = '$info[0]'";
	try{
	$update_result=mysqli_query($db, $update_query5);
	if($update_result){
	if(mysqli_affected_rows($db)>0){
	echo("Data updated!");
	}else{
	echo("Data not updated!");
	}
	}
	}catch(Exception $ex){
	echo("error in update".$ex->getMessage());
	}
	}
}

?>



<html>
<head>
<title>Piloti</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<form method ="post" action="driver.php">

<center> <h1> Piloti F1</h1></center><br>
<input type="number" name="ID_driver" placeholder="ID driver" value="<?php echo($ID_driver);?>"><br><br>
<label>Numele pilotului*</label><br>
<input type="text" name="Nume" placeholder="Nume" value="<?php echo($Nume);?>"><br><br>
<label>Prenumele pilotului*</label><br>
<input type="text" name="Prenume" placeholder="Prenume" value="<?php echo($Prenume);?>"><br><br>
<label>Echipa din care face parte*</label><br>
<input type="text" name="Echipa" placeholder="Echipa" value="<?php echo($Echipa);?>"><br><br>
<label>Puncte*</label><br>
<input type="text" name="Puncte" placeholder="Puncte" value="<?php echo($Puncte);?>"><br><br>
<label>Numarul cursei la care participa*</label><br>
<input type="number" name="Cursa" placeholder="Cursa" value="<?php echo($Cursa);?>"><br><br>
<div>
<input type="submit" name="insert" value="Adauga">
<input type="submit" name="delete" value="Sterge">
<input type="submit" name="update" value="Editeaza">
<input type="submit" name="search" value="Gaseste">
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
 <br> <br>
 *Campuri obligatorii
</div>
</form>
</body>
</html>
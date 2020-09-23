<!doctype html>
<?php
session_start();
// variable declaration
$ID_race="";
$Race_name="";
$Race_country="";
$Race_date="";
$Cursa="";
 
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
$db = mysqli_connect('localhost', 'root', '', 'formula1');

//get data from the form
function getData()
{
$data = array();
$data[0]=$_POST['ID_race'];
$data[1]=$_POST['Race_name'];
$data[2]=$_POST['Race_country'];
$data[3]=$_POST['Race_date'];
$data[4]=$_POST['Cursa'];
return $data;
}

//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM races WHERE ID_race='$info[0]' OR Race_name = '$info[1]' OR Race_country='$info[2]' OR Race_date='$info[3]' OR Cursa='$info[4]'";
$search_result=mysqli_query($db, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ID_race = $rows['ID_race'];
$Race_name= $rows['Race_name'];
$Race_country = $rows['Race_country'];
$Race_date = $rows['Race_date'];
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

$insert_query="INSERT INTO races (Race_name, Race_country, Race_date, Cursa) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]')";
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
$delete_query = "DELETE FROM races WHERE ID_race = '$info[0]'";
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

if($info[1]!="" ){
	$update_query1="UPDATE races SET Race_name='$info[1]' WHERE ID_race = '$info[0]'";
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
	// verificam daca au fost completate toate campurile in vederea editarii
	if($info[2]!="" ){
	$update_query2="UPDATE races SET Race_country='$info[2]' WHERE ID_race = '$info[0]'";
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
	$update_query3="UPDATE races SET Race_date='$info[3]' WHERE ID_race = '$info[0]'";
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
	$update_query4="UPDATE races SET Cursa='$info[4]' WHERE ID_race = '$info[0]'";
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
}

?>


<html>
<head>
<title>Curse</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<form method ="post" action="races.php">
<center> <h1> Curse F1 </h1></center><br>
<input type="number" name="ID_race" placeholder="ID Cursa" value="<?php echo($ID_race);?>"><br><br>
<label>Nume Cursa*</label><br>
<input type="text" name="Race_name" placeholder="Denumire" value="<?php echo($Race_name);?>"><br><br>
<label>Tara desfasurare*</label><br>
<input type="text" name="Race_country" placeholder="Tara" value="<?php echo($Race_country);?>"><br><br>
<label>Data desfasurarii*</label><br>
<input type="date" name="Race_date" placeholder="Data" value="<?php echo($Race_date);?>"><br><br>
<label>Data ID*</label><br>
<input type="number" name="Cursa" placeholder="ID_user" value="<?php echo($Cursa);?>"><br><br>
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
<!doctype html>
<?php
session_start();
// variable declaration
$ID_ticket="";
$Race_ticket="";
$Country_ticket="";
$Price_ticket="";
 
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
$db = mysqli_connect('localhost', 'root', '', 'formula1');

//get data from the form
function getData()
{
$data = array();
$data[0]=$_POST['ID_ticket'];
$data[1]=$_POST['Race_ticket'];
$data[2]=$_POST['Country_ticket'];
$data[3]=$_POST['Price_ticket'];
return $data;
}

//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM tickets WHERE  ID_ticket='$info[0]' OR Race_ticket = '$info[1]' OR Country_ticket='info[2]' OR Price_ticket='$info[3]'";
$search_result=mysqli_query($db, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ID_ticket = $rows['ID_ticket'];
$Race_ticket = $rows['Race_ticket'];
$Country_ticket = $rows['Country_ticket'];
$Price_ticket = $rows['Price_ticket'];

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
//verificam daca toate campurile au fost completate
if($info[3]=="" and $info[2]!="")
	$insert_query="INSERT INTO tickets (Race_ticket, Country_ticket) VALUES ('$info[1]','$info[2]')";
else
if($info[2]=="" and $info[3]!="")
	$insert_query="INSERT INTO tickets (Race_ticket, Price_ticket) VALUES ('$info[1]','$info[3]')";
else
if($info[3]=="" and $info[2]=="" )
$insert_query="INSERT INTO tickets (Race_ticket) VALUES ('$info[1]')";
else
$insert_query="INSERT INTO tickets (Race_ticket, Country_ticket, Price_ticket) VALUES ('$info[1]','$info[2]','$info[3]')";
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
$delete_query = "DELETE FROM tickets WHERE ID_ticket = '$info[0]'";
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
//verificarea campurilor care au fost introduse pentru a fi editate
if($info[3]=="" and $info[2]!="" and $info[1]=="")
	$update_query="UPDATE tickets SET  Country_ticket='$info[2]' WHERE ID_ticket = '$info[0]'";
else
if($info[2]=="" and $info[3]!="" and $info[1]=="")
	$update_query="UPDATE tickets SET  Price_ticket='$info[3]' WHERE ID_ticket = '$info[0]'";
else
if($info[3]=="" and $info[2]=="" and $info[1]!="")
	$update_query="UPDATE tickets SET Race_ticket='$info[1]' WHERE ID_ticket = '$info[0]'";
else
if($info[1]!="" and $info[2]!="" and $info[3]=="")
	$update_query="UPDATE tickets SET Race_ticket='$info[1]', Country_ticket='$info[2]' WHERE ID_ticket = '$info[0]'";
else
if($info[1]!="" and $info[3]!="" and $info[2]=="")
	$update_query="UPDATE tickets SET Race_ticket='$info[1]', Price_ticket='$info[3]' WHERE ID_ticket = '$info[0]'";
else
if($info[2]!="" and $info[3]!="" and $info[1]=="")
	$update_query="UPDATE tickets SET  Country_ticket='$info[2]', Price_ticket='$info[3]' WHERE ID_ticket = '$info[0]'";
else
$update_query="UPDATE tickets SET Race_ticket='$info[1]', Country_ticket='$info[2]', Price_ticket='$info[3]' WHERE ID_ticket = '$info[0]'";
try{
$update_result=mysqli_query($db, $update_query);
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

?>



<html>
<head>
<title>Bilete</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<form method ="post" action="tickets.php">
<center> <h1> Bilete Curse F1 </h1></center><br>
<input type="number" name="ID_ticket" placeholder="ID Bilet" value="<?php echo($ID_ticket);?>"><br><br>
<label>Nume Cursa*</label><br>
<input type="text" name="Race_ticket" placeholder="Denumire" value="<?php echo($Race_ticket);?>"><br><br>
<label>Tara de desfasurare</label><br>
<input type="text" name="Country_ticket" placeholder="Tara" value="<?php echo($Country_ticket);?>"><br><br>
<label>Pretul biletului</label><br>
<input type="text" name="Price_ticket" placeholder="Pret" value="<?php echo($Price_ticket);?>"><br><br>
<div>
<input type="submit" name="insert" value="Adauga">
<input type="submit" name="delete" value="Sterge">
<input type="submit" name="update" value="Editeaza">
<input type="submit" name="search" value="Cauta">
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>
<br><br>
*Campuri obligatorii
</div>
</form>
</body>
</html>
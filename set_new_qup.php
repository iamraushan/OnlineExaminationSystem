<?php
//this is connection of database
mysql_connect("localhost", "root", "");
mysql_select_db("project_php");
/*$ques = mysqli_connect("localhost", "root", "", "question_paper");
if($link === false || $ques === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}*/
session_start();
 

?>
<style>
#wtcss
{
background-image:url(tail-middle.jpg) ;
background-repeat:no-repeat;
background-position:center;
}
#tab
{
	animation:running;
	padding-left:200px;
}
</style>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Set new Question paper</title>
</head>

<body id="wtcss">
<h1><center>Set New Question Paper</center></h1>
<b><a id="tab" href="admin_sign_in_page.php"><<--Admin</a></b>
<br><br>
<form>
<table id="tab">
<tr><td align="left">Enter New Question Paper Name</td><td><input type="text" name="eqpn" style="width:125px"></td></tr>
<tr><td align="left">Enter Subject Name</td><td><input type="text" name="subject" style="width:125px"></td></tr>

<tr><td colspan="2" align="center"><input type="submit" name="ok" value="Set Paper"  style="width:125px"></td></tr>


</table>
</form>

</body>
<?php
if(isset($_GET['ok']))
{
$qos=$_GET["eqpn"];//getting parameters from admin
$subject=$_GET["subject"];//ditto
$id=$_SESSION['sign_in_admin']['teach_id'];


$query_create = "CREATE TABLE `$qos`(q_no INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, q_name VARCHAR(100) NOT NULL, op1 varchar(10) NOT NULL, op2 varchar(10) NOT NULL, op3 varchar(10) NOT NULL, op4 varchar(10) NOT NULL, cop varchar(10) NOT NULL)";
mysql_select_db("question_paper");
$x=mysql_query($query_create);
if ($x==1){
    echo "Question paper '$qos' created successfully";
	
	
	mysql_select_db("project_php");//changeing the database here
	$query="INSERT INTO `teachvsques`(teach_id,name_qos,subject) VALUES ('$id','$qos','$subject')";
	$x2=mysql_query($query);//need space after comma
	
	if($x2==1)
	{
		//$row=mysql_fetch_row($x2);
		
		$_SESSION['qp_name']=$qos;//name of question paper is stored in the session
		//echo $_SESSION['qp_name']['name_qos']
		
		header('location:set_questions.php');
	}
	else
	{
		print "could not update database";
	}
} else {
   // echo "ERROR: Could not able to execute $query_create. " . mysqli_error($link);
}

}
//we are here selecting parameters of the question i.e Subject name and Paper name , actually paper would be a table name . Both parameters will be stored in teachvsques with admin id in it
?>
</html>
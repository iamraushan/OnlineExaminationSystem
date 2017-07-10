<?php
//connection to database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
include 'secure_sign_in_admin.php';//this page wont show if their is no admin stored in session. check- secure_sign_in_admin.php

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
<title>Welcome</title>
</head>

<body id="wtcss">
<h1><center><b>Welcome <?php echo $_SESSION['sign_in_admin']['name'] ?> </b></center></h1>
<!-- Admin's name will apear on top with Welcome message-->
<?php
$id=$_SESSION['sign_in_admin']['teach_id'];//admin id is kept on id
$query_fetch="SELECT * FROM teach_admin WHERE teach_id='$id'";//fething admin data
$x=mysql_query($query_fetch);
$row=mysql_fetch_row($x);
$name=$row[1];//row[0] has id and row[1] has name and so on
$email=$row[2];
$dob=$row[3];
$contact=$row[4];
$institute=$row[6];
$dept=$row[7];
?>
<br><br><br>
<h2 align="left" id="tab"><b>Profile</b></h2>
<table id="tab"><!-- printing the admin's data-->
<tr><td align="left">Name:</td><td align="left"><?php echo $name?></td></tr>
<tr><td align="left">e-mail:</td><td align="left"><?php echo $email?></td></tr>
<tr><td align="left">DOB:</td><td align="left"><?php echo $dob?></td></tr>
<tr><td align="left">Contact Number:</td><td align="left"><?php echo $contact?></td></tr>
<tr><td align="left">Department:</td><td align="left"><?php echo $dept?></td></tr>
<tr><td align="left">Institute:</td><td align="left"><?php echo $institute?></td></tr>
<tr><td align="left"><a href="regiter_teach.php">Add New User</a></td></tr><!-- admin has the ability to add another admin -->
<tr><td align="left"><a href="list_of_paper_by_admin.php">View Previous Question papers</a></td></tr>
<!-- admin can see their previous question-->
<tr><td align="left"><a href="set_new_qup.php">Set new question paper</a></td></tr>
<!-- admin can set new question -->
<tr><td colspan="2" align="right"><a href="log_out.php">Log out</a></td></tr>
<!-- loging out will result on destruction on every session-->
</table>
</body>
</html>
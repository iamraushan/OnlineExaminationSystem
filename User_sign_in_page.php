<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
include("secure_sign_in.php");//This file include that if the session of user is null then it wont let this page open rather it will redirect to the homepage
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
<h1><center><b>Welcome <?php echo $_SESSION['sign_in']['name'] ?> </b></center></h1> 
<!-- Name of user will display on top center of the page -->
<?php
$id=$_SESSION['sign_in']['user_id']; // taking the id of the user from session
$query_fetch="SELECT * FROM users WHERE user_id='$id'"; //here we are fetching user info for profile
$x=mysql_query($query_fetch);
$row=mysql_fetch_row($x);
$name=$row[1];
$email=$row[2];
$dob=$row[3];
$contact=$row[4];
$institute=$row[6];
$year=$row[7];
$dept=$row[8];
?>
<br><br><br>
<h2 align="left" id="tab"><b>Profile</b></h2>
<table id="tab">
<tr><td align="left">Name:</td><td align="left"><?php echo $name?></td></tr> <!-- displaying user info-->
<tr><td align="left">e-mail:</td><td align="left"><?php echo $email?></td></tr>
<tr><td align="left">DOB:</td><td align="left"><?php echo $dob?></td></tr>
<tr><td align="left">Contact Number:</td><td align="left"><?php echo $contact?></td></tr>
<tr><td align="left">Department:</td><td align="left"><?php echo $dept?></td></tr>
<tr><td align="left">Year:</td><td align="left"><?php echo $year?></td></tr>
<tr><td align="left">Institute:</td><td align="left"><?php echo $institute?></td></tr>


</table>
<h3 id="tab">Scorecard</h3> <!-- scorecard is shown here -->

<table id="tab">

<?php
$query="SELECT * FROM `scorecard` WHERE user_id='$id'";
$x=mysql_query($query);
if(mysql_num_rows($x))
{
	?>
    <tr><td align="left"><b>Name of Question</b></td><td align="left"><b>Subject</b></td><td align="left"><b>Marks Obtained</b></td><td align="left"><b>Out of</b></td></tr>

    <?php
	while($row=mysql_fetch_array($x)) //data will fetch one by one untill row is null 
	{
		$name_qos=$row['name_qos'];
		$marks=$row['marks'];
		$subject=$row['subject'];
		$full_marks=$row['full_marks'];
		?>
        <tr><td align="left"><?php echo $name_qos ?></td><td align="left"><?php echo $subject ?></td><td align="left">
		<?php echo $marks ?></td><td align="left"><?php echo $full_marks ?></td></tr>
        <?php
	}
}
else
{
	?>
    <tr><td colspan="4" align="center">You have still not given exams:-(</td></tr>
    <?php
}
?>
</table>
<br><br><br><br><br>
<a id="tab" href="select_parameters.php">Give exam</a>
<!-- this will direct user to set the parameters of exam , page:select_parameters.php -->
<br><br><br><br><br>

<a id="tab" href="log_out.php">Log out</a>
<!-- this hyperlink will redirect page to log.out which will end all the sessions ,look to the code log_out.php-->

</body>
</html>
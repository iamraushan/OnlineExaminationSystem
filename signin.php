<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
?>
<?php
//this is code for sign in 
$email=$_POST['email'];
$passwd=$_POST['passwd'];
$query_fetch="SELECT * FROM `users` WHERE email='$email' AND passwd='$passwd'";
$rs=mysql_query($query_fetch);
if(mysql_num_rows($rs))
{
	$row=mysql_fetch_array($rs);
	$_SESSION['sign_in']=$row;//the row of user data is fetched and stored in session which will be called later
	echo "Sign in success <br>";
	header('location:User_sign_in_page.php');//redirecting to profile page if log in is successfull
}
else
{
	echo "Sign in failed";
}


?>
<?php
//connection to database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
?>
<?php
$email=$_POST['email'];//geting email from admin_page
$passwd=$_POST['passwd'];//getting password from admin page
$query_fetch="SELECT * FROM `teach_admin` WHERE email='$email' AND passwd='$passwd'";
$rs=mysql_query($query_fetch);
if(mysql_num_rows($rs))
{
	$row=mysql_fetch_array($rs);
	$_SESSION['sign_in_admin']=$row;
	echo "Sign in success <br>";
	header('location:admin_sign_in_page.php');//successfull sign in will open admin_sign_in_page.php
}
else
{
	echo "Sign in failed";
}



?>
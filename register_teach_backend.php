<?php
//connection to database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
?>
<?php
if(isset($_POST['ok']))
{
	$name=$_POST["name"];
	$email=$_POST["email"];
	$dob=$_POST["dob"];
	$contact=$_POST["contact"];
	$gender=$_POST["gender"];
	$noi=$_POST["noi"];
	$dept=$_POST["dept"];
	$passwd=$_POST["passwd1"];
	$passwd2=$_POST["passwd2"];
	$sql_query="SELECT * FROM teach_admin WHERE email='$email'";
	$x0=mysql_query($sql_query);
	if(mysql_fetch_row($x0))
	{
		echo 'You are already registered';
	}
	else
	{
	
	if($passwd==$passwd2)
	{
		$query_insert="INSERT INTO teach_admin (name,email,dob,contact,gender,noi,dept,passwd) VALUES 	('$name','$email','$dob','$contact','$gender','$noi','$dept','$passwd')";
		$x=mysql_query($query_insert);
		if($x == 1)
		{
			 echo 'Registered';
		}
		else
		{
			echo 'Failed';
		}	
	}
	else
	{
		echo 'Password does not matched';
	}
}
}





?>

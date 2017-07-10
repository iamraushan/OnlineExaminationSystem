<?php
//connection to database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
?>
<?php
//register work

if(isset($_POST['ok']))
{
	$name=$_POST["name"];
	$email=$_POST["email1"];
	$dob=$_POST["dob"];
	$contact=$_POST["contact"];
	$gender=$_POST["gender"];
	$noc=$_POST["noc"];
	$year=$_POST["year"];
	$dept=$_POST["dept"];
	$passwd=$_POST["passwd1"];
	$passwd2=$_POST["passwd2"];
	$sql_query="SELECT * FROM users WHERE email='$email'";//Checking whether the user has registered or not if user is already registered the registration will not be successful
	$x0=mysql_query($sql_query);
	if(mysql_fetch_row($x0))
	{
		echo 'You are already registered';
	}
	else
	{
	
	if($passwd==$passwd2)
	{
		$query_insert="INSERT INTO users (name,email,dob,contact_no,gender,noc,year,dept,passwd) VALUES 	('$name','$email','$dob','$contact','$gender','$noc','$year','$dept','$passwd')";
		//sql query for inserting the data users data
		$x=mysql_query($query_insert);
		if($x==1)
		{
			 echo 'Registered';
			 header('location:homepage_front.php');//after registration if the page will redirect to homepage
			 
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
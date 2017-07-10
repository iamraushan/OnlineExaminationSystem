<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
?>
<?php
$user_id=$_SESSION['sign_in']['user_id'];//getting user id from session 
$name_qos=$_SESSION['paper'];//getting question paper name from session
$subject=$_SESSION['subject'];//getting subject from session
mysql_select_db("question_paper");//changing the database
$query="SELECT MAX(q_no) FROM `$name_qos`";//counting the full marks
$x=mysql_query($query);
if(mysql_num_rows($x))
{
	if($row=mysql_fetch_array($x))
	{
		$full_marks=$row['MAX(q_no)'];//full marks stored in $full_marks
		
	}
	else
	{
		echo "Failed";
	}
	
}
else
{
	echo "Failed";
}
$i=0;
$query1="SELECT * FROM `$name_qos`";
$x1=mysql_query($query1);
if(mysql_num_rows($x1))
{
	while($row=mysql_fetch_array($x1))//getting the correct answers from the question paper database
	{
		$paper_qos_no[$i]=$row['q_no'];//question number is stored in $paper_qos_no array 
		$paper_qos_cop[$i]=$row['cop'];//correct option is stored in $paper_qos_cop array
		$i++;
	}
}
mysql_select_db("project_php");//changing the database
$query2="SELECT q_no,`option` FROM `user_test_data` WHERE user_id='$user_id' AND name_qos='$name_qos'";
$j=0;
$marks=0;//initialising marks as 0
$x2=mysql_query($query2);
if(mysql_num_rows($x2))
{
	while($row=mysql_fetch_array($x2))
	{
		$user_qos_no[$j]=$row['q_no'];//getting question number from user_test_data
		echo $user_qos_no[$j];
		echo "<br>";
		$user_qos_cop[$j]=$row['option'];//getting answers from users which is stored in user_test_data
		echo $user_qos_cop[$j]."<br>";
		$j++;
	}
}
for($k=0;$k<$full_marks;$k++)//checking the answers of the user 
{
	if($user_qos_no[$k]==$paper_qos_no[$k])
	{
		if($user_qos_cop[$k]==$paper_qos_cop[$k])
		{
			++$marks;//if yes marks will be inremented by one
		}
	}
}
print "<br>Marks ---- '$marks'";
$query4="SELECT * FROM `scorecard` WHERE user_id='$user_id' AND name_qos='$name_qos'";//boris2
$x4=mysql_query($query4);//boris2
//here we are checking for previous submissions from the users to the scorecard if their is a submission made by the user the new submission will be discarded...code name:boris2...see logbook.docx
if(mysql_num_rows($x4)==0)//boris2
{
$query3="INSERT INTO `scorecard`(`user_id`, `name_qos`, `marks`, `full_marks`, `subject`) VALUES ('$user_id','$name_qos','$marks','$full_marks','$subject') ";
//inserting data to the scorecard 
$x3=mysql_query($query3);
if($x3==1)
{
	header('location:User_sign_in_page.php');//after successful insertion the page will be redirected to user's profile page
}
else
{
	echo "Failed";
}
}
else
{
	header('location:User_sign_in_page.php');//da
}
	



?>
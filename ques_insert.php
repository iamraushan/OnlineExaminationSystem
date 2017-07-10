<?php
//this is connection of database
mysql_connect("localhost", "root", "");
mysql_select_db("question_paper");
session_start();
?>
<?php
if(isset($_POST['ok']))
{	
	$quesp_name=$_SESSION['qp_name'];
	$ques=$_POST["ques"];
	$op1=$_POST["op1"];
	$op2=$_POST["op2"];
	$op3=$_POST["op3"];
	$op4=$_POST["op4"];
	$cop=$_POST["cop"];
	$query_insert="INSERT INTO `$quesp_name`(q_name,op1,op2,op3,op4,cop) VALUES('$ques','$op1','$op2','$op3','$op4','$cop')";
	$x=mysql_query($query_insert);
	if($x==1)
	{
		echo 'Success';
		header('location:set_questions.php');
	}
	else
	{
		echo 'failed';
	}
	
}
else
{
	echo 'Cannot fetch the data';
}
?>
<?php
//this is connection of database
mysql_connect("localhost", "root", "");
mysql_select_db("question_paper");
session_start();
?>
<?php
//this is back end of update page
if(isset($_POST['ok']))
{	
	$qp_name=$_SESSION['qp_name'];//question paper name
	$ques_no=$_SESSION['ques_no'];//question number
	$ques=$_POST["ques"];//question name
	$op1=$_POST["op1"];//option 1
	$op2=$_POST["op2"];//option 2
	$op3=$_POST["op3"];//option 3
	$op4=$_POST["op4"];//option 4
	$cop=$_POST["cop"];//correct option
	
	$query_update="update `$qp_name` set q_name='$ques' ,op1='$op1' ,op2='$op2' ,op3='$op3' ,op4='$op4' ,cop='$cop' where q_no='$ques_no' ";
	//"update reg_table set name='$name',pwd='$passwd',adde='$add',sex='$sex',city='$city',dob='$dob' where id='$id'"
	$x=mysql_query($query_update);
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
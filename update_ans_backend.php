<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
?>
<?php
if(isset($_GET['ok']))
{
	$op=$_GET['op'];
	if($op==NULL)//getting answers from user
	{
		$op="-";
	}
	$uq_no=$_SESSION['uqn'];////getting question number for update from session
	$q_name=$_SESSION['paper'];//getting paper name from session
	$u_id=$_SESSION['sign_in']['user_id'];//getting user id from session
	/*$query2="SELECT `option` FROM `user_test_data` WHERE user_id='$u_id' AND name_qos='$q_name' AND q_no='$uq_no'";//boris1
	$x1=mysql_query($query2);//boris1
	if(mysql_num_rows($x1)==0)//boris1
	{*/
	
	/*$query="UPDATE `user_test_data` SET option='$op' WHERE name_qos='$q_name' AND q_no='$uq_no' AND user_id='$u_id'";
	SELECT `option` FROM `user_test_data` WHERE user_id='$u_id' AND name_qos='$q_name' AND q_no='$uq_no'
	*/
	$query="UPDATE  `user_test_data` SET  `option` =  '$op' WHERE  `user_id` =  '$u_id' AND  `name_qos` =  '$q_name' AND  `q_no` =$uq_no
";
//updating data
	$x=mysql_query($query);
	
	
	if($x)
	{	
		header('location:review_ans.php');//successfull update will redirect them to review answer page
	}
	else
	{
		echo 'Failed';
	}
	/*}
	else
	{
		$uq_no++;
		$_SESSION['q_no']=$uq_no;
		header('location:exam.php');
	}*/
}
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

	$uq_no= $_SESSION['q_no'];//getting question number from session 
	$q_name=$_SESSION['paper'];//getting paper name from session
	$u_id=$_SESSION['sign_in']['user_id'];//getting user id from session
	$query2="SELECT `option` FROM `user_test_data` WHERE user_id='$u_id' AND name_qos='$q_name' AND q_no='$uq_no'";//boris1
	$x1=mysql_query($query2);//boris1
	//this above query is checking that whether the answers of that particular question number is already inserted or not if yes the data will not be inserted ...code name boris1 see logbook.docx 
	if(mysql_num_rows($x1)==0)//boris1
	{
	
	$query="INSERT INTO `user_test_data`(`user_id`, `name_qos`, `q_no`, `option`) VALUES ('$u_id','$q_name','$uq_no','$op') ";
	$x=mysql_query($query);
	//insering data to user_test_data
	if($x==1)
	{
		$uq_no++;//incrementing the question number 
		$_SESSION['q_no']=$uq_no;//setting new question number as session
		header('location:exam.php');//redirecting to main exam page
	}
	}
	else
	{
		$uq_no++;//ditto  
		$_SESSION['q_no']=$uq_no;//ditto
		header('location:exam.php');//ditto
	}

}

?>
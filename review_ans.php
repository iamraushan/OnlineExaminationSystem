<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("question_paper");
session_start();

?>
<style>
#wtcss
{
background-image:url(tail-middle.jpg) ;
background-repeat:repeat-y;
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
<title>Review</title>
</head>

<body id="wtcss">
<h1 align="center">Review</h1>

<b><a id="tab" href="exam.php">Back to Exam</a></b><!--back to exam page -->
<br><br><br>
<?php 

$q_name=$_SESSION['paper'];//getting the name of questioin paper
$query="select * from `$q_name` ";
$rs=mysql_query($query);
//we are printing the question and options and user's answers down here
if(mysql_num_rows($rs))
{
	
	while($row=mysql_fetch_array($rs))//while row has some data
	{	
		$uq_no= $row['q_no'];//question number
		$uq_name= $row['q_name'];//the real question name
		if($uq_no<$_SESSION['q_no']){//stop at last question 
		$uop1= $row['op1'];
		$uop2= $row['op2'];
		$uop3= $row['op3'];
		$uop4= $row['op4'];
		?>
        <table id="tab">
        <tr><td >Question no.</td><td align="left"><?php echo $uq_no ?></td></tr>
        <tr><td >Question name</td><td align="left"><?php echo $uq_name ?> </td></tr>
        <tr><td >(a)</td><td align="left"><?php echo $uop1 ?></td></tr>
        <tr><td >(b)</td><td align="left"><?php echo $uop2 ?></td></tr>
        <tr><td >(c)</td><td align="left"><?php echo $uop3 ?></td></tr>
        <tr><td >(d)</td><td align="left"><?php echo $uop4 ?></td></tr>
        <?php
		mysql_select_db("project_php");//changing the database as user's answers are stored in project_php
		$q_name=$_SESSION['paper'];//question paper name
		$u_id=$_SESSION['sign_in']['user_id'];//user id
		$query1="SELECT `option` FROM `user_test_data` WHERE q_no='$uq_no' AND name_qos='$q_name' AND user_id='$u_id'";
		//we are getting the option which user has chosen
		$x=mysql_query($query1);
		if(mysql_num_rows($x)){
			if($row2=mysql_fetch_array($x))
			{
				$ucop=$row2['option'];
        ?>
		<tr><td >Your Answer:</td><td align="left"><?php echo $ucop ?></td></tr><!-- answer by user -->
        <?php 
			}
			else
			{	?>
				
					<tr><td >Your Answer</td><td align="left">Somthings Wrong</td></tr><!-- answer by user -->
	<?php
			}
			
			mysql_select_db("question_paper");//back to previous database as the set of questions are stored in question_php

		}
		?>
        <tr><td colspan="2"><a href="update_ans.php?varname=<?php echo $uq_no ?>">Update</a></td></tr>
<!-- we are getting the the change request here 
i.e we are redirecting the user to update_ans.php where they can 
update there answer also we are 
sending name of question to that page --> 
        
		</table>
        <br>
         <?php
		
		
		}
		
	}
	
}
?>
</body>
</html>
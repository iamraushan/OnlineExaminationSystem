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
<title>Update Answer</title>
</head>

<body id="wtcss">
<form method="get" action="update_ans_backend.php">
<!-- the update work is done by update_ans_backend -->
<?php
$uq_no=$_GET['varname'];
$_SESSION['uqn']=$uq_no;
//the qustion number is catched by the variable $uq_no which was thrown by review_ans.php
$q_name=$_SESSION['paper'];//question paper name 
?>
<h1 align="center"><?php echo $q_name ?></h1>
<strong><h4 align="center">Update your answer</h4></strong>
<a id="tab" href="review_ans.php">Back to Review Answers</a>
<br><br>
<?php
$query="select * from `$q_name` where q_no='$uq_no'";
$rs=mysql_query($query);
//we are fetching question here
if(mysql_num_rows($rs)==1)
{
	if($row=mysql_fetch_array($rs))
	{	
		$uq_name= $row['q_name'];
		$uop1= $row['op1'];
		$uop2= $row['op2'];
		$uop3= $row['op3'];
		$uop4= $row['op4'];
		$ucop= $row['cop'];
		?>
        <table align="center">
        <tr><td >Question no.</td><td align="left"><?php echo $uq_no ?></td></tr>
        <tr><td >Question : </td><td align="left"><?php echo $uq_name ?> </td></tr>
        <tr><td ><input type="radio" value="a" name="op" ><?php echo "(a) " ;echo $uop1; ?></td></tr>
        <tr><td ><input type="radio" value="b" name="op" ><?php echo "(b) " ;echo $uop2 ?></td></tr>
        <tr><td ><input type="radio" value="c" name="op" ><?php echo "(c) " ;echo $uop3 ?></td></tr>
        <tr><td ><input type="radio" value="d" name="op" ><?php echo "(d) " ;echo $uop4 ?></td></tr>
        <tr><td align="center"><input type="submit" value="Update" name="ok"></td></tr>
		</table>
        <br>
         <?php
		
		
		
		
	}
	
	
}
else
	{
		?>
        <center><a href="scorecard.php">Submit and quit</a></center>
        <!-- if by any chance if the query fetched more than 1 or 0 results then it will be redirected to scorecard.php--> 
        <?php
		
	}
?>
</body>
</html>
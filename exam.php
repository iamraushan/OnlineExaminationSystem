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
<title>Exam</title>
</head>
<body id="wtcss">

<?php
$q_name=$_SESSION['paper'];//geting the name of question paper

?>
<h1 align="center"><?php echo $q_name ?></h1>
<b><a id="tab" href="review_ans.php">Review Answers</a></b>
<!-- This will redirect user to review.php where they can review their answers-->
<form method="get" action="getans.php">
<!-- the value will be send to getans.php which will insert (answers)data to users_test_data -->
<?php
$uq_no= $_SESSION['q_no'];//qurstion number is fetched 
$query="select * from `$q_name` where q_no='$uq_no'";//q_name is a table name where questions are stored 
$rs=mysql_query($query);
if(mysql_num_rows($rs)==1)//fetching and displaying data down here 
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
        <tr><td align="center"><input type="submit" value="Next Question" name="ok"></td></tr>
		</table>
        <br>
         <?php
		
		
		
		
	}
	
	
}
else
	{
		?>
        </form>
        <center><a href="scorecard.php">Submit and quit</a></center>
        <!-- this will redirect page to scorescard.php which will generate scorecard -->  
        <?php
		
		
	}

//rest of work to be done
?>


</body>
</html>
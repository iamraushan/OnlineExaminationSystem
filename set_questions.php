<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("question_paper");
//include("secure_ques.php");
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
#tab_from_right
{
	
	padding-left:650px;
}
#window
{
	width:600px;
}
</style>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Set Questions</title>
</head>

<body id="wtcss">
<h1><center><?php  $q_name = $_SESSION['qp_name']; echo $q_name;?></center></h1>
<a id="tab" href="admin_sign_in_page.php"> <<--Admin</a>

<?php mysql_select_db("project_php");
$query="SELECT name FROM teach_admin WHERE teach_id=(SELECT teach_id FROM teachvsques where name_qos='$q_name')";
//we are getting paper and admin name from teacvsques
if($x=mysql_query($query))
{
	$row=mysql_fetch_array($x);
	$a_name = $row['name'];
}
else
{
	print "Query failed";
}
?>
<!-- we will be getting the values of the question from here -->
<h3 id="tab">By:-<?php echo $a_name ?></h3>

<br><br>

<br><br><br>

<form method="post" action="ques_insert.php">
<center><table>
<tr><td align="left">Question</td><td align="left"><input type="text" id="window" name="ques" id="ques"></td></tr>
<tr><td align="left">Option (a)</td><td align="left"><input type="text" name="op1" id="op1"></td></tr>
<tr><td align="left">Option (b)</td><td align="left"><input type="text" name="op2" id="op2"></td></tr>
<tr><td align="left">Option (c)</td><td align="left"><input type="text" name="op3" id="op3"></td></tr>
<tr><td align="left">Option (d)</td><td align="left"><input type="text" name="op4" id="op4"></td></tr>
<tr><td align="left">Correct Option</td><td>
<select name="cop">
<option value="a">a</option>
<option value="b">b</option>
<option value="c">c</option>
<option value="d">d</option>
</select>
</td></tr>
<tr><td align="center" colspan="2" ><input type="submit" name="ok"></td></tr>

</table></center>


</form>
<?php 

//we are displaying all the questions here  with the update previledge
mysql_select_db("question_paper");
$query="select * from `$q_name` ";
$rs=mysql_query($query);
if(mysql_num_rows($rs))
{
	while($row=mysql_fetch_array($rs))
	{	
		$uq_no= $row['q_no'];
		$uq_name= $row['q_name'];
		$uop1= $row['op1'];
		$uop2= $row['op2'];
		$uop3= $row['op3'];
		$uop4= $row['op4'];
		$ucop= $row['cop'];
		?>
        <table id="tab">
        <tr><td >Question no.</td><td align="left"><?php echo $uq_no ?></td></tr>
        <tr><td >Question name</td><td align="left"><?php echo $uq_name ?> </td></tr>
        <tr><td >(a)</td><td align="left"><?php echo $uop1 ?></td></tr>
        <tr><td >(b)</td><td align="left"><?php echo $uop2 ?></td></tr>
        <tr><td >(c)</td><td align="left"><?php echo $uop3 ?></td></tr>
        <tr><td >(d)</td><td align="left"><?php echo $uop4 ?></td></tr>
		<tr><td >Correct Option</td><td align="left"><?php echo $ucop ?></td></tr>
        <tr><td colspan="2"><a href="update_ques.php?varname=<?php echo $uq_no ?>">Update</a></td></tr>

        
		</table>
        <br>
         <?php
		
		
		
		
	}
	
}


//rest of work to be done
?>
<br><br>

</body>

</html>
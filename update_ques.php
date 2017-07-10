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
#window
{
	width:600px;
}
</style>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Question</title>
</head>

<body id="wtcss">
<h3 align="center">Update Question</h3>
<form method="post" action="update_backend.php">
<?php
//this is front end of the page
$ques_no=$_GET['varname'];//getting the question number from preivious page
$_SESSION['ques_no']=$ques_no;
$qp_name = $_SESSION['qp_name'];
$query="SELECT * FROM `$qp_name` WHERE q_no='$ques_no'";
$rs=mysql_query($query);
if(mysql_num_rows($rs))
{
		$row=mysql_fetch_array($rs);
		$uq_name= $row['q_name'];
		$uop1= $row['op1'];
		$uop2= $row['op2'];
		$uop3= $row['op3'];
		$uop4= $row['op4'];
		$ucop= $row['cop'];
		
		?>
        
        <table align="center">
        <tr><td >Question no.</td><td align="left"><?php echo $ques_no ?></td></tr>
        <tr><td >Question name</td><td align="left"><input type="text" name="ques"   id="window" value="<?php echo $uq_name ?>"> </td></tr>
        <tr><td >(a)</td><td align="left"><input type="text" name="op1" value="<?php echo $uop1 ?>"> </td></tr>
        <tr><td >(b)</td><td align="left"><input type="text" name="op2" value ="<?php echo $uop2 ?>"> </td></tr>
        <tr><td >(c)</td><td align="left"><input type="text" name="op3" value="<?php echo $uop3 ?>"> </td></tr>
        <tr><td >(d)</td><td align="left"><input type="text" name="op4" value="<?php echo $uop4?>"> </td></tr>
        <tr><td align="left">Correct Option<td align="left"><select name="cop">
		<option value="a">a</option>
		<option value="b">b</option>
		<option value="c">c</option>
		<option value="d">d</option>
		</select>
		</td></tr>
		<tr><td align="center" colspan="2" ><input type="submit" value="Update" name="ok"></td></tr>
		</table>
        <br>
         <?php
}
?>
</form>
</body>
</html>
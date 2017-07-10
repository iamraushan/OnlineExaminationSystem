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
<title>View Paper</title>
</head>
<body id="wtcss">
<?php
if(isset($_GET['ok']))
{
$name_qos=$_GET['var'];//getting paper name from previous page 
?>
<h1 align="center"><?php echo $name_qos ?></h1>
<b><a id="tab" href="admin_sign_in_page.php"><<--Admin</a></b>
<br><br>
<?php
$query="SELECT * FROM `$name_qos`";//fetching every data from paper database
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
        <table id="tab"><!-- every data will be fetched here systematically-->
        <tr><td >Question no.</td><td align="left"><?php echo $uq_no ?></td></tr>
        <tr><td >Question name</td><td align="left"><?php echo $uq_name ?> </td></tr>
        <tr><td >(a)</td><td align="left"><?php echo $uop1 ?> </td></tr>
        <tr><td >(b)</td><td align="left"><?php echo $uop2 ?> </td></tr>
        <tr><td >(c)</td><td align="left"><?php echo $uop3 ?> </td></tr>
        <tr><td >(d)</td><td align="left"><?php echo $uop4?> </td></tr>
        <tr><td >Correct Answer:</td><td align="left"><?php echo $ucop ?> </td></tr>
        
		</table>
        <br>
         
		<?php
		
		
		
	}
	
}
}


//rest of work to be done
?>

</body>
</html>





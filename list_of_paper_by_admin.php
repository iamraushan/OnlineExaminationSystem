<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
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
<title>Previous Papers</title>
</head>


<body id="wtcss">
<br>
<center><h2>List of Questions by <?php echo $_SESSION['sign_in_admin']['name'] ?></h2></center>
<br>
<table id="tab">

<b><a id="tab" href="admin_sign_in_page.php"><<--Admin</a></b>
<br><br><br>
<?php
$teach_id= $_SESSION['sign_in_admin']['teach_id'];

$query_fetch="select name_qos from `teachvsques` where teach_id='$teach_id'";//fetching paper name of the corresponding Admin
$x=mysql_query($query_fetch);

if(mysql_num_rows($x))
{
	while($row=mysql_fetch_array($x))
	{
		$qp_name=$row['name_qos'];
		?>
       		<tr><td><?php echo $qp_name ?></td></tr> 
        
        <?php
	}
}

?>
</table>
<br>
<h3 id="tab">View Question paper</h3>
<form id="tab" method="get" action="view_paper.php">
<select name="var">
<?php
$query_fetch="select name_qos from `teachvsques` where teach_id='$teach_id'";
$x=mysql_query($query_fetch);

if(mysql_num_rows($x))
{
	while($row=mysql_fetch_array($x))//this is foe drop down button to view detailed question paper
	{
		$qp_name=$row['name_qos'];
	       		 $qp_name ;
				 ?>
                 <option value= "<?php echo $qp_name ?>" ><?php echo $qp_name?></option>
                 <?php 
        
        
	}
}
?>
</select>
<input type="submit" name = "ok">
</form>
</body>
</html>
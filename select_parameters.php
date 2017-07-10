<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
session_start();
include("secure_sign_in.php");
?>
<style>
#wtcss
{
background-image:url(tail-middle.jpg) ;
background-repeat:no-repeat;
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
<title>Select Paremeters</title>
</head>

<body id="wtcss">
<h1 align="center">Select Parameters</h1>
<form id="tab" method="get" action="select_parameters.php"> 
<!-- the subject we are choosing will be fetched by this page by itself and it will help next form to get the value of subject -->
<b><a href="User_sign_in_page.php"><<--Back to Profile page</a></b> <!-- this will redirect user to profile page -->
<br>
<br>
<table>
<tr><td align="left">Select Subject </td><td>
<select name="sub" ><!-- drop down button fron here -->
<?php 
$query_fetch="SELECT DISTINCT subject FROM `teachvsques`";//we are getting distinct subject from here
$x=mysql_query($query_fetch);

if(mysql_num_rows($x))
{
	while($row=mysql_fetch_array($x))
	{
		$qp_name=$row['subject'];
	       		 
				 ?>
                 <option value= "<?php echo $qp_name ?>" ><?php echo $qp_name?></option> 
                 <!-- differnt option value of subjects will be shown here -->
                 <?php 
        
        
	}
}
?> 
</select>
</td>
<td align="left"><input type="submit" name="ok"></td>
</tr></table></form>




<form id="tab" name="ge" method="get" action="setsession.php">
<!-- the value of subject will be fetched by this form of the page -->
<table>
<tr><td>Select Paper</td>
<?php
if(isset($_GET['ok']))
{
	$subjects=$_GET['sub'];
	$_SESSION['subject']=$subjects;
	?>
    <td><select name="paper">
<?php 
$id=$_SESSION['sign_in']['user_id'];
$query_fetch1="select name_qos from `teachvsques` where subject ='$subjects' and name_qos not in (select name_qos from `scorecard` where user_id='$id')";
//here we are selecting those papers which are not faced by users i.e not is in thier scorecard 
$x=mysql_query($query_fetch1);

if(mysql_num_rows($x))
{
	while($row=mysql_fetch_array($x))
	{
		$paper=$row['name_qos'];
	       		 
				 ?>
                 <option value= "<?php echo $paper ?>" ><?php echo $paper?></option>
                 <?php 
        
        
	}
}
else
{
	
				?>
                
                 <option value="" >Not Available</option> <!-- if no papers are available then user will see this tag -->
                 <?php 
	
}
?>
</select></td>
<td align="left"><input type="submit" value="Give Exam" name="ok2"></td></tr>
</table>
    
    <?php
	$_SESSION['q_no']='1';
	// here we are setting session q_no as 1 which will be used as question number in future and will be incremented and decremented as required 
	 

	
}




?>
</form>
</body>
</html>
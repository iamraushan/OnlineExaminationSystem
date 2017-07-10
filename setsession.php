<?php
session_start();
?>
<?php
$paper=$_GET['paper'];//here we are getting the name of paper from select_parameters.php 
if($paper==NULL)		//of the paper is null page will be redirected to select_parameters.php
{
	header('location:select_parameters.php');
}
else
{
print $paper;
$_SESSION['paper']=$paper; //if we get name of paper successfully then it will be stored in a session 
header('location:exam.php');// and redirected to the main exam page 
}



?>

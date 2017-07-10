<?php
if($_SESSION['sign_in_admin']==null)
{
	header('location:Admin_page.php');
}
?>
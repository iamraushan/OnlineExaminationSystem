<!doctype html>
<head>
<title>DGR.com
</title>
</head>
<?php
//this is connection of database
mysql_connect("localhost","root","");
mysql_select_db("project_php");
?>



<style>
#css1
{
background-image:url(tail-middle.jpg ) ;
background-repeat:no-repeat;
background-position:center;

}
#css2
{
	margin:80px 0px 200px 275px;
}
#css3
{
	margin:0px 150px 50px 0px;
}
#css4
{
	margin:0px 150px 0px 0px;
}

.form input:focus
{
	background:#9FC;
	outline:none;
}
.buttons_input
{
	font-style:italic;	
	width:100px;
	height:auto;
	background-color:#FFF;;
}
.buttons_input:hover,
.buttons_input:focus
{
	background-color:#6AD7F7;
	outline:none;
	
}


table tr td a:hover
{
	color:#D70640;
}
table tr td submit:hover
{
	color:#00C;
}
</style>


<body id="css1">
<div id="css2">
<h1> 
<table>
<tr>
	<td width="180px"><a href="homepage_front.php">Home</a></td>
    <td width="180px"><a href="#">Contact Us</a></td>
    <td width="180px"><a href="#">About Us</a></td>
    <td width="180px"><a href="Admin_page.php">Admin</a></td>
</tr>
</table>
</h1>
<img src="logo.jpg" width="450" height="63"	>
<script src="validation.js"></script>

<table align="right" style="margin-right:150px">
<form method="post" action="signin.php">
<!-- This form is for log in purpose and the data is send via signin.php-->

<tr>
    <td	><input type="email" placeholder="email" name="email" style="width:125px"></td>
    <td><input type="password" placeholder="password" name="passwd"style="width:125px"></td>
    <td><input type="submit" value="Login" name="ok" class="buttons_input"></td>
</tr>
<tr>
  	<td><a href="#">Forgot password</a></td>
</tr>
</form>
</table>

<div id="css3">

<br><br>
<img src="banner_mod.jpg" width="520" height="250">

<table align="right">
<form name="frm"  method="post" action="register.php" onSubmit="return validation();">
<!-- The name of form is 'frm' and data is send to register.php for registration purposes,validation is checked by javascript-->

<tr><td align="left">Name</td><td align="left"><input type="text" name="name" id="name"></td></tr>
<tr><td align="left">e-mail</td><td align="left"><input type="text" name="email1" id="email"></td></tr>
<tr><td align="left">Date of Birth</td><td align="left"><input type="date" name="dob"></td></tr>
<tr><td align="left">Contact No.</td><td align="left"><input type="text" name="contact" id="contact"></td></tr>
<tr><td align="left">Gender</td><td align="left"><input type="radio" name="gender" value="M" id="sex"/>Male<input type="radio"  name ="gender" value="F" id="sex"/>Female</td></tr>
<tr><td align="left">Name of College</td><td align="left"><input type="text" name="noc"></td></tr>
<tr><td align="left">Year</td><td align="left"><input type="text" name="year"></td></tr>
<tr><td align="left">Department</td><td align="left"><input type="text" name="dept"></td></tr>
<tr><td align="left">Password</td><td align="left"><input type="password" name="passwd1" id="pass"></td></tr>
<tr><td align="left">Confirm Password</td><td align="left"><input type="password" name="passwd2" id="pass"></td></tr>
<tr><td align="center" colspan="2" ><input type="submit" value="Register" name="ok" class="buttons_input" ></td></tr>
    </form>
</table>


</div>
</div>
</body>


 
</html> 
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
<title>Register</title>
</head>

<body id="wtcss">
<h1><center>Add new User</center></h1>
<b><a id="tab" href="admin_sign_in_page.php"><<--Admin</a></b>
<br><br>
<table align="center">
<form name="frm2"  method="post" action="register_teach_backend.php" onSubmit="return validation();">

<tr><td align="left">Name</td><td align="left"><input type="text" name="name" id="name"></td></tr>
<tr><td align="left">e-mail</td><td align="left"><input type="text" name="email" id="email"></td></tr>
<tr><td align="left">Date of Birth</td><td align="left"><input type="date" name="dob"></td></tr>
<tr><td align="left">Contact No.</td><td align="left"><input type="text" name="contact" id="contact"></td></tr>
<tr><td align="left">Gender</td><td align="left"><input type="radio" name="gender" value="M" id="sex"/>Male<input type="radio"  name ="gender" value="F" id="sex"/>Female</td></tr>
<tr><td align="left">Name of Institue</td><td align="left"><input type="text" name="noi"></td></tr>
<tr><td align="left">Department</td><td align="left"><input type="text" name="dept"></td></tr>
<tr><td align="left">Password</td><td align="left"><input type="password" name="passwd1" id="pass"></td></tr>
<tr><td align="left">Confirm Password</td><td align="left"><input type="password" name="passwd2" id="pass"></td></tr>
<tr><td align="center" colspan="2" ><input type="submit" value="Register" name="ok" ></td></tr>
    </form>
</table>
</body>
</html>
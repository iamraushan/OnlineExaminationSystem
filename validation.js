// JavaScript Document
function validation()
{
	if(document.frm.name.value=="")//for valid name
	{
		alert("Enter valid name:");
		return false;
	}
	var x=/^\w([\.-]?\w+)*@\w+([\.-]?)*(\.\w{2,3})+$/;//for email
	if(!document.frm.email.value.match(x))
	{
		alert("Enter valid email id");
		return false;
	}
	
	if(document.frm.sex[0].checked==false && document.frm.sex[1].checked==false)//for radio button
	{
		alert("Select your gender");
		return false;
	}
	return true;
}

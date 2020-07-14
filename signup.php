<!DOCTYPE >
<html>
<head>
<title>New user signup </title>
<?php include("header.php");?>
<script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
	document.form1.lid.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.name.focus();
	return false;
  }
  if(document.form1.address.value=="")
  {
    alert("Plese Enter Address");
	document.form1.address.focus();
	return false;
  }
  if(document.form1.city.value=="")
  {
    alert("Plese Enter City Name");
	document.form1.city.focus();
	return false;
  }
  if(document.form1.phone.value=="")
  {
    alert("Plese Enter Contact No");
	document.form1.phone.focus();
	return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>
<link href="assets/css/quiz.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>


<body>
<div class="container">
 <div class="card">
    <div class="card-header">
    New User Signup
    <a href="index.php" class="float-right btn btn-primary">Back</a>
    </div>
    <form name="form1" method="post" action="signupuser.php" onSubmit="return check();">
    <div class="card-body text-center">
      <div class="col-sm-8 offset-md-2">
        <br>
        <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Login Id </label>
              <div class="col-sm-8">             
                <input class="form-control" required placeholder="Login Id"  type="text" name="lid">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Password </label>
              <div class="col-sm-8">             
                <input class="form-control" required placeholder="Password" type="password" name="pass">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Confirm Password </label>
              <div class="col-sm-8">             
                <input class="form-control" required placeholder="Confirm Password" name="cpass" type="password" id="cpass">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Name </label>
              <div class="col-sm-8">             
                <input class="form-control" required placeholder="Name"  name="name" type="text" id="name">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Address </label>
              <div class="col-sm-8">             
                <input class="form-control" required placeholder="Address"  name="address" id="address">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">City </label>
              <div class="col-sm-8">             
                <input class="form-control" required name="city" placeholder="City" type="text" id="city">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Phone </label>
              <div class="col-sm-8">             
                <input class="form-control" required name="phone" placeholder="Phone" type="text" id="phone">
              </div>
          </div>
          <br>
          <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">E-mail </label>
              <div class="col-sm-8">             
                <input class="form-control" required placeholder="E-mail" name="email" type="text" id="email">
              </div>
          </div>
          <br>
          <input type="submit" name="Submit" class="btn btn-primary" value="Signup">
          <br><br>
        </div >
     </div>
      </form>
    </div>
    <br>
  </div>

 <!-- <table width="100%" border="0">
   <tr>
     <td width="132" rowspan="2" valign="top"><span class="style8"><img src="images/connected_multiple_big.jpg" width="131" height="155"></span></td>
     <td width="468" height="57"><h1 align="center"><span class="style8">New User Signup</span></h1></td>
   </tr>
   <tr>
     <td><form name="form1" method="post" action="signupuser.php" onSubmit="return check();">
       <table width="301" border="0" align="left">
         <tr>
           <td><div align="left" class="style7">Login Id </div></td>
           <td><input type="text" name="lid"></td>
         </tr>
         <tr>
           <td class="style7">Password</td>
           <td><input type="password" name="pass"></td>
         </tr>
         <tr>
           <td class="style7">Confirm Password </td>
           <td><input name="cpass" type="password" id="cpass"></td>
         </tr>
         <tr>
           <td class="style7">Name</td>
           <td><input name="name" type="text" id="name"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">Address</td>
           <td><textarea name="address" id="address"></textarea></td>
         </tr>
         <tr>
           <td valign="top" class="style7">City</td>
           <td><input name="city" type="text" id="city"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">Phone</td>
           <td><input name="phone" type="text" id="phone"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">E-mail</td>
           <td><input name="email" type="text" id="email"></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><input type="submit" name="Submit" value="Signup">
           </td>
         </tr>
       </table>
     </form></td>
   </tr>
 </table>
 <p>&nbsp; </p> -->
</body>
</html>

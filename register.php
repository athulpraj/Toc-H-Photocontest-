<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';
$user=$_SESSION['user'];
if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $email = mysql_real_escape_string($_POST['email']);
 $upass = md5(mysql_real_escape_string($_POST['pass']));
 $phone = mysql_real_escape_string($_POST['phone']);
    $query = mysql_query("SELECT email FROM users WHERE email='$email'");

     if (mysql_num_rows($query) != 0)
    {
       ?>
        <script>alert('Email already exist');
        window.location.href = "register.php";
        </script>
        <?
    }
    else
    {
 if(mysql_query("INSERT INTO users(username,email,password,phone) VALUES('$uname','$email','$upass','$phone')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <script language="javascript">
        window.location.href = "lndex.php"
        </script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>
    <div id="header">
 <div id="left">
    <label>TocH Photo Contest</label>
    </div>
     
   
</div>
<center>
    <div id="logo">
            <a href ="http://tochindia.in/" target="_blank"><img src="images/shutter.png" alt="TocH Logo" ></a>
        </div>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="tel" name="phone" placeholder="Your Phone" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>

<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><center><a href="lndex.php">Login </a></center></td>
</tr>
</table>
</form>
</div>

</center>
</body>
</html>
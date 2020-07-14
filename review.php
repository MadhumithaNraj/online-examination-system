<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database.php");
if (!empty($_POST['submit'])) {
if($submit=='Finish')
{
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	unset($_SESSION[qn]);
	header("Location: index.php");
	exit;
}}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Review Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="assets/css/quiz.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
echo "<h1 class=head1> Review Test Question</h1>";

if(!isset($_SESSION[qn]))
{
		$_SESSION[qn]=0;
}
else if($submit=='Next Question' )
{
	$_SESSION[qn]=$_SESSION[qn]+1;
	
}

$rs=mysql_query("select * from mst_useranswer where sess_id='" . session_id() ."'",$cn) or die(mysql_error());
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
echo "<form name=myfm method=post action=review.php>";
echo "<div class='container'>
<div class='card'>
  <div class='card-header'>
  Subject Details
  <a href='index.php' class='float-right btn btn-primary'>Back</a>
  </div>
  <div class='card-body text-center'><br>";
$n=$_SESSION[qn]+1;
echo "<span class=style2>Que ".  $n .": $row[2]</style><br>";
echo "<p class=".($row[7]==1?'tans':'style8').">$row[3]<br>";
echo "<p class=".($row[7]==2?'tans':'style8').">$row[4]<br>";
echo "<p class=".($row[7]==3?'tans':'style8').">$row[5]<br>";
echo "<p class=".($row[7]==4?'tans':'style8').">$row[6]<br><br>";
if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<input type='submit' name='submit' class='btn btn-primary' value='Next Question'> <a href='quiz.php' class='btn btn-primary'>Back</a><br><br></form>";
else
echo "<input type='submit' class='btn btn-primary' name='submit' value='Finish'> <a href='quiz.php' class='btn btn-primary'>Back</a><br><br></form>";
echo "</div></div></div>";
?>

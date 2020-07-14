<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz  - Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="assets/css/quiz.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_SESSION);
$rs=mysql_query("select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
t.test_id=r.test_id and r.login='$login'",$cn) or die(mysql_error());

echo "<h1 class=head1> Result </h1>";
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
	exit;
}
echo "<div class='container'><div class='col-md-6 offset-md-3'><table class='table table-dark table-striped'>
<thead>
<tr>
  <th>Test Name</th>
  <th>Total Question</th>
  <th>Date</th>
  <th>Score</th>
</tr>
</thead><tbody>";
while($row=mysql_fetch_row($rs))
{
echo "
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
<td>$row[3]</td>
</tr>";
}
echo "</tbody></table></div></div>";
echo "<div class='form-row text-center'>
    <div class='col-12'>";
	echo "<button class='btn btn-primary'><a href='index.php'>Back<a></button>";
	echo "</div></div><br>";
?>
</body>
</html>

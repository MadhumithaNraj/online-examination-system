<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:quiz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="assets/css/quiz.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");


$query="select * from mst_question";

$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
						$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo "<h1 class=head1> Result</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
				echo "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><td>Wrong Answer<td> ". $w;
				echo "</table>";
				mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login',$tid,NOW(),$_SESSION[trueans])") or die(mysql_error());
				echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>There is No Qustions in this test</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
echo "<form name=myfm method=post action=quiz.php>";
echo "<div class='container'>
<div class='card'>
  <div class='card-header'>
  Subject Details
  <a href='sublist.php' class='float-right btn btn-primary'>Back</a>
  </div>
  <div class='card-body text-center'><br>";
$n=$_SESSION[qn]+1;
echo "<span class=style2>Que ".  $n .": $row[2]</style><br><br>";
echo "<div class='form-check'>
<input type='radio' class='form-check-input'  name='ans' value='1'>
<label class='form-check-label' for='materialUnchecked'>$row[3]</label>
</div>";
echo "<div class='form-check'>
<input type='radio' class='form-check-input'  name='ans' value='2'>
<label class='form-check-label' for='materialUnchecked'>$row[4]</label>
</div>";
echo "<div class='form-check'>
<input type='radio' class='form-check-input'  name='ans' value='3'>
<label class='form-check-label' for='materialUnchecked'>$row[5]</label>
</div>";
echo "<div class='form-check'>
<input type='radio' class='form-check-input'  name='ans' value='4'>
<label class='form-check-label' for='materialUnchecked'>$row[6]</label>
</div>";
// echo "<input type=radio name=ans value=1>$row[3]<br>";
// echo " <input type=radio name=ans value=2>$row[4]<br>";
// echo "<input type=radio name=ans value=3>$row[5]<br>";
// echo "<input type=radio name=ans value=4>$row[6]<br>";

if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<input type='submit' class='btn btn-primary' name='submit' value='Next Question'><br><br></form>";
else
echo "<input type='submit' class='btn btn-primary' name='submit' value='Get Result'><br><br></form>";
echo "</div></div></div>";
?>
</body>
</html>
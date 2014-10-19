<html>
<head>
<title>Get topics</title>
</head>
<body>
<h1>Enter twitter handle to get topics</h1>
<form name="gethandle" method="post" action="gettopic.php">
<input type="text" placeholder="Enter twitter handle" name="handle">
<br>
<input type="submit" value="Submit" name="submit">
</form>
</body>
</html>
<?php
include('klout_api.php');
if(isset($_POST['submit']))
{
	$apiobj=new klout_api();
	$handle=$_POST['handle'];
	$getid=$apiobj->getKloutID($handle);
	//echo "Hello ";
	//echo $getid;
	$gettopics=$apiobj->getTopics($getid);
	$apiobj->printTopics($gettopics);
	//print_r($gettopics);
}

?>
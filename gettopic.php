<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/darkly/bootstrap.min.css">
<title>Get topics</title>
</head>
<body>
	<div class="container">
<h1>Enter Twitter handle to get topics</h1>
<form name="gethandle" method="post" action="gettopic.php">
<input type="text" placeholder="Enter twitter handle" name="handle">
<br><br>
<input type="submit" value="Submit" name="submit">
</form>
<?php
include('klout_api.php');
if(isset($_POST['submit']))
{
	$apiobj=new klout_api();
	$handle=$_POST['handle'];
	$getid=$apiobj->getKloutID($handle);
	echo "<h3>".$handle."</h3>";
	$gettopics=$apiobj->getTopics($getid);
	$apiobj->printTopics($gettopics);
	
}

?>
</div>
</body>
</html>

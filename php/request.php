<?php
ini_set('display_errors',1); 
 error_reporting(E_ALL);
include 'Functions.php'; 
$result = "UNDEFINED"; 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$req = $_POST['request']; 
	switch($req)
	{
	case "CheckIfPasta":
		$result = CheckIfPasta($_POST['Pasta']); 
		break;
	case "GetQoute":
		$result = getrandomqoute(); 
		break;
	case "GetRandomPasta":
		$result = getrandompasta(); 
		break;
	default: 
		$result = "unknown request: " . $req; 
	echo $result;
	}// end switch on request

}

echo $result; 

?>

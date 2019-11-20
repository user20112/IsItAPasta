<?php
function ConnectToDataBase()
{
	$dsn = 'mysql:host=localhost;port=3306;dbname=IsItAPasta'; 
	$user = 'root';
	$password = 'Anorak!2'; 
	$handle = new PDO($dsn, $user, $password); 
	$handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	return $handle; 
}
function CheckIfPasta($Pasta)
{
	$conn; 
	try{

		$conn = ConnectToDataBase(); 

	}catch(PDOException $ex){
		return "open error: " . mysqli_connect_error() ; 
	}
	$sql = 'SELECT *FROM Pasta where Name="'.$Pasta.'";';  

	$proc_get_authors = $conn->prepare($sql);
	
	try{

		$rs = $proc_get_authors->execute(); 
	}catch(PDOException $ex){
		$conn = null; 
		return "Bad sql";
	}

	$rows = array(); 

	while($row = $proc_get_authors->fetch(PDO::FETCH_ASSOC)){
		$rows[] = $row; 
	}

	$retVal = json_encode($rows); 
	$conn = null; 

	return $retVal; 

}
function getrandomqoute()
{
	$conn; 

	try{

		$conn = ConnectToDataBase(); 

	}catch(PDOException $ex){
		return "open error: " . mysqli_connect_error() ; 
	}


	$sql = 'SELECT *FROM QouteTable ORDER BY RAND() LIMIT 1;';  

	$proc_get_authors = $conn->prepare($sql);
	
	try{

		$rs = $proc_get_authors->execute(); 
	}catch(PDOException $ex){
		$conn = null; 
		return "Bad sql";
	}

	$rows = array(); 

	while($row = $proc_get_authors->fetch(PDO::FETCH_ASSOC)){
		$rows[] = $row; 
	}

	$retVal = json_encode($rows); 
	$conn = null; 

	return $retVal; 

}
function getrandompasta()
{
	$conn; 

	try{

		$conn = ConnectToDataBase(); 

	}catch(PDOException $ex){
		return "open error: " . mysqli_connect_error() ; 
	}


	$sql = 'SELECT *FROM Pasta ORDER BY RAND() LIMIT 1;';  

	$proc_get_authors = $conn->prepare($sql);
	
	try{

		$rs = $proc_get_authors->execute(); 
	}catch(PDOException $ex){
		$conn = null; 
		return "Bad sql";
	}

	$rows = array(); 

	while($row = $proc_get_authors->fetch(PDO::FETCH_ASSOC)){
		$rows[] = $row; 
	}

	$retVal = json_encode($rows); 
	$conn = null; 

	return $retVal; 

}
?> 



<?php

	function dbConnect(){
		try
		{
			$db = new PDO('mysql:host=127.0.0.1;dbname=blog;charset=utf8', 'phpmyadminuser', 'password');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}	
		return $db;
	}
	



?>




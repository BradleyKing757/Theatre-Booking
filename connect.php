<?php
	function myconnect(){
		$host = 'dragon.ukc.ac.uk';
		$dbname = 'bjk24';
		$user = 'bjk24';
		$pwd = 'yto-lam';
		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($conn) {
				//echo 'Connected to '.$dbname;
				// here goes some other code that uses $conn ...
				//$conn = null; //(Uncomment to kill the connection)
				return $conn;
			} else {
				echo 'Failed to connect';
			}
		} catch (PDOException $e) {
			echo "PDOException: ".$e->getMessage();
		}
	}
?>

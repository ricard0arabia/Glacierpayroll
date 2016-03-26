<?php
	try {
	  $dbh = new PDO("mysql:host=localhost:8080;dbname=calendar", 'root', '');
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
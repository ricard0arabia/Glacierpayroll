<?php
	try {
	  $dbh = new PDO("mysql:host=mysql4.000webhost.com;dbname=a9287828_glacier", 'a9287828_glacier', '123456abc');
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
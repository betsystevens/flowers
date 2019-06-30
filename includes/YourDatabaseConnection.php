<?php
/*
 *  change this file name to DatabaseConnection.php 
 *  use your host, dbname, user and password
 *
 */
$pdo = new PDO('mysql:host=localhost;dbname=flowers;charset=utf8',
	'user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
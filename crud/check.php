<?php
include ('classses/databaseConnection.php');
$userName = $_POST['userName'];
$password = $_POST['password'];
//create connection
database::dbConnection();

//build query
$query = "SELECT * FROM accouts";
//read data
$accounts = database::read($query);
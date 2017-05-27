<?php

//database connection and query
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `customers`";
$stmt = $db->query($query);
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `admins`";
$stmt = $db->query($query);
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

//receive values

$userName = $_POST['uname'];
$pass = $_POST['psw'];

foreach ($customers as $customer){
    if($userName == $customer['user_name'] && $pass == $customer['password']){
        header("Location: user/index.php?id=".$customer['id']);
    }
}
foreach ($admins as $admin){
    if ($userName == $admin['name'] && $pass == $admin['password']){
        header("Location: admin/index.php");
    }
}
echo "Invalid User Name or Password";
//sleep(5);
//header("Location: index.php");
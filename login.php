<?php

//database connection and query
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `customers`";
$stmt = $db->query($query);
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `admins`";
$stmt = $db->query($query);

$db = null;
$query = null;
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

//receive values

$userName = $_POST['uname'];
$pass = $_POST['psw'];

foreach ($customers as $customer){
    if($userName == $customer['user_name'] && $pass == $customer['password']){
        session_start();
        $_SESSION['id'] = $customer['id'];
        $_SESSION['login'] = true;

        header("Location: user/index.php?id=".$customer['id']);

    }
}
foreach ($admins as $admin){
    if ($userName == $admin['name'] && $pass == $admin['password']){
        session_start();
        $_SESSION['id'] = $admin['id'];
        $_SESSION['login'] = true;

        header("Location: admin/index.php");
    }
}
echo "Invalid User Name or Password";

header("refresh:3;index.php");
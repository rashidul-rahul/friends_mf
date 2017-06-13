
<?php
//session_start();
//database connection and query
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `customers`";
$stmt = $db->query($query);
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `admins`";
$stmt = $db->query($query);

$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db = null;
$query = null;


//receive values

$userName = $_POST['uname'];
$pass = $_POST['psw'];

foreach ($customers as $customer){
    if($userName == $customer['user_name'] && $pass == $customer['password']){
        session_start();
        $_SESSION['customer_id'] = $customer['id'];
        $_SESSION['login'] = 'user';

        header("Location: user/index.php?id=".$customer['id']);
        exit();

    }
}
foreach ($admins as $admin){
    if ($userName == $admin['name'] && $pass == $admin['password']){
        session_start();
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['login'] = 'admin';

        header("Location: admin/index.php");
        exit();
    }
}
echo "Invalid User Name or Password";

header("Location: invalid.php");
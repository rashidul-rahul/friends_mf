<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION == true) {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");

//echo $_POST['image'];
    $query = "INSERT INTO `customers` (`first_name`, `last_name`, `user_name`, `father_name`, `mother_name`, `gender`, `date_birth`, `nid`, `address`, `contact`, `mail`, `password`) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', '" . $_POST['user_name'] . "', '" . $_POST['fathers_name'] . "', '" . $_POST['mothers_name'] . "', '" . $_POST['gender'] . "', '" . $_POST['dob'] . "', '" . $_POST['nid'] . "', '" . $_POST['address'] . "', '" . $_POST['contact_number'] . "', '" . $_POST['email'] . "', '" . $_POST['password'] . "');";
//echo $query;
    $userName = $_POST['user_name'];
//echo $userName;
    $stmt = $db->exec($query);
    if ($stmt) {
        echo 'ok';
        $query = "SELECT * FROM `customers";
        $stmt = $db->query($query);
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
        $db = null;
        foreach ($customers as $customer) {
            if ($customer['user_name'] == $userName) {
                //echo "<br/>".$customer['id'];
                header("Location: addNominee.php?id=" . $customer['id'] . "");
            }
        }
    } else {
        echo 'something wrong';
    }
} else{
    header("Location: loginRedirect.php");
}

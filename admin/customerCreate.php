<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");

    $targetDir = '../upload/';
    $targetFile = $targetDir.basename($_FILES['upload']['name']);
    $fileType = $_FILES['upload']['type'];
    $upload = move_uploaded_file($_FILES['upload']['tmp_name'],$targetFile);
    if ($upload){
        echo "upload ok";
    }
        echo
//echo $_POST['image'];
    $query = "INSERT INTO `customers` (`first_name`, `last_name`, `user_name`, `father_name`, `mother_name`, `gender`, `date_birth`, `nid`, `address`, `contact`, `mail`, `password`, `image`) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', '" . $_POST['user_name'] . "', '" . $_POST['fathers_name'] . "', '" . $_POST['mothers_name'] . "', '" . $_POST['gender'] . "', '" . $_POST['dob'] . "', '" . $_POST['nid'] . "', '" . $_POST['address'] . "', '" . $_POST['contact_number'] . "', '" . $_POST['email'] . "', '" . $_POST['password'] . "', '" . $targetFile . "');";
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
                echo "<br/>".$customer['id'];
                header("Location: addNominee.php?id=" . $customer['id'] . "");
            }
        }
    } else {
        echo 'something wrong';
    }
} else{
    header("Location: loginRedirect.php");
}

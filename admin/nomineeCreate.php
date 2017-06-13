<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");

    $targetDir = '../upload/';
    $targetFile = $targetDir.basename($_FILES['upload']['name']);
    $fileType = $_FILES['upload']['type'];
    $upload = move_uploaded_file($_FILES['upload']['tmp_name'],$targetFile);

    $query = "INSERT INTO `nominees` (`customer_id`, `first_name`, `last_name`, `father_name`, `mothers_name`, `gender`, `date_birth`, `nid`, `relation_customer`, `contact`, `image`) VALUES ('" . $_POST['customer_id'] . "', '" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', '" . $_POST['fathers_name'] . "', '" . $_POST['mothers_name'] . "', '" . $_POST['gender'] . "', '" . $_POST['dob'] . "', '" . $_POST['nid'] . "', '" . $_POST['relation'] . "', '" . $_POST['contact_number'] . "', '" . $targetFile . "');";
    $stmt = $db->exec($query);
    $query = null;
    $db = null;
    if ($stmt) {
        header("Location: addAccount.php?id=" . $_POST['customer_id'] . "");
    } else "INsert Problem";
} else{
    header("Location: loginRedirect.php");
}
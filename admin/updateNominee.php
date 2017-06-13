<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
    $query = "UPDATE `nominees` SET `first_name` = '" . $_POST['first_name'] . "',`gender` = '" . $_POST['gender'] . "', `last_name` = '" . $_POST['last_name'] . "', `father_name` = '" . $_POST['father_name'] . " ', `mothers_name` = '" . $_POST['mothers_name'] . "', `date_birth` = '" . $_POST['dob'] . "', `nid` = '" . $_POST['nid'] . "', `relation_customer` = '" . $_POST['relation_customer'] . "', `contact` = '" . $_POST['contact'] . "' WHERE `nominees`.`id` = " . $_POST['id'] . ";";
    $stmt = $db->exec($query);
    $query = null;
    $db = null;
    if ($stmt) {
        header("Location: viewCustomer.php?id=" . $_POST['customer_id']);
    }
} else{
    header("Location: loginRedirect.php");
}
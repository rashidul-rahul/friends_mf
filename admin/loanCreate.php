<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
    $query = "INSERT INTO `loans` (`name`, `amount`, `interest`, `duration`, `loan_id`, `details`) VALUES ('" . $_POST['name'] . "', '" . $_POST['amount'] . "', '" . $_POST['interest'] . "', '" . $_POST['duration'] . "', '" . $_POST['loan_id'] . "', '" . $_POST['details'] . "');";
//echo $query;
    $stmt = $db->exec($query);
    $query = null;
    $db = null;
    if ($stmt) {
        header("Location: allLoans.php");
    } else {
        echo 'not ok';
    }
}
else{
    header("Location: loginRedirect.php");
}


//


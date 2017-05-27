<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$loans_id= $_POST['loans'];
$account_id= $_POST['account'];
echo $loans_id."asd".$account_id;

$query = "INSERT INTO `map_account_loans` (`accounts_id`, `loans_id`) VALUES ('".$account_id."', '".$loans_id."');";
$stmt = $db->exec($query);
if ($stmt){
    echo "<br/>ok";
    header("Location: http://localhost/friends_mf/adminPanel/accounts/accountsList.php");
}else{
    echo "wrong";
}
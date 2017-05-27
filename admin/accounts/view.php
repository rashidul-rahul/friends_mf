<?php

$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
if(isset($_GET['customer_id'])){
    $query ="SELECT * FROM `accounts` WHERE customer_id = ".$_GET['customer_id']."";
}elseif (isset($_GET['id'])){
    $query ="SELECT * FROM `accounts` WHERE id = ".$_GET['id']."";
}
//echo $query;
$stmt = $db->query($query);
$account = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($customer);
?>
<html>
<head>
    <base href="http://localhost/friends_mf/">
</head>
<body>
<table>
    <td>
    <th><a href="index.php">Home</th>
    <th><a href="adminPanel/customers/customerList.php">All Customer</th>
    <th><a href="adminPanel/accounts/accountsList.php">All accounts</th>
    <th><a href="adminPanel/loans/loansList.php">All Loans</th>
    <th><a href="adminPanel/customers/addCustomer.php">Add Customer</th>
    <th><a href="adminPanel/loans/addloans.php">Add loan</th>
    <th><a href="adminPanel/assignLoans.php">Assign Loan</th>
    </td>
</table>
<br/>
<table>
    <tr>
        <td>Account No:</td>
        <td><?=$account[0]['account_no']?></td>
    </tr>
    <tr>
        <td>Total Money:</td>
        <td><?=$account[0]['total_money'];?></td>
    </tr>

</table>
</body>
</html>
<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `customers` WHERE id=".$_GET['id']."";
$stmt = $db->query($query);
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<h1>Accounts Information for <?=$customer[0]['first_name'].' '.$customer[0]['last_name']?></h1>
<form action="adminPanel/accounts/create.php" method="post">
    <input type="hidden" name="customer_id" value="<?=$_GET['id']?>">
    <table>
        <tr>
            <td><label for="account_number">Account Number: </label></td>
            <td><input type="text" id="account_number" name="account_number" placeholder="Account number"></td>
        </tr>
        <tr>
            <td><label for="deposit_amount">Deposite Money: </label></td>
            <td><input type="text" id="deposit_amount" name="deposit_amount" placeholder="Deposite Money"></td>
        </tr>
        <td><input type="submit" value="submit"></label></td>
        </tr>
    </table>
</form>
</body>
</html>
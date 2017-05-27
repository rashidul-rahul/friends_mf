<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query ="SELECT * FROM `nominees` WHERE customer_id = ".$_GET['customer_id']."";
//echo $query;
$stmt = $db->query($query);
$nominee = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <td>Customer Name:</td>
        <td><?=$nominee[0]['first_name']." ".$nominee[0]['last_name']?></td>
    </tr>
    <tr>
        <td>Father's Name:</td>
        <td><?=$nominee[0]['father_name'];?></td>
    </tr>
    <tr>
        <td>Mother's Name:</td>
        <td><?=$nominee[0]['mothers_name'];?></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><?=$nominee[0]['gender'];?></td>
    </tr>
    <tr>
        <td>Date of Birth:</td>
        <td><?=$nominee[0]['date_birth'];?></td>
    </tr>
    <tr>
        <td>National ID No:</td>
        <td><?=$nominee[0]['nid'];?></td>
    </tr>
    <tr>
        <td>Relation:</td>
        <td><?=$nominee[0]['relation_customer'];?></td>
    </tr>
    <tr>
        <td>Mail Address:</td>
        <td><?=$nominee[0]['contact'];?></td>
    </tr>
</table>
</body>

</html>
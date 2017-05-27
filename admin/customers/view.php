<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query ="SELECT * FROM `customers` WHERE id = ".$_GET['id']."";
//echo $query;
$stmt = $db->query($query);
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <td><?=$customer[0]['first_name']." ".$customer[0]['last_name']?></td>
    </tr>
    <tr>
        <td>User Name:</td>
        <td><?=$customer[0]['user_name'];?></td>
    </tr>
    <tr>
        <td>Father's Name:</td>
        <td><?=$customer[0]['father_name'];?></td>
    </tr>
    <tr>
        <td>Mother's Name:</td>
        <td><?=$customer[0]['mother_name'];?></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><?=$customer[0]['gender'];?></td>
    </tr>
    <tr>
        <td>Date of Birth:</td>
        <td><?=$customer[0]['date_birth'];?></td>
    </tr>
    <tr>
        <td>National ID No:</td>
        <td><?=$customer[0]['nid'];?></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td><?=$customer[0]['address'];?></td>
    </tr>
    <tr>
        <td>Contact number:</td>
        <td><?=$customer[0]['contact'];?></td>
    </tr>
    <tr>
        <td>Mail Address:</td>
        <td><?=$customer[0]['mail'];?></td>
    </tr>
    <tr>
        <td><a href="adminPanel/accounts/view.php?customer_id=<?=$_GET['id']?>"><h2>ACCOUNT INFORMATION</h2></a></td>
        <td><h2>         </h2></></td>
        <td><a href="adminPanel/nominees/view.php?customer_id=<?=$_GET['id']?>"><h2>NOMINEES INFORMATION</h2></a></td>
    </tr>
</table>
</body>

</html>
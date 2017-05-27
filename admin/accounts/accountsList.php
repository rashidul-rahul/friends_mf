<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT customers.first_name, customers.last_name, accounts.id as account_id, accounts.account_no, accounts.total_money, loans.id, loans.name FROM `customers` LEFT JOIN accounts ON customers.id = accounts.customer_id LEFT JOIN map_account_loans ON accounts.id = map_account_loans.accounts_id LEFT JOIN loans ON map_account_loans.loans_id = loans.id";
$stmt = $db->query($query);
$customerAndLoans = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<br/>
<br/>
<table border="2px">
    <thead>
    <tr>
        <th>NO</th>
        <th>Account Name</th>
        <th>Account No</th>
        <th>Total Amount</th>
        <th>Loans</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    foreach ($customerAndLoans as $customerAndLoan) {
        $count++;
        ?>
        <tr>
            <td><?=$count?></td>
            <td><?=$customerAndLoan['first_name']." ".$customerAndLoan['last_name'];?></td>
            <td><?=$customerAndLoan['account_no']?></td>
            <td><?=$customerAndLoan['total_money']?> BDT</td>
            <td><?=$customerAndLoan['name']?></td>
            <td><a href="adminPanel/accounts/edit.php">Edit</a> | <a href="adminPanel/accounts/view.php?id=<?=$customerAndLoan['account_id']?>">View</a>
                | <a href="adminPanel/accounts/delete.php">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</body>
</html>
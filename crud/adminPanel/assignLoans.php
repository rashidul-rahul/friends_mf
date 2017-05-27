<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT accounts.id AS account_id, accounts.account_no, loans.id AS loans_id, loans.name FROM `accounts` LEFT JOIN map_account_loans ON accounts.id = map_account_loans.accounts_id LEFT JOIN loans ON map_account_loans.loans_id = loans.id";
$stmt = $db->query($query);
$accountsAndLoans = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<h2>Assign Loan</h2>
<form action="adminPanel/assign.php" method="post">
<label for="account">Select Account</label>
<select id="account" name = "account">
    <?php
    foreach ($accountsAndLoans as $accountsAndLoan) {
        ?>
        <option value="<?=$accountsAndLoan['account_id']?>"><?=$accountsAndLoan['account_no']?></option>
        <?php
    }
    ?>
</select>
<br/>
<br/>
<br/>
<label for="loans">Select Loan:</label>
<select id="loans" name = "loans" class=" size=15">
    <?php
    foreach ($accountsAndLoans as $accountsAndLoan) {
        ?>
        <option value="<?= $accountsAndLoan['loans_id'] ?>"><?= $accountsAndLoan['name'] ?></option>
        <?php
    }
?>
</select>
    <br/>
    <input type="submit" value="Submit">
</form>
</body>
</html>
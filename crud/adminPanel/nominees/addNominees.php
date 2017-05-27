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
<h1>Nominee's Information for <?=$customer[0]['first_name'].' '.$customer[0]['last_name']?></h1>
<form action="adminPanel/nominees/create.php" method="post">
    <input type="hidden" name="customer_id" value="<?=$_GET['id']?>">
    <table>
        <tr>
            <td><label for="first_name">First Name: </label></td>
            <td><input type="text" id="first_name" name="first_name" placeholder="First Name"></td>
        </tr>
        <tr>
            <td><label for="last_name">Last Name: </label></td>
            <td><input type="text" id="last_name" name="last_name" placeholder="Last Name"></td>
        </tr>
        <tr>
            <td><label for="fathers_name">Father's Name: </label></td>
            <td><input type="text" id="fathers_name" name="fathers_name" placeholder="Father's Name"></td>
        </tr>
        <tr>
            <td><label for="mothers_name">Mother's Name: </label></td>
            <td><input type="text" id="mothers_name" name="mothers_name" placeholder="Mothers's Name"></td>
        </tr>
        <tr>
            <td><label for="gender">Gender: </label></td>
            <td><input type="radio" id="gender" name="gender" value="male" >Male</td>
            <td><input type="radio" id="gender" name="gender" value="female">Female</td>
        </tr>
        <tr>
            <td><label for="dob">Date Of Birth: </label></td>
            <td><input type="text" id="dob" name="dob" placeholder="day/month/year"></td>
        </tr>
        <tr>
            <td><label for="nid">National Id Card NO: </label></td>
            <td><input type="text" id="nid" name="nid" placeholder=""></td>
        </tr>
        <tr>
            <td><label for="relation">Relation With Customer: </label></td>
            <td><input type="text" id="relation" name="relation" placeholder="relation"></td>
        </tr>
        <tr>
            <td><label for="contact_number">Contact Number: </label></td>
            <td><input type="text" id="contact_number" name="contact_number" placeholder="Contact Number"></td>
        </tr>
            <td><input type="submit" value="Next"></label></td>
        </tr>
    </table>
</form>
</body>
</html>

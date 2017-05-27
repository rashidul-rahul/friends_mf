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
<h1>Customer's Information</h1>
<form action="adminPanel/customers/create.php" method="post">
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
            <td><label for="user_name">User Name: </label></td>
            <td><input type="text" id="user_name" name="user_name" placeholder="User Name"></td>
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
            <td><label for="address">Address: </label></td>
            <td><input type="text" id="address" name="address" placeholder="Address"></td>
        </tr>
        <tr>
            <td><label for="contact_number">Contact Number: </label></td>
            <td><input type="text" id="contact_number" name="contact_number" placeholder="Contact Number"></td>
        </tr>
        <tr>
            <td><label for="email">Email: </label></td>
            <td><input type="text" id="email" name="email" placeholder="example@email.com"></td>
        </tr>
        <tr>
            <td><label for="password">Password: </label></td>
            <td><input type="text" id="password" name="password" placeholder="*******"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Next"></label></td>
        </tr>
    </table>
</form>
</body>
</html>
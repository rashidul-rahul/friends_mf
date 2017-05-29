<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query ="SELECT * FROM `customers` WHERE id=".$_GET['id'];
$stmt = $db->query($query);
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatleft logo">
                <img src="img/logo_friends.jpg" alt="Logo" />
            </div>
            <div class="floatleft middle">
                <h1>Friends Micro Finance</h1>
                <p>Admin Panel</p>
            </div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>Hello Admin</li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">
        <ul class="nav main">
            <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
            <li class="ic-form-style"></li>
            <li class="ic-typography"><a href="addCustomer.php">Add Customers</a></li>
            <li class="ic-typography"><a href="addLoans.php">Add Loan</a></li>
            <li class="ic-typography"><a href="deposit.php">Deposit</a></li>
            <li class="ic-typography"><a href="withdraw.php">Withdraw</a></li>
            <li class="ic-typography"><a href="assignLoan.php"><span>Assign Loan</span></a> </li>
            <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
        </ul>
    </div>
    <div class="clear">
    </div>
    <div class="grid_2">
        <div class="box sidemenu">
            <div class="block" id="section-menu">
                <ul class="section menu">
                    <li><a class="menuitem">Customers</a>
                        <ul class="submenu">
                            <li><a href="allCustomers.php">All Customers</a></li>
                            <li><a href="addCustomer.php">Add Customers</a></li>

                        </ul>
                    </li>

                    <li><a class="menuitem">Account</a>
                        <ul class="submenu">
                            <li><a href="allAccounts.php">All Accounts</a></li>
                            <li><a href="editAccount.php">Edit Accounts</a></li>

                        </ul>
                    </li>
                    <li><a class="menuitem">Loan</a>
                        <ul class="submenu">
                            <li><a href="allLoans.php">All Loans</a> </li>
                            <li><a href="addLoans.php">Add Loans</a> </li>
                            <li><a href="editLoan.php">Edit Loans</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="grid_10">

        <div class="box round first grid">
            <h2> Edit Customer</h2>
            <div class="block">
                <form action="updateCustomer.php" method="post">
                    <input value="<?=$customer[0]['id']?>" name="id" type="hidden">
                    <div class="form-group">
                        <label for="first_name">First Name: </label>
                        <input class="form-control" type="text" id="first_name" name="first_name" value="<?=$customer[0]['first_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name: </label>
                        <input class="form-control" type="text" id="last_name" name="last_name" value="<?=$customer[0]['last_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="user_name">User Name: </label>
                        <input class="form-control" type="text" id="user_name" name="user_name" value="<?=$customer[0]['user_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="father_name">Fathers Name: </label>
                        <input class="form-control" type="text" id="father_name" name="father_name" value="<?=$customer[0]['father_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Mothers Name: </label>
                        <input class="form-control" type="text" id="mother_name" name="mother_name" value="<?=$customer[0]['mother_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender: </label>
                        <input class="form-control" type="t" id="gender" name="gender" value="<?=$customer[0]['gender']?>">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth: </label>
                        <input class="form-control" type="text" id="dob" name="dob" value="<?=$customer[0]['date_birth']?>">
                    </div>
                    <div class="form-group">
                        <label for="nid">National ID Card: </label>
                        <input class="form-control" type="text" id="nid" name="nid" value="<?=$customer[0]['nid']?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input class="form-control" type="text" id="address" name="address" value="<?=$customer[0]['address']?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact_number: </label>
                        <input class="form-control" type="text" id="contact" name="contact" value="<?=$customer[0]['contact']?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Mail Address: </label>
                        <input class="form-control" type="text" id="mail" name="mail" value="<?=$customer[0]['mail']?>">
                    </div>
                    <div class="form-group">
                        <label for="password">password: </label>
                        <input class="form-control" type="text" id="password" name="password" value="<?=$customer[0]['password']?>">
                    </div>
                    <button  type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clear">
</div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
        &copy; Copyright Friends Micro Finance. All Rights Reserved.
    </p>
</div>
</body>
</html>


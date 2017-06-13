<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $wrong = 1;
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
    $query = "SELECT * FROM `accounts`";
    $stmt = $db->query($query);
//echo $query;
    $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($accounts as $account) {
        if ($account['account_no'] == $_POST['account_number']) {
            $query = "SELECT * FROM `accounts` LEFT JOIN customers ON accounts.customer_id = customers.id WHERE accounts.account_no = " . $account['account_no'];
            $stmt = $db->query($query);
            $accountAndCustomer = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $wrong = 0;
//        echo 'ok';
            break;
        }
//    echo $_POST['account_number'].' and '.$account['account_no'];
//    echo "<br/>";
    }
    $query = null;
    $db = null;
}else{
    header("Location: loginRedirect.php");
}



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
            <h2> Check Deposit</h2>
            <div class="block">
                <?php
                    if ($wrong==1){
                        echo "Can't Find The Account Number<br/>";
                        echo "<a href='deposit.php'>Go Back</a>";
                    }else {
                        ?>
                        Account Holder Name : <?= $accountAndCustomer[0]['first_name'] . ' ' . $accountAndCustomer[0]['last_name'] ?>
                        <br/>
                        <br/>
                        Account Number : <?= $accountAndCustomer[0]['account_no'] ?>
                        <br/>
                        <br/>
                        Total Money : <?= $accountAndCustomer[0]['total_money'] ?>
                        <br/>
                        <br/>

                        <form action="updateMoney.php" method="post">
                            <input name="customer_id" type="hidden"
                                   value="<?= $accountAndCustomer[0]['customer_id'] ?>">
                            <div class="form-group">
                                <label for="inputAmount">Enter Amount:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">BDT</div>
                                    <input type="text" class="form-control" id="inputAmount" name="inputAmount"
                                           placeholder="Amount">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Deposit</button>
                        </form>
                        <?php
                    }
                ?>
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


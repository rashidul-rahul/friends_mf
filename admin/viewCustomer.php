<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query ="SELECT * FROM `customers` WHERE id = ".$_GET['id']."";
//echo $query;
$stmt = $db->query($query);
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($customer);
$query ="SELECT * FROM `nominees` WHERE customer_id = ".$customer[0]['id']."";
$stmt = $db->query($query);
$nominee = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($nominee);
$query ="SELECT * FROM `accounts` WHERE customer_id = ".$customer[0]['id']."";
$stmt = $db->query($query);
$account = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query ="SELECT * FROM `map_account_loans` LEFT JOIN loans ON map_account_loans.loans_id = loans.id WHERE accounts_id=".$account[0]['id']."";
$stmt = $db->query($query);
$loan = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <li class="ic-typography"><a href="assignLoan.php>"><span>Assign Loan</span></a> </li>
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
            <h2> Customer Information</h2>
            <div class="block">
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
                </table>
                <div>
                    <a href="editCustomer.php?id=<?=$customer[0]['id']?>">Edit Customer Information</a>
                </div>
            </div>
        </div>
            <div class="box round first grid">
                <h2> Nominee Information</h2>
                <div class="block">
                    <table>
                        <tr>
                            <td>Niminee Name:</td>
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
                            <td>Contact number:</td>
                            <td><?=$nominee[0]['contact'];?></td>
                        </tr>
                    </table>
                    <div>
                        <a href="editNominee.php?id=<?=$nominee[0]['id']?>">Edit Nominee Information</a>
                    </div>
                </div>
        </div>
        <div class="box round first grid">
            <h2> Account Information</h2>
            <div class="block">
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
                <div>
                    <a href="loadAccount.php?id=<?=$account[0]['id']?>">Edit Account Information</a>
                </div>
            </div>
        </div>
        <div class="box round first grid">
            <h2> Active Loan</h2>
            <div class="block">
                <table>
                    <tr>
                        <td>Loan Name:</td>
                        <td><?=$loan[0]['name']?></td>
                    </tr>
                </table>
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

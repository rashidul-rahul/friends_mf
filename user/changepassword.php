<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == 'user') {
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `customers` WHERE id=".$_GET['id'];
//echo $query;
$stmt = $db->query($query);
$db = null;
$query = null;
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
    header("Location: loginRedirect.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> User</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
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
                <p>User Panel</p>
            </div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="<?=$customer[0]['image']?>" alt="Profile Pic"  style="width: 27px; height: 27px;"/></div>
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>Hello <?=$customer[0]['first_name']?></li>
                        <li><a href="../admin/logout.php">Logout</a></li>
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
            <li class="ic-dashboard"><a href="index.php?id=<?=$_GET['id']?>"><span>Dashboard</span></a> </li>
            <li class="ic-form-style"></li>
            <li class="ic-typography"><a href="changepassword.php?id=<?=$_GET['id']?>"><span>Change Password</span></a></li>
        </ul>
    </div>
    <div class="clear">
    </div>
    <div class="grid_2">
        <div class="box sidemenu">
            <div class="block" id="section-menu">
                <ul class="section menu">
                    <li><a class="menuitem">Profile Option</a>
                        <ul class="submenu">
                            <li><a href="profile.php?id=<?=$_GET['id']?>">View Profile</a></li>
                            <li><a href="myNominee.php?id=<?=$_GET['id']?>">My Nominee</a></li>

                        </ul>
                    </li>

                    <li><a class="menuitem">Account</a>
                        <ul class="submenu">
                            <li><a href="myAccount.php?id=<?=$_GET['id']?>">My account</a></li>
                        </ul>
                    </li>
                    <li><a class="menuitem">Loan</a>
                        <ul class="submenu">
                            <li><a href="myLoan.php?id=<?=$_GET['id']?>">My Loan</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="grid_10">

        <div class="box round first grid">
            <h2> Change Password</h2>
            <div class="block">
                <form action="change.php?id=<?=$customer[0]['id']?>" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <label for="oldPass">Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..." id="oldPass"  name="oldPass" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="newPass">New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." id="newPass" name="newPass" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
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


<?php
include "inc/header.php";

?>


<form class=" " action="check.php" method="post">
    <div class="imgcontainer">
        <img src="img/logo.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container login">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">

        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <a href="" style="color: darkred;font-weight: bolder">FORGOT password!! </a>

    </div>
</form>

<?php
session_start();
echo "LOGOUT SUCCESSFUL";
session_destroy();
header('refresh:3;../index.php');
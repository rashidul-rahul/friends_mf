<?php
session_start();

echo "logout successful";
session_destroy();
header('refresh:3;../index.php');
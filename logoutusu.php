<?php
require 'configlog.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: loginusu.php");
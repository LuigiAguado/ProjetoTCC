<?php

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();
session_start();

header("Location: index.html");
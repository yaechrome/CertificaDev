<?php

session_start();
unset ($SESSION['username']);
session_destroy();

$url =  "//{$_SERVER['HTTP_HOST']}/login/Login.html";
header("Location: {$url}");

?>
<?php
require_once 'core/init.php';

$user = new user();
$user->logout();

Redirect::to('login.php');
?>
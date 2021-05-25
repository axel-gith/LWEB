<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
unset($_SESSION);
session_destroy();
?>


<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>logout</title>
 <?php require_once("style.cookies.php");?>
</head>

<body>
    <?php require("partials\menu.php"); ?>
<p>razie della visita, ciao ciao</p>

<hr />
<?php require_once("partials\\footer.php"); ?>
</body>
</html>
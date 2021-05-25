<?php
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['accessoPermesso'])) 
    header('Location: auth\login.php');
echo '<?xml version="1.0" encoding="UTF-8"?>';

//-------CONNESSIONE AL DB--------
require_once("connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>E-Commerce</title>
    <?php require_once("style.cookies.php");?>
	<link href="https://fonts.googleapis.com/css?family=Rouge+Script" rel="stylesheet">
</head>
<body>
	<?php
        $total = $_POST['totalAmount'];
        //-------STAMPA MENU'--------
        require("partials\menu.php");


        if (!$_SESSION['carrello'] && !isset($_POST['sex']))  {
        echo "<p> - Non c'erano elementi nel carrello - </p>";
        } else {
            echo "<h1>Thank you for your purchase</h1>";
            $sqlQuery = "SELECT sommaSpesa FROM $userTable WHERE userId = {$_SESSION['numeroUtente']}";
            if(!$resultQ = mysqli_query($mysqliConnection, $sqlQuery)){
                echo "Can't retrive total amount spent by {$_SESSION['userName']}";
                exit();
            }
            while($row = mysqli_fetch_array($resultQ)){
                //echo "La somma dentro il DB e': {$row['sommaSpesa']}"
                echo "<h1>You spent {$row['sommaSpesa']} € today </h1>";
                $total += $row['sommaSpesa'];
                
            }
            echo "<h1>In total you spent $total € in our store </h1>";
            $sqlQuery = "UPDATE $userTable SET sommaSpesa = $total WHERE userId = {$_SESSION['numeroUtente']}";
            if(!$resultQ = mysqli_query($mysqliConnection, $sqlQuery)){
                echo "Can't update user table";
                exit();
            }
            $_SESSION['carrello']=array();
        }
        require_once("partials\\footer.php");
    ?>
</body>
</html>
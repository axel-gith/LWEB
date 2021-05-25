<?php
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
        //-------STAMPA MENU'--------
        require("partials\menu.php");
        echo "<p>Benvenuti sulla migliore homepage di sempre</p>";

        //-------QUERY--------
        $sqlQuery = "SELECT * from $clothingTable ";
        $sqlQuery .= "WHERE clothingSex = 'm'";

        if(!$resultQ = mysqli_query($mysqliConnection, $sqlQuery)){
            echo "Can't retrive clothing table";
            exit();
        }

        //-------STAMPA PRODOTTI PRESI DA LA TABELLA DEI VESTITI DA UOMO--------
        while($row = mysqli_fetch_array($resultQ)){
            echo "<div class=\"product\">";
                echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\">";
                echo "<h4>{$row['clothingType']}</h4>";
                echo "<img src=\"{$row['clothingImg']}\">";
                echo "<p class=\"price\">{$row['cost']} €</p>";
                echo "<button type=\"submit\" name=\"invio\" value=\"addCart\">Add to Cart</button>";
                echo "<input type=\"hidden\" name=\"sex\" value=\"{$row['clothingSex']}\">";
                echo "<input type=\"hidden\" name=\"itemId\" value=\"{$row['clothingId']}\">";
                echo "</form>";
            echo "</div>";
        }
        require_once("addCart.php");
        require_once("partials\\footer.php");
    ?>
</body>
</html>
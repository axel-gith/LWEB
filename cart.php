<?php
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_WARNING);
echo '<?xml version="1.0" encoding="UTF-8"?>';

//-------CONNESSIONE AL DB--------
require_once("connection.php")
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
        $totalAmount = 0;
        //-------STAMPA MENU'--------
        require("partials\menu.php");
        if (!$_SESSION['carrello'] && !$_POST['sex'] || $_POST['checkoutButton'] == "reset" )  {
            unset($_SESSION);
            session_destroy();
            echo "<p> - carrello vuoto - </p>";
        } else {
    ?>
            <table border=\"5\">
            <thead>
            <th>ID</th>
            <th>clothingType</th>
            <th>Sex</th>
            <th>imgLink</th>
            <th>cost</th>
            </thead>
            <tbody>
    <?php
            foreach ($_SESSION['carrello'] as $v){
                $sqlQuery = "SELECT * from $clothingTable ";
                $sqlQuery .= "WHERE clothingId = $v";
                //echo "Only for debbuging: $sqlQuery";
                if(!$resultQ = mysqli_query($mysqliConnection, $sqlQuery)){
                    echo "Can't retrive mens clothing table";
                    exit();
                }   
            
                while($row = mysqli_fetch_array($resultQ)){
                    echo "<tr>";
                    echo "<td>";
                    echo "{$row['clothingId']}";
                    echo "</td>";
                    echo "<td>";
                    echo "{$row['clothingType']}";
                    echo "</td>";
                    echo "<td>";
                    echo "{$row['clothingSex']}";
                    echo "</td>";
                    echo "<td>";
                    echo "<img id=\"thumbnail\" src=\"{$row['clothingImg']}\">";
                    echo "</td>";
                    echo "<td>";
                    echo "{$row['cost']}";	
                    echo "</td>";
                    echo "</tr>";
                    $totalAmount += $row['cost'];   
                }
            } 
            echo "</tbody>";
            echo "</table>";
        }
        echo "Total: $totalAmount";    
        echo "<form action=\"checkout.php\" method=\"post\">";
            echo "<button name=\"checkoutButton\" value=\"checkout\">Acquista prodotti</button>";
            echo "<input type=\"hidden\" name=\"totalAmount\" value=\"$totalAmount\">";
        echo "</form>";
        echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\">";
            echo "<button name=\"checkoutButton\" value=\"reset\">Svuota carrello</button>";
        echo "</form>";
        require_once("partials\\footer.php");
    ?>
</body>
</html>
    <div class="navItem"><a href="index.php">HOMEPAGE</a></div>
    <div class="navItem"><a href="men.php">MENS CLOTHING</a></div>
    <div class="navItem"><a href="women.php">WOMENS CLOTHING</a></div>
    <div class="navItem"><a href="cart.php">CART</a></div>
<?php      
    if(!isset($_SESSION['accessoPermesso'])){
        echo"	<div class=\"navItem authButton\"><a href=\"login.php\">LOGIN</a></div>";
        echo"	<div class=\"navItem authButton\"><a href=\"register.php\">REGISTER</a></div>";
    } else {
        echo"	<div class=\"navItem authButton\">Welcome {$_SESSION['userName']}</div>";
        echo"	<div class=\"navItem authButton\"><a href=\"logout.php\">LOGOUT</a></div>";
    }

?>
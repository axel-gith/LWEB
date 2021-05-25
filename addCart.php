<?php        
    if (!isset($_SESSION['carrello']) && !isset($_POST['sex']))  {
        $_SESSION['carrello']=array();
        echo "<p> - carrello vuoto - </p>";
    } else {
        if ( isset($_POST['sex'])) {
            //echo "<p>inserisco".$_POST['selection']."</p>";
            $_SESSION['carrello'][] = $_POST['itemId'];
        }
        if(empty($_SESSION['carrello']))
            echo "<p> - carrello vuoto - </p>";
        else
            echo "<p>contenuto del carrello:</p>";
        echo "<ul>";
        foreach ($_SESSION['carrello'] as $k=>$v)
            echo "<li>[$k] $v</li>";
        echo "</ul>";
    }    
?>

    <?php  
        require_once("connection-variables.php");
        
         $mysqliConnection = new mysqli($host,$username,$password,$dbName);
        if(mysqli_connect_errno()){
            echo "Non sono riuscito a stabilire una connesione con il DB. Errore: " . mysqli_connect_error();
            exit();
        }
    ?>    
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Popolamento DB</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
    <h3>creazione e popolazione ecommercedb</h3>

    <?php 
        error_reporting(E_ALL &~E_NOTICE);

        require_once("connection-variables.php");



        //---------------CREAZIONE DB--------------- 
        $mysqliConnection = new mysqli($host,$username,$password);
        if(mysqli_connect_errno()){
            echo "Non sono riuscito a stabilire una connesione con il DB. Errore: " . mysqli_connect_error();
        }

        $queryDbCreation = "CREATE DATABASE $dbName";

        if(mysqli_query($mysqliConnection, $queryDbCreation)){
            echo "...Database created successfully...";
        } else {
            echo "Something went wrong :(";
        }

        $mysqliConnection -> close();

        //---------------CONNESSIONE AL DB CREATO IN PRECEDENZA--------------- 
        $mysqliConnection = new mysqli($host,$username,$password,$dbName);
        if(mysqli_connect_errno()){
            echo "Non sono riuscito a stabilire una connesione con il DB. Errore: " . mysqli_connect_error();
            exit();
        }

        //---------------CREAZIONE TABELLA DEGLI UTENTI--------------- 
        $sqlQuery = "CREATE TABLE if not exists $userTable (";
        $sqlQuery .= "userId int NOT NULL auto_increment, primary key (userId),";
        $sqlQuery .= "userName varchar (20) NOT NULL UNIQUE,";
        $sqlQuery .= "password varchar (20) NOT NULL,";
        $sqlQuery .= "sommaSpesa float);";

        //echo "Only for debugging: $sqlQuery"."\n";

        if($resultQuery = mysqli_query($mysqliConnection, $sqlQuery)){
            echo "...User table created successfully...";
        } else {
            echo "There has been an error with the creation of the user table :("; 
            exit();
        }

        //---------------CREAZIONE TABELLA DEI VESTITI DA UOMO--------------- 
        $sqlQuery = "CREATE TABLE if not exists $clothingTable (";
        $sqlQuery .= "clothingId int NOT NULL auto_increment, primary key (clothingId),";
        $sqlQuery .= "clothingType varchar (50) NOT NULL,";
        $sqlQuery .= "clothingSex char (1) NOT NULL,";
        $sqlQuery .= "clothingImg varchar (200),";
        $sqlQuery .= "cost float);";

        //echo "Only for debugging: $sqlQuery \n";

        if($resultQuery = mysqli_query($mysqliConnection, $sqlQuery)){
            echo "...Mens clothing table created successfully...";
        } else {
            echo "There has been an error with the creation of the user table :("; 
            exit();
        }

        echo mysqli_errno($mysqliConnection);

        //---------------INIZIO POPOLAMENTO DELLE TABELLE CREATE IN PRECEDENZA--------------- 
        //---------------USERS----------------
        $sqlQuery = "INSERT INTO $userTable ";
        $sqlQuery .= "(userName, password, sommaSpesa)";
        $sqlQuery .= "VALUES (\"user\",\"user\", \"0\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento User eseguito ...\n");
        else {
            printf("Couldn't populate user table.\n");
        exit();
        }
        //---------------MENS CLOTHING----------------
        $sqlQuery = "INSERT INTO $clothingTable ";
        $sqlQuery .= "(clothingType,clothingSex, clothingImg, cost)";
        $sqlQuery .= "VALUES (\"pants\",\"m\",\"https://cdn.pixabay.com/photo/2015/06/19/09/39/lonely-814631_960_720.jpg\",\"120\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento vestiti eseguito ...\n");
        else {
            printf("Couldn't populate clothing table.\n");
        exit();
        }

        $sqlQuery = "INSERT INTO $clothingTable ";
        $sqlQuery .= "(clothingType,clothingSex, clothingImg, cost)";
        $sqlQuery .= "VALUES (\"shirt\",\"m\",\"https://images.unsplash.com/photo-1606576036860-16aee9602a37?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1021&q=80\",\"124.50\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento vestiti eseguito ...\n");
        else {
            printf("Couldn't populate clothing table.\n");
        exit();
        }

        $sqlQuery = "INSERT INTO $clothingTable ";
        $sqlQuery .= "(clothingType,clothingSex, clothingImg, cost)";
        $sqlQuery .= "VALUES (\"jacket\",\"m\",\"https://cdn.pixabay.com/photo/2015/03/26/09/54/person-690547_960_720.jpg\",\"1.50\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento vestiti eseguito ...\n");
        else {
            printf("Couldn't populate clothing table.\n");
        exit();
        }
        //---------------WOMENS CLOTHING----------------
        $sqlQuery = "INSERT INTO $clothingTable ";
        $sqlQuery .= "(clothingType,clothingSex, clothingImg, cost)";
        $sqlQuery .= "VALUES (\"pants\",\"w\",\"https://cdn.pixabay.com/photo/2014/05/21/14/54/feet-349687_960_720.jpg\",\"10\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento vestiti eseguito ...\n");
        else {
            printf("Couldn't populate clothing table.\n");
        exit();
        }

        $sqlQuery = "INSERT INTO $clothingTable ";
        $sqlQuery .= "(clothingType,clothingSex, clothingImg, cost)";
        $sqlQuery .= "VALUES (\"shirt\",\"w\",\"https://images.unsplash.com/photo-1543087903-1ac2ec7aa8c5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1374&q=80\",\"14.50\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento vestiti eseguito ...\n");
        else {
            printf("Couldn't populate clothing table.\n");
        exit();
        }

        $sqlQuery = "INSERT INTO $clothingTable ";
        $sqlQuery .= "(clothingType,clothingSex, clothingImg, cost)";
        $sqlQuery .= "VALUES (\"jacket\",\"w\",\"https://cdn.pixabay.com/photo/2016/11/16/10/26/girl-1828536_960_720.jpg\",\"11.50\")";

        if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
            printf("popolamento vestiti eseguito ...\n");
        else {
            printf("Couldn't populate clothing table.\n");
        exit();
        }

        //----------STAMPA DELLE TABELLE (PRESE DAL DB)-------------

        //----------TABELLA UTENTI----------

        $sqlQuery = "SELECT * from $userTable";

        if(!$resultQ = mysqli_query($mysqliConnection, $sqlQuery)){
            echo "Can't retrive user table";
            exit();
        }   

        echo "<table border=\"5\">";
		echo "<thead>";
	    echo "<th>userID</th>";
		echo "<th>userName</th>";
		echo "<th>password</th>";
		echo "<th>totalSpent</th>";
		echo "</thead>";
        echo "<tbody>";
        while($row = mysqli_fetch_array($resultQ)){
            echo "<tr>";
            echo "<td>";
            echo "{$row['userId']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['userName']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['password']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['sommaSpesa']}";	
            echo "</td>";
            echo "</tr>";    
        }
        echo "</tbody>";
        echo "</table>";

        //----------TABELLA VESTITI UOMO----------

        $sqlQuery = "SELECT * from $clothingTable";

        if(!$resultQ = mysqli_query($mysqliConnection, $sqlQuery)){
            echo "Can't retrive clothing table";
            exit();
        }   
  
        echo "<table border=\"5\">";
		echo "<thead>";
	    echo "<th>ID</th>";
		echo "<th>clothingType</th>";
		echo "<th>Sex</th>";
		echo "<th>imgLink</th>";
		echo "<th>cost</th>";
		echo "</thead>";
        echo "<tbody>";
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
            echo "{$row['clothingImg']}";
            echo "</td>";
            echo "<td>";
            echo "{$row['cost']}";	
            echo "</td>";
            echo "</tr>";    
        }
        echo "</tbody>";
        echo "</table>";

        mysqli_close($mysqliConnection);
    ?>
</body>

</html>
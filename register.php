    <?php 
        session_start();  
           error_reporting(E_ALL);
        require_once("connection.php");
     
        if(isset($_POST['userName']) && isset($_POST['password']) && !isset($_SESSION['accessoPermesso'])){
            $sqlQuery = "INSERT INTO $userTable ";
            $sqlQuery .= "(userName, password, sommaSpesa)";
            $sqlQuery .= "VALUES (\"{$_POST['userName']}\",\"{$_POST['password']}\", \"0\")";
            if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
                printf("Utente creato correttamente\n");
            else {
                printf("Couldn't populate user table.\n");
                exit();
            }
        }
    ?>    

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Registrazione</title>
 <?php require_once("style.cookies.php");?>
</head>

<body>
    <?php require("partials\menu.php"); ?>
    <div class="loginForm">
        <h2>Registrati al sito più fantatistico di sempre, ti cambierà la vita in meglio!</h2>
        <h2>Perfavore non abusare della poca sicurezza nel inserire nuovi utenti nel DB</h2>
       
        <hr />
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <label for="name">username: </label>
            <input id="name" type="text" name="userName" size="30" required />
        <br />
            <label for="password">password: </label>
            <input id="password" type="text" name="password" size="30" required />

        <input type="submit" name="invio" value="accedi">
        <input type="reset" name="reset" value="reset">
        </form>
    </div>
<hr />
<?php require_once("partials\\footer.php"); ?>
</body>
</html>
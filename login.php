<?php
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_WARNING);
//-------CONNESSIONE AL DB--------
require_once("connection.php");

if (isset($_POST['invio']))          // abbiamo appena dato dati
  if (empty($_POST['userName']) || empty($_POST['password']))
    echo "<p>dati mancanti!!!</p>";
  else {                             // controllo dati
    // username e password ricevuti corrispondono a  quel che c'e' nella tabella STuser?
    // questa e' la query di controolo
    $sql = "SELECT *
            FROM $userTable
    WHERE userName = \"{$_POST['userName']}\" AND password =\"{$_POST['password']}\"
		";
    // il risultato ("result set") della query va in $resultQ
    if (!$resultQ = mysqli_query($mysqliConnection, $sql)) {
        printf("Oops, la query non ha risultato !!\n");
    exit();
    }

    $row = mysqli_fetch_array($resultQ);

    if ($row) {   // utente esiste valido
      session_start();
      $_SESSION['userName']=$_POST['userName'];
      $_SESSION['dataLogin']=time();
      $_SESSION['numeroUtente']=$row['userId'];
      $_SESSION['spesaFinora']=$row['sommeSpesa'];
      $_SESSION['accessoPermesso']=1000;
      header('Location: index.php');    // accesso alla pagina iniziale
      exit();
    }
    else
    echo "<p>accesso negato!!!</p>";
  }
?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>sito per fissati</title>
 <?php require_once("style.cookies.php");?>
</head>

<body>
    <?php require("partials\menu.php"); ?>
    <div class="loginForm">
        <h3>
        Accesso mediante username e password
        <hr />
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <label for="name">username: </label>
            <input id="name" type="text" name="userName" size="30" />
        <br />
            <label for="password">password: </label>
            <input id="password" type="text" name="password" size="30" />

        <input type="submit" name="invio" value="accedi">
        <input type="reset" name="reset" value="reset">
        </form>
    </div>
<hr />
<?php require_once("partials\\footer.php");?>
</body>
</html>
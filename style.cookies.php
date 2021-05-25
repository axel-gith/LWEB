<?php
    if(isset($_POST['cambioColore'])){
        setcookie('coloreSfondo', $_POST['cambioColore']);
        $stilePagina = "<link rel=\"stylesheet\" href=stylesheets\index-";
        $stilePagina .= "{$_POST['cambioColore']}";
        $stilePagina .= ".css?v=".time().">";
    }    
    elseif(!isset($_COOKIE['coloreSfondo'])){
        $stilePagina = "<link rel=\"stylesheet\" href=stylesheets\index-";
        $stilePagina .= "white";
        $stilePagina .= ".css?v=".time().">";
    } else {
        $stilePagina = "<link rel=\"stylesheet\" href=stylesheets\index-";
        $stilePagina .= "{$_COOKIE['coloreSfondo']}";
        $stilePagina .= ".css?v=".time().">";
    }

    echo "$stilePagina";
      
        
?>


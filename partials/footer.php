
    <br><br><br><br><br><br><br><br><br><br>
	<div class="container">
			<div class="row">
				<div class="footerElement">
					Chi siamo:
					<ul>
						<li><a href=\"/\">Non porto da nessuna parte</a></li>
						<li><a href=\"/\">Non porto da nessuna parte</a></li>
						<li><a href=\"/\">Non porto da nessuna parte</a></li>
<?php 

	$tastoTemaScuro = "<li><form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\"><button name=\"cambioColore\" value =\"black\">Tema Scuro</button></form ></li>";

	$tastoTemaChiaro = "<li><form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\"><button name=\"cambioColore\" value =\"white\">Tema Normale</button></form></li>";

	if(isset($_POST['cambioColore'])){
		if($_POST['cambioColore'] == "white"){
			echo "$tastoTemaScuro";
		} else {
			echo "$tastoTemaChiaro";
		}
	} elseif (!isset($_COOKIE['coloreSfondo'])){
		echo "$tastoTemaScuro";
	} elseif($_COOKIE['coloreSfondo'] == "black") {
		echo "$tastoTemaChiaro";
	} elseif($_COOKIE['coloreSfondo'] == "white"){
		echo "$tastoTemaScuro";
	}

?>    
					</ul>
				</div>
				<div class="footerElement">
					Link utili:
					<ul>
						<li><a href="register.php">Registrazione</a></li>
						<li><a href="cart.php">Carrello della spesa</a></li>
						<li><a href="index.php">Lista prodotti</a></li>
						<li><a href="/">Non porto da nessuna parte</a></li>
					</ul>
				</div>
			</div>
	</div>

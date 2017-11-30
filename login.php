<?php
  $meldung = "";
  $email = "";
  $passwort = "";
  
  
  // $_SERVER['PHP_SELF'] = login.php in diesem Fall (also die PHP-Datei, die gerade ausgeführt wird).
  // Mit andern Worten: Nach Senden des Formulars wird wieder login.php aufgerufen.
  // Die Funktionen zur Überprüfung, ob die Login-Daten gültig sind, muss also hier oben im PHP-Teil stehen!
  // Wenn Login-Daten korrekt sind:
  // Session-Variable mit Benutzer-ID setzen und Wechsel in Memberbereich
  // $_SESSION['uid'] = $uid;	
  // header('Location: index.php?function=entries_member');
  // Wenn Formular gesendet worden ist, die Login-Daten aber nicht korrekt sind:
  // Unten auf der Seite Anzeige der Fehlermeldung.
  
  if (ISSET($_POST['email']) == True  && isset($_POST['passwort']) == True){
  	$email = $_POST['email'];
  	$passwort = $_POST['passwort'];
  	$userId = getUserIdFromDb($email, $passwort);
  	
  	if ($userId != 0){
  		$_SESSION['userId']=$userId;
  		header("Location: index.php?function=entries_public&bid=".getMaxEntryId($userId));
  	}
  	else{
  		$meldung = "Error! You're fucking stupid!";
  	}
  }
  
?>
<div class="loginform">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=login"; ?>">
  <label for="email" class="logintext">Benutzername</label>
  <div>
	<input type="email" id="email" name="email" placeholder="E-Mail" value="" />
  </div>
  <label for="passwort" class="logintext">Passwort</label>
  <div>
	<input type="password" id="passwort" name="passwort" placeholder="Passwort" value="" />
  </div>
  <div>
	<button type="submit" id="submitButton">senden</button>
  </div>
</form>

<?php 
if (isset($meldung) == TRUE){
	echo "<div>";
	echo "<p id='errormessage'>".$meldung."</p>";
	echo "</div>";
}
?>
</div>
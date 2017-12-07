<?php
$eidSet = false;


#Get UserID
if (isset ( $_GET ['bid'] )) {
	$uid = $_GET ['bid'];
} else if (isset ( $_GET ['uid'] )) {
	$uid = $_GET ['uid'];
}

#Get EntryId
if (isset ( $_GET ['eid'] )) {
	$eid = $_GET ['eid'];
	$eidSet = true;
	$url = $_SERVER ['PHP_SELF'] . "?function=blogcreate&uid=" . $uid . "&eid=" . $eid;
	$urlDelete = $url = $_SERVER ['PHP_SELF'] . "?function=blogcreate&uid=" . $uid . "&eid=" . $eid."&action=delete";
} else {
	$url = $_SERVER ['PHP_SELF'] . "?function=blogcreate&uid=" . $uid;
	
}

#Check if eid is set
if ($eidSet == true) {
	$entry = getEntry ( $eid );
	$title = $entry ['title'];
	$content = $entry ['content'];
} else {
	$title = "";
	$content = "";
}


//Check if user want to delete blog or create/update blog
if (isset($_GET['action'])){
	//Delete blog
	if (deleteEntry($eid) == true){
		echo "<div class='feedbackOK'>";
		echo "<p class='ok'>Ihr Beitrag wurde erflogreich gelöscht</p>";
		echo "<i class='fa fa-check-circle-o fa-2x' aria-hidden='true'></i>";
		echo "</div>";
	}
	else{
		echo "<div class='feedbackNOK'>";
		echo "<p id='nok'>Löschen Fehlgeschlagen</p>";
		echo "<i class='fa fa-times fa-2x' aria-hidden='true'></i>";
		echo "</div>";
	}
}
else{
	if (ISSET ( $_POST ['titel'] ) == True && isset ( $_POST ['inhalt'] ) == True) {
		$titelnew = $_POST ['titel'];
		$inhalt = $_POST ['inhalt'];
		
		if (strlen ( $titelnew ) > 3 && strlen ( $inhalt ) > 10) {
			if ($eidSet == true) {
				// Datei aktualisieren
				
				
				if (updateEntry($eid, $titelnew, $inhalt)== true){
					echo "<div class='feedbackOK'>";
					echo "<p class='ok'>Ihr Beitrag wurde erflogreich aktualisiert</p>";
					echo "<i class='fa fa-check-circle-o fa-2x' aria-hidden='true'></i>";
					echo "</div>";
				}
				else{
					echo "<div class='feedbackNOK'>";
					echo "<p id='nok'>Hochladen Fehlgeschlagen</p>";
					echo "<i class='fa fa-times fa-2x' aria-hidden='true'></i>";
					echo "</div>";
				}
				
			} else {
				// Neue Datei erstellen
				
				
				if (addEntry($uid, $titelnew, $inhalt)== true){
					echo "<div class='feedbackOK'>";
					echo "<p class='ok'>Ihr Beitrag wurde erflogreich erstellt</p>";
					echo "<i class='fa fa-check-circle-o fa-2x' aria-hidden='true'></i>";
					echo "</div>";
				}
				else{
					echo "<div class='feedbackNOK'>";
					echo "<p id='nok'>Fehler beim Hochladen</p>";
					echo "<i class='fa fa-times fa-2x' aria-hidden='true'></i>";
					echo "</div>";
				}
				
				
			}
		} else {
			echo "<div class='feedbackNOK'>";
			echo "<p id='nok'>Einer oder beide Texte sind zu kurz!</p>";
			echo "<i class='fa fa-times fa-2x' aria-hidden='true'></i>";
			echo "</div>";
		}
	}
}



?>

<div class="blogcrete">
	<form method="post" action="<?php echo $url; ?>">
		<label for="title" class="logintext">Titel</label>
		<div>
			<textarea rows="1" cols="100" name="titel"><?php echo $title;?></textarea>
		</div>
		<label for="Inhalt" class="bloginhalt">Inhalt</label>
		<div>
			<textarea rows="10" cols="100" name="inhalt"><?php echo $content;?></textarea>
		</div>

		<button type="submit" id="submitButton">senden</button>
	</form>
	<form method="post" action="<?php echo $urlDelete; ?>">
	<button type="submit" id="submitButton">löschen</button>
	</form>
		<form method="post" action="<?php 	echo "index.php?function=entries_public"; ?>">
	<button type="submit" id="submitButton">Abbrechen</button>
	</form>

</div>
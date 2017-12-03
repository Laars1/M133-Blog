<?php
$eidSet = false;
if (isset($_GET['eid'])){
	$eid = $_GET['eid'];
	$eidSet = true;
}
$uid = $_GET['bid'];

if ($eidSet==true){
	$entry = getEntry ($eid);
	$title = $entry ['title'];
	$content = $entry ['content'];
}
else{
	$title="";
	$content="";
}
?>

<div class="blogcrete">

  <label for="title" class="logintext">Titel</label>
  <div>
	<textarea rows="1" cols="100" ><?php echo $title;?></textarea>
  </div>
  <label for="Inhalt" class="bloginhalt">Inhalt</label>
  <div>
	<textarea rows="10" cols="100"><?php echo $content;?></textarea>
  </div>
  <div>
	<button type="submit" id="submitButton">senden</button>
	<button type="submit" id="deleteButton">löschen</button>
	<button type="submit" id="discardButton">abbrechen</button>
  </div>

</div>
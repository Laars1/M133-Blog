<?php
$eid = $_GET['eid'];
$uid = $_GET['uid'];
if (deleteEntry($eid) == true){
	$_POST['feedback1'] = "<div class='feedbackOK'>";
	$_POST['feedback2'] = "<p class='ok'>Ihr Beitrag wurde erflogreich gelöscht</p>";
	$_POST['feedback3'] = "<i class='fa fa-check-circle-o fa-2x' aria-hidden='true'></i>";
	$_POST['feedback4'] = "</div>";
}
else{
	$_POST['feedback1'] = "<div class='feedbackNOK'>";
	$_POST['feedback2'] = "<p id='nok'>Löschen fehlgeschlagen</p>";
	$_POST['feedback3'] = "<i class='fa fa-times fa-2x' aria-hidden='true'></i>";
	$_POST['feedback4'] = "</div>";
}


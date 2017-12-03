<?php
// Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
// Hier Code... (Schlaufe über alle Einträge dieses Blogs)

// Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
$color = "#CCFFFF";
if (isset ( $_SESSION ['userId'] ) == True) {
	$uid = $_SESSION ['userId'];
} else {
	$uid = $_GET ['bid'];
}

if (isset ( $_GET ['eid'] )) {
	$eid = $_GET ['eid'];
} else {
	$eid = 1;
}

$entries = getEntries ( $uid );

if (isset ( $_SESSION ['userId'] )) {
	
	echo "<div class='leftside'>";
	foreach ( $entries as $entry ) {
		$timestamp = $entry ['datetime'];
		$time = gmdate ( "d-m-Y H:i:s", $timestamp );
		$title = $entry ['title'];
		
		if ($entry ['eid'] == $eid) {
			echo "<a href=index.php?function=entries_public&bid=$uid'&eid=" . $entry ['eid'] . ">";
			echo "<div class='box' style='background-color:" . $color . "'>";
			echo "<h4 class='title2'>" . $title . "</h4>";
			echo "<h5 class='title2'>" . $time . "</h5>";
			echo "</div>";
			echo "</a>";
		} else {
			echo "<a href=index.php?function=entries_public&bid=$uid'&eid=" . $entry ['eid'] . ">";
			echo "<div class='box'>";
			echo "<h4 class='title2'>" . $title . "</h4>";
			echo "<h5 class='title2'>" . $time . "</h5>";
			echo "</div>";
			echo "</a>";
		}
	}
	echo "</div>";
	
	$entry = getEntry ( $eid );
	$timestamp = $entry ['datetime'];
	$time = gmdate ( "d-m-Y H:i:s", $timestamp );
	$title = $entry ['title'];
	$content = nl2br ( $entry ['content'] );
	
	echo "<div class='blog'>";
	echo "<i class='fa fa-pencil' aria-hidden='true'></i>";
	echo "<div class='title'>";
	echo $title . " " . $time;
	echo "</div>";
	echo "<br>";
	echo "<div class='content'>";
	echo $content;
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<br>";
} else {
	foreach ( $entries as $entry ) {
		
		$timestamp = $entry ['datetime'];
		$time = gmdate ( "d-m-Y H:i:s", $timestamp );
		$title = $entry ['title'];
		$content = nl2br ( $entry ['content'] );
		
		echo "<div class='blog'>";
		echo "<div class='title'>";
		echo $title . " " . $time;
		echo "</div>";
		echo "<br>";
		echo "<div class='content'>";
		echo $content;
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<br>";
	}
}

?>
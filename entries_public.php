<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden

if (isset($_SESSION['userId']) == True){
	$uid = $_SESSION['userId'];
}
else{
		$uid = $_GET['bid'];
	}

$entries = getEntries($uid);

foreach ($entries as $entry){
	
	$timestamp= $entry['datetime'];
	$time = gmdate("d-m-Y H:i:s", $timestamp);
	$title = $entry['title'];
	$content = nl2br($entry['content']);
	
	echo "<div class='blog'>";
	echo "<div class='title'>";
	echo $title." ".$time;
	echo "</div>";
	echo "<br>";
	echo "<div class='content'>";
	echo $content;
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<br>";
	
}

?>
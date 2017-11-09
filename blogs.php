<?php
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
  
	$blogs = getUserNames();
	$blogId = $_GET['bid'];

foreach ($blogs as $blog){
	echo "<div><a href='index.php?function=blogs&bid=".$blog['uid']."' title='Blog ausw�hlen'><h4>".$blog['name']."</h4></a></div>";
	if($blog['uid'] == $blogId){

	}
}
?>


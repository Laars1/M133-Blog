<?php
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
  

	$colors = ['#CCE5FF', "#CCCCFF", "#FFCCFF", "#FFCCCC", "#FFE5CC", "#E5FFCC", "#CCFFFF", "#FFCCE5"];
	$number = mt_rand (0 ,7);
	
  
	$blogs = getUserNames();
	$blogId = $_GET['bid'];

foreach ($blogs as $blog){

	if($blog['uid'] == $blogId){
		echo "<div class='autor' style='background-color:".$colors[$number]."'><a href='index.php?function=blogs&bid=".$blog['uid']."' title='Blog ausw�hlen'><h4>".$blog['name']."</h4></a></div>";
	}
	else{
		echo "<div class='autor'><a href='index.php?function=blogs&bid=".$blog['uid']."' title='Blog ausw�hlen'><h4>".$blog['name']."</h4></a></div>";
	}
}
?>


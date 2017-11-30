<?php
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewÃ¤hlt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe Ã¼ber alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe Ã¼ber alle Blogs und der Ausgabe mit PHP ersetzt werden
  

	$colors = "#CCFFFF";

	
  
	$blogs = getUserNames();
	$blogId = $_GET['bid'];
	
	

	if (isset($_SESSION['userId']) == True){
		header("Location: index.php?function=entries_public");
	}
	else {
		foreach ($blogs as $blog){
			
			if($blog['uid'] == $blogId){
				echo "<div class='autor' style='background-color:".$colors."'><a href='index.php?function=blogs&bid=".$blog['uid']."' title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
			}
			else{
				echo "<div class='autor'><a href='index.php?function=blogs&bid=".$blog['uid']."' title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
			}
	}
	

}
?>


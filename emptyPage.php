<?php
echo "This page is empty";
echo "<br>";

echo "<script>document.getElementById('login').innerHTML = 'Logout';
			document.getElementById('login').href = 'Logout.php'</script>";



if (isset($_SESSION['userId']) == True) {
	$userId = $_SESSION['userId'];
	$name = getUserName($userId);
	echo "Hallo ".$name;
}
else{
	echo "Nicht angemeldet";
}



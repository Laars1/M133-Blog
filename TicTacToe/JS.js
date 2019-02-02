/**
 * 
 */
	var counter = 0;
	var valid = false;
	var activePlayer = 1;
	var ArrayButtons = [[0, 0, 0], [0, 0, 0], [0, 0, 0]];
	var ArrayColor = ["#FF0000", "#000099"]
	var buttonsHTML = document.getElementsByClassName("Button");
	var running = false;
	var gameinfo;
	var validRadioButton = false;
	var validEmail = false;
	var playerEmail = [];
//Idee des 2D Arrays und dem Spliten habe ich von Sandro Rüfenacht erhalten

	
function buttonOnClick(btn) {
	setPlayerOnButton(btn.id);
	setPlayerColor(btn);
	checkWinner();
	changePlayer();
	
	counter++;
}

function startOnClick() {

	if (document.getElementById('MenschVSMensch').checked==true){
		
		validRadioButton = true;
	}
	if(document.getElementById('MenschVSMensch').checked!=true){
		gameinfo = "This value is not implemented";
		textRed();
		validRadioButton = false;
	}
	
	
//	if (validRadioButton == false && validEmail == false) {
//		gameinfo = "You have to insert something"
//		textRed();
//	}
//	else 
	else if (!document.getElementById("Spieler1").value && !document.getElementById("Spieler2").value && validRadioButton == true) {
		gameinfo = "You have to insert two email adresses!";
		textRed();
	}
	
	else if (document.getElementById("Spieler1").value && !document.getElementById("Spieler2").value && validRadioButton == true) {
		gameinfo = "You have to insert an email adress at Player 2";
		textRed();
	}
	else if (!document.getElementById("Spieler1").value && document.getElementById("Spieler2").value && validRadioButton == true) {
		gameinfo = "You have to insert an email adress at Player 1";
		textRed();
	}
	
	else if (playerEmail["Spieler1"]["emailAdress"] == playerEmail["Spieler2"]["emailAdress"]) {
		gameinfo = "You can not use the same email adress";
		textRed();
		validEmail = false;
	}
	
	
	else if (playerEmail["Spieler1"]["validEmail"] == false && playerEmail["Spieler2"]["validEmail"] == true) {
		gameinfo = "The email-adress: "+playerEmail["Spieler1"]["emailAdress"]+" is not valid!"
		textRed()
	}
	else if (playerEmail["Spieler2"]["validEmail"] == false && playerEmail["Spieler1"]["validEmail"] == true) {
		gameinfo = "The email-adress: "+playerEmail["Spieler2"]["emailAdress"]+" is not valid!"
		textRed();
	}
	
	else if (playerEmail["Spieler1"]["validEmail"] == false && playerEmail["Spieler2"]["validEmail"] == false) {
			gameinfo = "Both email adresses are invalid";
			textRed();
	
	}
	else /*if (validRadioButton == true && validEmail == true)*/ {
		gameinfo = "Have fun!"
		textGreen();
		btnActivate();
		if (running == true) {
			gameinfo = "The game is already running!"
			textRed();
		}
		running = true;

	
	}
}



function setPlayerOnButton(id) {
	var ort = id.split("_")
	ArrayButtons[ort[0]][ort[1]] = activePlayer;
	
}

function setPlayerColor(btn) {
	btn.style.background = ArrayColor[activePlayer-1];
	btn.disabled = true;
}




function changePlayer() {
	if (activePlayer == 2) {
		activePlayer = 1;
	}
	else {
		activePlayer++;
	}
}



function checkWinner() {
//Horizontal
for (var i = 0; i < 3; i++) {
	if (ArrayButtons[i][0] != 0 && ArrayButtons[i][0] == ArrayButtons[i][1] && ArrayButtons[i][2] == ArrayButtons[i][1]) {		
		setWinner();
	}
	
}

//Vertikal
for (var i = 0; i < 3; i++) {
	if (ArrayButtons[0][i] != 0 && ArrayButtons[0][i] == ArrayButtons[1][i] && ArrayButtons[2][i] == ArrayButtons[1][i]) {		
		setWinner();
	}
	
}

//Kreuz von Links oben nach rechts unten
if (ArrayButtons[0][0] != 0 && ArrayButtons[0][0] == ArrayButtons[1][1] && ArrayButtons[2][2] == ArrayButtons[1][1]) {
	setWinner();
}
	
//Kreuz von rechts oben nach links unten
if (ArrayButtons[0][2] != 0 && ArrayButtons[0][2] == ArrayButtons[1][1] && ArrayButtons[2][0] == ArrayButtons[1][1]) {
	setWinner();
}

//unentschieden
if (counter == 8) {
	gameinfo = "It's a tie";
	textOrange();
	
}
	
}


function setWinner() {
	
	
	//Ausgabe des gewinners, mithilfe der email aus dem array
	gameinfo = playerEmail["Spieler"+activePlayer]["emailAdress"]+" has won the game";
	
	
	textGreen()
	btnDeactivate();
	
}



function btnActivate() {
	for (var i = 0; i < buttonsHTML.length; i++) {
		buttonsHTML[i].disabled = false;
	}
}

function btnDeactivate() {
	for (var i = 0; i < buttonsHTML.length; i++) {
		buttonsHTML[i].disabled = true;
	}
}

function readRadioButton() {
	if (document.getElementById('MenschVSMensch').checked!=true){
		gameinfo = "This value is not implemented";
		textRed();
		validRadioButton = false;
	}
	else {
		validRadioButton = true;
	}
	
}

//Email Valdation infos dazu habe ich von: https://stackoverflow.com/questions/46155/how-to-validate-email-address-in-javascript
function validateEmailRegex(emailAdress) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(emailAdress);
	}


function validateEmail(email) {
	
	//Sucht nach dem elemtent mit der id und liest das Value aus
	var emailAdress = document.getElementById(email.id).value;
		
	  if (validateEmailRegex(emailAdress)) {
		  document.getElementById(email.id).style.border = "medium solid #00CC00";
		  validEmail = true;
	  } else {
		  document.getElementById(email.id).style.border = "medium solid #FF0000";
		  validEmail = false;
	  }
	  
	  //Wie man Arrays mit mehreren Vales macht habe ich von hier: https://stackoverflow.com/questions/19119214/adding-multiple-values-to-an-array-or-object-in-javascript
	  var playerMail = email.id;
	  
	  playerEmail[playerMail] = {emailAdress, validEmail};	
}


function textGreen() {
	document.getElementById("Ausgabe").innerHTML = gameinfo.fontcolor("#00CC00").fontsize(6);
}

function textRed() {
	document.getElementById("Ausgabe").innerHTML = gameinfo.fontcolor("#FF0000").fontsize(6);
}
function textOrange() {
	document.getElementById("Ausgabe").innerHTML = gameinfo.fontcolor("#FF9933").fontsize(6);
}
//Buttons deaktivieren wenn gewonnen, validierung, reset

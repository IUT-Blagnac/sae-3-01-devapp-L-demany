<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Chasse au trésor : Accueil</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="./assets/js/locura4iot.js" defer></script>
	<!--<style>
    .rotate {
    transition: transform 0.5s;
    display: inline-block;
  }
  </style>-->
</head>
<body>
		<h1> LocURa4IoT - Chasse au trésor</h1>

		<h4> Joueurs : <span id='nbJoueurs'>0</span> <span id="toggleJoueurs" class="rotate" onclick="afficherJoueurs()">▲</span>  </h4>
		<div id="listJoueurs" class="listIndex">
		</div>

		<h4> Capteurs : <span id='nbCheckpoints'>0</span> <span id="toggleCheckpoints" class="rotate" onclick="afficherCheckpoints()">▲</span>  </h4>
		<div id="listCheckpoints" class="listIndex">
			
		</div>


		<button class="mainbutton" style="display: none;" id="commencerPartie" onclick="window.open('IHM_admin.php')">Commencer la partie !</button>
		<button class="mainbutton" onclick="rafraichir()" id="rafraichir">Lancer lecture des données</button>
	
</body>
</html>
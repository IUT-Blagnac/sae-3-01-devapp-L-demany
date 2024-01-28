<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
	<script src="assets/libs/jquery-3.7.1.min.js"></script>
	<script src="assets/js/locura4iot.js"> </script>
	<link rel="stylesheet" href="./assets/user.css" />
	<title>Chasse au trésor : interface utilisateur</title>
</head>

<body>
    <div class="nav-bar">
        <h1> Bienvenue sur la carte de la course LocURa4IoT!</h1>
    </div>

    <!-- For notifications -->
    <div class="popup" id="popup">
        <div class="popup-content" id="popupContent">
        </div>
    </div>

    <div class="classMere">
        <div class="centered-div">
            <table>
                <tr>
                    <td class="label">Joueur en tête</td>
                    <td id="joueur1-color"></td>
                    <td id="joueur1-name"></td>
                </tr>
                <tr>
                    <td class="label">2eme joueur</td>
                    <td id="joueur2-color"></td>
                    <td id="joueur2-name"></td>
                </tr>
                <tr>
                    <td class="label">3eme joueur</td>
                    <td id="joueur3-color"></td>
                    <td id="joueur3-name"></td>
                </tr>
            </table>
        </div>
        <div class="modal-background" id="myModal">
            <div class="modal">
                <span class="close-button" onclick="closeModal()">&times;</span>
                <div id="classementContent-pop-up"></div>
                <button id="genererPDF">Générer PDF</button>
                <button id="genererJson" onclick="downloadJSON()">Générer JSON</button>
            </div>
        </div>
        <script>
            
            
        </script>
        <div class="centered-div">
            <table id="gameTable">
                <!-- JavaScript -->
            </table>
        </div>

        <script>
            // JavaScript code to generate the game table dynamically
            var liste_size = getTaillePlateau()+1;
			setInterval(() => {
				// creerClassement();
				// afficherPions();
				
			}, 1000);
			openModal();// a changer par un if qui verifie si un joueur a gagner

            var rep_max = Math.ceil(liste_size / 5);
            var color = 0;
            var increment = true;

            function position(i, j) {
                if (i % 2 === 0) {
                    return 5 * i + j;
                } else {
                    return 5 * i + 4 - j;
                }
            }
			// faire une classe qui active la fonction openModal au moment ou un joueur gagne c'est a dire quand il arrive a la fin du plateau
			

            function fonctionColor() {
                if (increment) {
                    color++;
                    if (color >= 5) {
                        increment = false;
                    }
                } else {
                    color--;
                    if (color <= 1) {
                        increment = true;
                    }
                }
                return color;
            }

            function attributeClass(i, j) {
				if (i % 2 === 0) {
					if (j === 0 && i === 0) {
						return "rounded-left";
					} else if (j === 0 && position(i, j) === liste_size - 1) {
						return "rounded-down";
					} else if (j === 0 && i !== 0) {
						return "corner-bottom-left";
					} else if (j === 4 && position(i, j) !== liste_size - 1) {
						return "corner-top-right";
					} else if (i % 2 === 0 && position(i, j) === liste_size - 1) {
						return "rounded-right";
					} else {
						return "";
					}
				} else {
					if (j === 4 && position(i, j) === liste_size - 1) {
						return "rounded-down";
					} else if (j === 0 && position(i, j) < liste_size - 1) {
						return "corner-top-left";
					} else if (j === 4 && position(i, j) !== liste_size - 1) {
						return "corner-bottom-right";
					} else if (i % 2 !== 0 && position(i, j) === liste_size - 1) {
						return "rounded-left";
					} else if (i % 2 !== 0 && position(i, j) > liste_size - 1) {
						return "hidden";
					} else {
						return "";
					}
				}
			}

            var table = document.getElementById("gameTable");
			
            cpt = 0;
            for (var i = 0; i < rep_max; i++) {
                var row = table.insertRow(i);
                row.id = "row-" + i;
                for (var j = 0; j < liste_size; j++) {
                    if (i % 2 === 0 && j < 5) {
                        if(cpt < liste_size){
                            var cornerClass = attributeClass(i, j);
                            color = fonctionColor();
                            var cell = row.insertCell(j);
                            cell.id = position(i, j);
                            cell.className = cornerClass + " color-" + color;
                            
                            if (position(i, j) === liste_size - 1) {
                                cell.className += " lastCase";
                            }
                            
                            if (position(i, j) === 0) {
                                cell.className += " firstCase";
                            }
                            cpt++;
                        }
						
                    } else if (i % 2 !== 0 && j < 5) {
                        var cornerClass = attributeClass(i, j);
                        if(cpt < liste_size){
                            color = fonctionColor();
                            cpt++;
                        }
                        var cell = row.insertCell(j);
                        cell.id = position(i, j);
                        cell.className = cornerClass + " color-" + color;
						if (position(i, j) === liste_size - 1) {
							cell.className += " lastCase";
						}
						if (position(i, j) === 0) {
							cell.className += " firstCase";
						}
                    }
                }
            }
			// var lastCase = document.querySelector(".lastCase");
			// // mettre une image dans la derniere case
			// var img = document.createElement("img");
			// img.style.width = "40px";
			// img.style.height = "40px";
			// img.src = "./assets/images/ligne-darrivee.png";
			
			// lastCase.appendChild(img);
			// // // mettre une image dans la premiere case
			var firstCase = document.querySelector(".firstCase");
			firstCase.style.backgroundImage = "url('./assets/images/depart.png')";
            firstCase.style.backgroundSize = "cover";

            var lastCase = document.querySelector(".lastCase");
            lastCase.style.backgroundImage = "url('./assets/images/ligne-darrivee.png')";
            lastCase.style.backgroundSize = "cover";


			
        </script>
    </div>
</body>

</html>

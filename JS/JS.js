depart();

function depart() {
	setMontant();
}

function setMontant(){
	if (document.getElementById('typeVeh').value == 'special' || document.getElementById('typeVeh').value == 'remorques'){
		var n = document.getElementById('denomination').options.length;
		for (var i = 0; i <= n; i++) {
			if (document.getElementById('denomination').options[i].value === document.getElementById('denomination').value) {
				document.getElementById('TaxeAnnuelle').options[i].selected = true;
				break;
			}
		}
		document.getElementById('constructeur').value = "Autres";
	}
	calcul();
}

function setCV(){
	if (document.getElementById('typeVeh').value == 'vehMoteur'){
		if (document.getElementById('cvSup').value > 4 && document.getElementById('cvSup').value <= 20) {
			var n = document.getElementById('denomination').options.length;
			for (var i = 0; i < n; i++) {
				document.getElementById('puissanceFiscale').value = document.getElementById('cvSup').value;
				if (document.getElementById('puissanceFiscale').options[i].value === document.getElementById('puissanceFiscale').value) {
					document.getElementById('cylindree').options[i].selected = true;
					break;
				}
				setCylindree();
			}
		} else if (document.getElementById('cvSup').value > 20) {
			var n = document.getElementById('cylindree').options.length
			document.getElementById('puissanceFiscale').options[n-1].selected = true;
			document.getElementById('cylindree').options[n-1].selected = true;
		} else {
			document.getElementById('puissanceFiscale').options[0].selected = true;
			document.getElementById('cylindree').options[0].selected = true;
		}
	}
	setTaxe();
	setPrixEnergie(document.getElementById('puissanceFiscale').value);
	calcul();
}

function setCylindree(){
	var n = document.getElementById('puissanceFiscale').options.length
	for (var i = 0; i < n; i++) {
		if (document.getElementById('puissanceFiscale').options[i].value === document.getElementById('puissanceFiscale').value) {
			document.getElementById('cylindree').options[i].selected= true;
			break;
		}
	}
	setTaxe();
	setPrixEnergie(document.getElementById('puissanceFiscale').value);
}

function setPuissance(){
	var n = document.getElementById('cylindree').options.length
	for (var i = 0; i < n; i++) {
		if (document.getElementById('cylindree').options[i].value === document.getElementById('cylindree').value) {
			document.getElementById('puissanceFiscale').options[i].selected= true;
			break;
		}
	}
	setTaxe();
	setPrixEnergie(document.getElementById('puissanceFiscale').value);
}

function setPrixEnergie(aSet){
	var number = parseFloat(aSet);
	if (number <= 7) {
		document.getElementById('prixEnergie').options[1].selected = true;
	}
	if (number >= 8 && number <= 13) {
		document.getElementById('prixEnergie').options[2].selected = true;
	}
	if (number >= 14) {
		document.getElementById('prixEnergie').options[3].selected = true;
	}
	calcul();
}

function setTaxe(){
	var n = document.getElementById('cylindree').options.length;
	for (var i = 0; i < n; i++) {
		if (document.getElementById('cylindree').options[i].value === document.getElementById('cylindree').value) {
			document.getElementById('TaxeAnnuelle').options[i].selected= true;
			break;
		}
	}
}
		
function calcul() {
	if(document.getElementById('energie').value != "LPG"){
		document.getElementById('prixEnergie').value = 0;
	}
	if(document.getElementById('energie').value == "LPG"){
		document.getElementById('rep3').innerHTML = Number(Number(document.getElementById('prixEnergie').value) + Number(document.getElementById('TaxeAnnuelle').value)).toFixed(2);
	} else {
		document.getElementById('rep3').innerHTML = Number(document.getElementById('TaxeAnnuelle').value).toFixed(2);
	}
	
	if (document.getElementById('cvSup').value > 20) {
		document.getElementById('rep3').innerHTML = Number(Number(document.getElementById('rep3').innerHTML) + ((Number(document.getElementById('cvSup').value) - 20) * 118.80)).toFixed(2);
		document.getElementById('TaxeAnnuelle1').value = document.getElementById('rep3').innerHTML;
	} else {
		document.getElementById('TaxeAnnuelle1').value = document.getElementById('rep3').innerHTML;
	}
	document.getElementById('rep1').innerHTML = document.getElementById('energie').value.toLowerCase();
	if (document.getElementById('cvSup').value > 20) {
		document.getElementById('rep2').innerHTML = document.getElementById('cylindree').value;
	} else {
		document.getElementById('rep2').innerHTML = document.getElementById('cylindree').value;
	}
}
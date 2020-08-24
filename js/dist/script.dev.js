"use strict";

var activitie = document.getElementById('activities');

function Evnt(X) {
  if (X == 'Travaux') {
    document.getElementById("Travaux-dentaire").style.display = 'block';
    document.getElementById("Consultation-normale").style.display = 'none';
    document.getElementById("soin-dentaire").style.display = 'none';
    document.getElementById("Garantie").style.display = 'block';
  } else if (X == 'consultation') {
    document.getElementById("Travaux-dentaire").style.display = 'none';
    document.getElementById("Consultation-normale").style.display = 'block';
    document.getElementById("soin-dentaire").style.display = 'none';
    document.getElementById("Garantie").style.display = 'block';
  } else if (X == 'soindentaire') {
    document.getElementById("Travaux-dentaire").style.display = 'none';
    document.getElementById("Consultation-normale").style.display = 'none';
    document.getElementById("soin-dentaire").style.display = 'block';
    document.getElementById("Garantie").style.display = 'block';
  } else {}

  return;
}

activitie.addEventListener("change", function () {
  var displayText = activitie.options[activitie.selectedIndex].value;

  if (displayText == "Couronnes") {
    document.getElementById('Nbr').style.display = "block";
    document.getElementById('Nbr').setAttribute("placeholder", "Nbr de couronne");
    document.getElementById('Nbr').setAttribute("required", "required");
  }

  if (displayText == "Bridge 3elements") {
    document.getElementById('Nbr').style.display = "block";
    document.getElementById('Nbr').setAttribute("placeholder", "Nbre de Bridge");
  }

  if (displayText == "Travaux dorthodontie") {
    document.getElementById('Nbr').style.display = "block";
    document.getElementById('Nbr').setAttribute("placeholder", "Nbre de semestre");
  }

  if (displayText == "Appareil dentaire(1a3dents)" || displayText == "Appareil dentaire(14dents)") {
    document.getElementById('Nbr').style.display = "none";
    document.getElementById('Nbr').removeAttribute("required");
  }
});
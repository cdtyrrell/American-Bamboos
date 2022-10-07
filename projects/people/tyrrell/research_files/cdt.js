function toggleDivDisplay(whichDiv) {
  var y = document.getElementsByClassName("shadow-2px");
  var x = document.getElementById(whichDiv.id);
  for (d = 0; d < y.length; d++) { y[d].style.display = "none"; }
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

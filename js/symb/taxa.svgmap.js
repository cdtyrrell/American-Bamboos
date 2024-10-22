function colorMap(countryCode) {
	try {
		var svgpath = document.getElementById(countryCode);
		svgpath.setAttribute("style", "fill:#537828");
	}
	catch {
		console.log("SVG path "+countryCode+" does not exist.")
	}
}

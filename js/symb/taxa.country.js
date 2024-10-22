
// The following is... ridiculous, but alas I commit the sin,
// These equations linearly convert latitude and longitude (WGS84)
// into svg pixel coordinates for each country. Values are empirically
// derived from the GIS layers used to generate the svgs.
// I acknowledge that forcing a linear conversion on a curvilinear 
// projection will misbehave for large countries like Brazil.

// X (longitude)
// westmost latitude, eastmost - westmost, pixel width, minimum pixel
const longitudeToSvgPixelCoefficients = 
{
    "anguilla": [63.427843, 0.501148, 2705.84, 413.08],
    "argentina": [73.560565, 19.96873, 1417.2, 1045.43],
    "bahamas": [80.475975, 7.763893, 2705.8, 401.11],
    "barbados": [59.650696, 0.231392, 1880.96, 813.52],
    "belize": [89.224174, 1.738204, 1576.6, 965.74],
    "bolivia": [69.639023, 12.185173, 2175.4, 666.29],
    "bonaire": [68.420692, 5.478885, 2300, 603.97],
    "brazil": [73.989708, 45.142763, 2705.9, 401.06],
    "caymen": [81.420135, 1.697494, 2705.85, 401.07],
    "chile": [109.454916, 43.036702, 2641.5, 433.25],
    "colombia": [81.84153, 15.003792, 1759.5, 874.24],
    "costa_rica": [87.101849, 4.54953, 1878.2, 814.86],
    "cuba": [84.952362, 10.821175, 2705.9, 401.04],
    "dominica": [61.480141, 0.240002, 1306.48, 1100.76],
    "dominican_republic": [72.003883, 3.681244, 2705.86, 401.08],
    "ecuador": [92.008545, 16.821396, 2705.8, 401.09],
    "el_salvador": [90.124863, 2.441117, 2705.83, 401.08],
    "french_guiana": [54.541824, 2.935894, 1913.97, 797.04],
    "grenada": [61.802082, 0.423889, 1801.24, 853.38],
    "guadeloupe": [61.810139, 0.810002, 2705.84, 401.08],
    "guatemala": [92.222359, 3.996689, 2314.68, 596.66],
    "guyana": [61.386917, 4.906666, 1575.86, 966.07],
    "haiti": [74.481247, 2.863098, 2705.81, 401.11],
    "honduras": [89.350792, 6.945099, 2705.81, 401.08],
    "jamaica": [78.369026, 2.399162, 2705.82, 401.08],
    "martinique": [61.229027, 0.420277, 2022.38, 742.81],
    "mexico": [118.368889, 31.658753, 2705.8, 401.09],
    "monserrat": [62.241806, 0.097221, 1536.54, 985.73],
    "nicaragua": [87.690971, 5.691108, 2705.87, 401.05],
    "panama": [83.051887, 5.922607, 2705.9, 401.06],
    "paraguay": [62.646519, 8.387886, 2382.68, 562.66],
    "peru": [81.330696, 12.677589, 1635.3, 936.34],
    "puerto_rico": [67.951805, 2.951942, 2705.8, 401.12],
    "saint_bethelemy": [62.947942, 0.159043, 2705.84, 401.08],
    "saint_lucia": [61.080139, 0.210277, 1231.38, 1138.31],
    "saint_vincent": [61.460972, 0.346943, 1018.3, 1244.85],
    "st_kitts_nevis": [62.864307, 0.325, 2363.94, 572.03],
    "suriname": [58.086563, 4.10907, 2319.6, 594.2],
    "trinidad": [61.930138, 1.438053, 2579.65, 464.18],
    "turks_caicos": [72.483192, 1.401107, 2705.84, 401.08],
    "united_states": [124.415558, 45.868889, 2705.8, 401.1],
    "uruguay": [58.440574, 5.346328, 2583, 462.48],
    "venezuela": [73.352142, 13.545135, 2129.4, 689.28],
    "virgin_islands_uk": [64.850136, 0.57972, 2705.84, 401.08],
    "virgin_islands_us": [65.086525, 0.521668, 1658.82, 924.59]
};

//Y (latitude)
// minimum latitude, absolute value of northmost - southmost, pixel height, minimum pixel
// bottom of svg is max px
const latitudeToSvgPixelCoefficients = 
{
    "anguilla": [18.160895, 0.43, 2326.56, 76.72],
    "argentina": [55.061531, 33.28, 2361.9, 59.02],
    "bahamas": [20.912083, 6.36, 2216.3, 131.84],
    "barbados": [13.044584, 0.29, 2361.9, 59.05],
    "belize": [15.892658, 2.6, 2361.9, 59.06],
    "bolivia": [22.898042, 13.23, 2361.9, 59.07],
    "bonaire": [12.024306, 5.63, 2361.9, 59.04],
    "brazil": [33.747082, 39.01, 2338.4, 70.8],
    "caymen": [19.262638, 0.49, 788.6, 845.7],
    "chile": [55.980002, 38.48, 2361.9, 59.02],
    "colombia": [4.228429, 20.14, 2361.94, 59.05],
    "costa_rica": [5.49857, 5.72, 2361.9, 59.05],
    "cuba": [19.825972, 3.45, 863.1, 808.43],
    "dominica": [15.206251, 0.43, 2361.9, 59.05],
    "dominican_republic": [17.470139, 2.46, 1809.9, 335.04],
    "ecuador": [5.015803, 6.7, 1077.3, 701.35],
    "el_salvador": [13.15264, 1.3, 1438.7, 520.67],
    "french_guiana": [2.128723, 3.62, 2361.87, 59.08],
    "grenada": [11.984305, 0.56, 2361.9, 59.05],
    "guadeloupe": [15.831527, 0.68, 2282.7, 98.65],
    "guatemala": [13.738282, 4.08, 2361.9, 59.05],
    "guyana": [1.176767, 7.35, 2361.86, 59.09],
    "haiti": [18.021805, 2.07, 1955.01, 262.51],
    "honduras": [12.98454, 4.43, 1727.51, 376.27],
    "jamaica": [17.020414, 1.5, 1697.04, 391.46],
    "martinique": [14.388194, 0.49, 2361.9, 59.05],
    "mexico": [14.532917, 18.19, 1554.3, 462.85],
    "monserrat": [16.674862, 0.15, 2361.9, 59.05],
    "nicaragua": [10.707378, 4.32, 2053.27, 213.35],
    "panama": [7.202359, 2.45, 1117.1, 681.43],
    "paraguay": [27.605862, 8.31, 2361.9, 59.05],
    "peru": [18.351805, 18.31, 2361.9, 59.02],
    "puerto_rico": [17.882641, 0.63, 580.48, 949.73],
    "saint_bethelemy": [17.870719, 0.09, 1534.96, 472.52],
    "saint_lucia": [13.707083, 0.4, 2361.9, 59.05],
    "saint_vincent": [12.578749, 0.8, 2361.9, 59.05],
    "st_kitts_nevis": [17.093472, 0.32, 2361.9, 59.05],
    "suriname": [1.831146, 4.18, 2361.9, 59.05],
    "trinidad": [10.042917, 1.32, 2361.9, 59.05],
    "turks_caicos": [21.177086, 0.79, 1517.1, 481.42],
    "united_states": [24.520416, 17.49, 1163.7, 658.14],
    "uruguay": [34.97403, 4.89, 2361.9, 59.03],
    "venezuela": [0.64876, 15.02, 2361.91, 59.04],
    "virgin_islands_uk": [18.305973, 0.44, 2070.56, 204.72],
    "virgin_islands_us": [17.672916, 0.74, 2361.9, 59.05]
};

const testVals = 
{
    "voucher-123": {"species": "chuscladum", "lat": 10.0637, "lon": -83.9495},
    "voucher-456": {"species": "chuscladum", "lat": 9.5376, "lon": -83.4278}
};

//need to convert testVals

let mymap = document.getElementById("countryMap");
console.log(countryName);

for (const [key, value] of Object.entries(testVals))
{
    let newElement = document.createElementNS("http://www.w3.org/2000/svg", 'circle'); //Create a path in SVG's namespace
    //need to convert testVals
    const newx = ( (Math.abs( value["lon"] + longitudeToSvgPixelCoefficients[countryName][0] ) / longitudeToSvgPixelCoefficients[countryName][1]) * longitudeToSvgPixelCoefficients[countryName][2] ) + longitudeToSvgPixelCoefficients[countryName][3];
    const ypercent = Math.abs( value["lat"] - latitudeToSvgPixelCoefficients[countryName][0] ) / latitudeToSvgPixelCoefficients[countryName][1];
    const ypercentinverted = 1 - ypercent;
    const ytopx = ypercentinverted * latitudeToSvgPixelCoefficients[countryName][2];
    const newy = ytopx + latitudeToSvgPixelCoefficients[countryName][3];
    const scaledradius = Math.round(longitudeToSvgPixelCoefficients[countryName][2] / 175, 0);  // point radius is 1/175th of the width
    newElement.setAttribute("cx", newx);
    newElement.setAttribute("cy", newy);
    newElement.setAttribute("r", scaledradius);
    newElement.style.stroke = "#ff0000";
    newElement.style.strokeWidth = "5px";
    mymap.appendChild(newElement);
};

<?php
include_once('../../config/symbini.php');
include_once('../../content/lang/index.'.$LANG_TAG.'.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> More Info</title>
	<?php
	$activateJQuery = false;
	include_once($SERVER_ROOT.'/includes/head.php');
	include_once($SERVER_ROOT.'/includes/googleanalytics.php');
	?>
</head>
<body class="w3-theme-l5">
	<?php include($SERVER_ROOT.'/includes/header.php'); ?>
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m6">
        <div class="w3-row-padding">

            <div class="w3-card w3-round w3-white">
	            <div class="w3-container w3-padding">
                    <h4>Diversity and Morphology</h4><br>
                    <hr class="w3-clear">
                    <p>Bamboos (subfamily Bambusoideae) are among the  broad-leaved grasses (Poaceae) associated with forest habitats, but bamboos are  the only major lineage of grasses to diversify in forests. Bambusoideae receive robust support in recent  analyses of the grass family, with the unique feature of well developed,  asymmetrically invaginated arm cells in the leaf blade mesophyll. Large, apparently empty cells (fusoid cells) are also usually present in the mesophyll, but  these are not unique to bamboos. The Bambusoideae,  with ca. 1,400 described species in 101-118 genera, are classified into three  major groups recognized as tribes: the tropical woody bamboos (Bambuseae) with  ca. 800 species distributed worldwide in the Paleotropics and Neotropics, the  temperate woody bamboos (Arundinarieae) with ca. 500 species distributed mainly  in the North Temperate zone, and the herbaceous bamboos (Olyreae) with ca. 120  species restricted largely to the Americas. Woody bamboos may range in size from species with delicate culms a few  cm in height to species with massive culms up to 36 cm in diameter and up to 45  m in height. The woody bamboos have been  regarded as having a single origin based on the presence of several  morphological features, including the presence of culm leaves (leaves modified for the protection and support of the tender young shoots), complex vegetative branching, and gregarious monocarpy (with flowering cycles ranging from a few years  to 120 years), but molecular sequence data support the two lineages described  above (tropical woody bamboos and temperate woody bamboos). Herbaceous bamboos are small- to medium-sized,  non-lignified, clump-forming, stoloniferous, or occasionally scandent plants  with limited vegetative branching and unisexual spikelets. In contrast to woody bamboos, herbaceous  bamboos are strongly supported as having a single origin by molecular sequence  data, but no unequivocally unique morphological feature has been identified for  this tribe.</p>
                </div>
	        </div>



            <br>
	        <!-- Accordion -->
            <div class="w3-card w3-round">
            <div class="w3-white">
                <button onclick="myFunction('Rhizomes')" class="w3-button w3-block w3-theme-l1 w3-left-align">Rhizomes</button>
                <div id="Rhizomes" class="w3-hide w3-container">
                    <div class="w3-row-padding">
                        <br>
                        <div class="w3-half">
                        <img src="characters_files/R-2.jpeg" style="width:100%" class="w3-margin-bottom">
                        <p>Leptomorph rhizomes: 0 = present; 1 = absent.</p>
                        </div>
                        <div class="w3-half">
                        <img src="characters_files/R-3.jpeg" style="width:100%" class="w3-margin-bottom">
                        <p>Culm base morphology: 0 = slender (all internodes more or less equal in diameter) and more or less vertical; 1 = at least some proximal internodes thicker than the distal internode(s) emerging from the soil and more or less horizontal (pachymorph).</p>
                        </div>
                        <div class="w3-half">
                        <img src="characters_files/R-4.jpeg" style="width:100%" class="w3-margin-bottom">
                        <p>Culm base branching (tillering): 0 = tillering absent; 1 = 1 tiller per culm base present; 2 = 2 or more tillers per culm base present.</p>
                        </div>
                        <div class="w3-half">
                        <img src="characters_files/R-5.jpeg" style="width:100%" class="w3-margin-bottom">
                        <p>Culm neck development: 0 = short (neck &lt; the length of the culm base section with relatively short, bud-bearing internodes); 1 = at least some culm necks long (neck &gt; the length of the culm base section with relatively short, bud-bearing internodes).</p>
                        </div>
                    </div>
	           </div>
	           <button onclick="myFunction('Culms')" class="w3-button w3-block w3-theme-l1 w3-left-align">Culms</button>
	           <div id="Culms" class="w3-hide w3-container">
                    <br>
                    <div class="w3-half">
                    <img src="characters_files/C-1.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Habit: 0 = erect; 1 = apically arching/pendulous; 2 = clambering/scandent; 3 = twining; 4 = decumbent.</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/C-6.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Branch initiation/development: 0 = acropetal (toward the apex, i.e., branching begins at the base and proceeds toward the apex); 1 = basipetal (toward the base, i.e., branching begins at the apex and proceeds toward the base; 2 = bidirectional (starting at mid-culm and proceeding toward the base and toward the apex simultaneously).</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/C-7.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Internode length (relative): 0 = all internodes more or less equally elongated along the culm (excluding the normal variation in size between basal/apical internodes and those of the mid-culm); 1 = one elongated internode regularly alternating with 1 to 4 very shortened internodes; 2 = the first internode greatly elongated (up to 5 m long) with additional apical internodes (if present) very shortened.</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/C-8.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Nodal line position: 0 = horizontal; 1 = dipping slightly below the bud(s); 2 = dipping markedly below the bud(s).</p>      
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/C-9.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Nodal line diameter: 0 = more or less the same diameter as the adjacent internodes; 1 = borne on a flange-like extension (patella), its diameter greater than the adjacent internodes.</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/C-10.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Supranodal ridge: 0 = inconspicuous (a line, diameter less than at the nodal line); 1 = conspicuous (a ridge, diameter equal to or greater than at the nodal line).</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/C-12.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Aerial root morphology: 0 = root-like (more or less elongated, firm, and rounded at the apices); 1 = spine-like (short, hardened, and pointed).</p>
                    </div>
	            </div>
                <button onclick="myFunction('BudsBranching')" class="w3-button w3-block w3-theme-l1 w3-left-align">Buds and Branching</button>
	            <div id="BudsBranching" class="w3-hide w3-container">
                <div class="w3-col m12"><b>General</b></div>
                    <div class="w3-half">
                    <img src="characters_files/b-14.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Branching pattern: 0 = intravaginal; 1 = extravaginal; 2 = infravaginal. </p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-15.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Thorns developing from the primary axis (or central primary axis): 0 = absent; 1 = present.</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-16.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Thorn morphology: 0 = relatively short, stout, stiff and usually curved; 1 = relatively elongated, slender, more or less flexible and at most slightly curved. </p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-17.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Bud/branch complement base: 0 = indistinguishable from the adjacent nodal region (promontory absent); 1 = swollen, forming a promontory that bears the bud/branch complement.</p>
                    </div>
                <div class="w3-col m12"><b>Hypothesis 1</b> was proposed by McClure (1966, 1973), who regarded the multiple buds of <i>Chusquea</i> as all primary. Presumably the dominant bud is homologous to the single primary bud typical of bamboos, while the two to many additional smaller subsidiary buds are derived separately from meristematic tissue of the nodal region (in the more general morphology literature these would be called supernumerary buds).</div>
                    <div class="w3-half">
                    <img src="characters_files/b-1.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Primary buds per mid-culm node: 0 = 1; 1 = 2 or more; 2 = none. </p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-2.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>Multiple primary buds, relative size: 0 = all buds subequal; 1 = central primary bud at least 2 times the diameter of the other primary buds (i.e., subsidiary buds). [Inapplicable for taxa with a single primary bud or with no buds.]</p>
                    </div>
                <div class="w3-col m12"><b>Hypothesis 2</b> was proposed by Stapleton (1997), who said that extensive loss or reduction of prophylls was consistent with condensation of a single primary axis as a pathway for the evolution of the bud complement in <i>Chusquea</i>. Although the main example here is <i>Chusquea</i>, other taxa with multiple buds include <i>Filgueirasia</i> or <i>Holttumochloa</i>.</div>
                    <div class="w3-half">
                    <img src="characters_files/b-3-9.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>H1: Central (or sole) primary bud shape: 0 = triangular; 1 = circular (dome-shaped).</p>
                    <p>H2: Primary bud shape: 0 = triangular; 1 = circular (dome-shaped). [Inapplicable for taxa with multiple buds, unless one wishes to assume that the shape of the central bud reflects the shape of the primary bud.]</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-4-10.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>H1: Central (or sole) primary bud prophyll: 0 = prophyll unitary, margins free (open); 1 = prophyll unitary, margins fused (closed); 2 = prophyll binary (divided), margins free (open).</p>
                    <p>H2: Primary bud prophyll: 0 = prophyll unitary, margins free (open); 1 = prophyll unitary, margins fused (closed); 2 = binary (divided), margins free (open). [Again, inapplicable for <i>Chusquea</i> and other taxa with multiple buds.]</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-5-11.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>H1: Compression of the proximal internodes of the axis developing from the central (or sole) primary bud: 0 = no compressed internodes present; 1 = one compressed proximal internode present at the very base; 2 = two to several compressed proximal internodes at the base; 3 = all internodes compressed.</p>
                    <p>H2: Compression of the proximal internodes of the primary axis: 0 = no compressed internodes present; 1 = one compressed proximal internode present at the very base; 2 = two to several compressed proximal internodes at the base; 3 = all internodes compressed. </p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-6-12.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>H1: Relative sizes of secondary branches developing from the central (or sole) primary axis: 0 = secondary axes subequal to the central (or sole) primary axis; 1 = at least some of the secondary axes no more than one-half the diameter of the central (or sole) primary axis.</p>
                    <p>H2: Relative sizes of secondary branches developing from the primary axis:0 = secondary axes subequal to the primary axis; 1 = at least some of the secondary axes no more than one-half the diameter of the central axis. [Under this hypothesis, the secondary branches include both the ones flanking the dominant bud/branch in <i>Chusquea</i> and the ones that grow from the nodes of the dominant branch once it develops.]</p>
                    </div>
                    <div class="w3-half">
                    <img src="characters_files/b-7-13.jpeg" style="width:100%" class="w3-margin-bottom">
                    <p>H1: Central (or sole) primary branch size relative to the main culm: 0 = more or less equal in diameter; 1 = smaller in diameter than the main culm.</p>
                    <p>H2: Primary axis size relative to the main culm: 0 = more or less equal in diameter; 1 = primary axis smaller in diameter than the main culm.</p>
                    </div>
                </div>
                <button onclick="myFunction('CulmLeaves')" class="w3-button w3-block w3-theme-l1 w3-left-align">Culm Leaves</button>
	            <div id="CulmLeaves" class="w3-hide w3-container">
                <div class="w3-half">
                <img src="characters_files/cl-1.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Girdle: 0 = absent or poorly developed; 1 = present as a band at least 1 mm wide, no flap, prominent or not; 2 = prominent, with or without a flap covering the bud complement.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-3.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Adaxial sheath surface: 0 = glabrous, shiny; 1 = scabrous-pubescent toward the apex.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-4.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Sheath apex: 0 = more or less horizontal; 1 = symmetrically convex; 2 = symmetrically concave; 3 = asymmetrical/irregular.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-5.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Sheath apex (or summit or shoulders) indument: 0 = glabrous; 1 = fimbriate</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-6.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Sheath summit extension: 0 = absent; 1 = present on one or both sides.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-7.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Oral setae: 0 = absent; 1 = present, whether adnate to the inner ligule or not.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-8.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Culm leaf blade position: 0 = erect to slightly spreading; 1 = reflexed.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-9.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Culm leaf blade shape: 0 = broadly triangular; 1 = more or less narrowly triangular; 2 = cordate, some constriction at the base; 3 = pseudopetiolate, lanceolate.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-10.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Culm leaf blade midrib abaxial development: 0 = indistinguishable; 1 = visible or even prominent toward the apex.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-11.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Auricle (blade-derived appendage) development: 0 = absent; 1 = present and contiguous with the base of the blade; 2 = present on the sheath apex but not contiguous with the blade.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-12.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Auricle size: 0 = auricles more or less equal on both sides of the blade base; 1 = strongly unequal, at least 2 times as large (or long) on one side as on the other side.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-13.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Auricle indument: 0 = glabrous or ciliate; 1 = fimbriate.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/cl-14.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Auricle position: 0 = erect; 1 = strongly spreading or reflexed.</p>
                </div>
                </div>
                <button onclick="myFunction('FoliageLeaves')" class="w3-button w3-block w3-theme-l1 w3-left-align">Foliage Leaves</button>
	            <div id="FoliageLeaves" class="w3-hide w3-container">
                <div class="w3-half">
                <img src="characters_files/fl-1.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Sheath summit extension: 0 = absent; 1 = present on one or both sides.</p>      
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-2.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Sheath summit indument: 0 = glabrous; 1 = ciliate; 2 = fimbriate.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-4.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Outer ligule (contraligule): 0 = present; 1 = absent.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-5.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Oral setae: 0 = absent; 1 = present wether adnate to the inner ligule or not.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-6.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Auricle (blade-derived appendage) development: 0 = absent; 1 = present.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-8.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Auricle indument: 0 = glabrous; 1 = ciliate; 2 = fimbriate.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-10.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Foliage leaf blade, pseudopetiole absent: 0 = pseudopetiole distinct (leaf blade base constricted); 1 = pseudopetiole absent (leaf blade not constricted).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-11.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Foliage leaf blade/pseudopetiole position: 0 = pseudopetiole (if present) and blade upwardly directed, blade fully erect or arching over; 1 = pseudopetiole (and therefore the blade) reflexed.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-12.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Midrib placement: 0 = centric; 1 = excentric (wider side of blade 1.3 times or more as wide as the narrower side).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/fl-13.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Midrib development (abaxial surface): 0 = visible (distinct) for the full length (or nearly so) of the blade; 1 = visible (distinct) only in the basal one-third or so if the blade; 2 = not distinguishable from the primary veins in the leaf blade.</p>
                </div>
                </div>
                <button onclick="myFunction('Synflorescences')" class="w3-button w3-block w3-theme-l1 w3-left-align">Synflorescences</button>
	            <div id="Synflorescences" class="w3-hide w3-container">
                    <div class="w3-col m12"><p>Stapleton (1997) and others have interpreted the spikelet (i.e., little spike) as representing the basic inflorescence type within the grass family; this interpretation is accepted here.  This means that an aggregation of spikelets becomes a compound structure, which we refer to as the synflorescence.  Synflorescences in grasses are traditionally described as spikes, racemes, or panicles or some variation on one of these themes.  It should be noted, however, that in addition to the compound nature of grass synflorescences, they mature in a determinate pattern so that grasses, including bamboos, do not have true spikes, racemes, or panicles, except for the spikelets themselves, which are bracteate spikes.  In bamboos, there is also the additional challenge of interpreting the pseudospikelet, which contains bud-bearing (gemmiparous) bracts that usually continue to develop additional orders of pseudospikelets but in a cymose fashion.  Inferring homology among the synflorescences of bamboos must await a deeper understanding of bamboo evolution derived from other sources of data, so the characters in this section are focused primarily on structures that differentiate spikelets and pseudospikelets.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/S-1.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>One or more gemmiparous bracts subtending the spikelet proper:  0 = absent; 1 = present, buds developing subsequently or not.</p>      
                </div>
                <div class="w3-half">
                <img src="characters_files/S-2.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Subtending bract at the base of the axis bearing the spikelet or spikelet proper:  0 = absent; 1 = present.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/S-3.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Subtending bract morphology:  0 = scalelike or present as a scar or rim, no more than a few mm long, blade absent; 1 = well developed with both a sheath and a blade (this often modified).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/S-4.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Prophyll at the base of the axis bearing the spikelet or spikelet proper:  0 = absent; 1 = present.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/S-5.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Prophylls:  0 = whole; 1 = at least some deeply cleft to split lengthwise into two halves.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/S-6.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>One or more spatheate bracts associated with clusters of spikelets or spikelets proper:  0 = absent; 1 = present.</p>
                </div>
                </div>
                <button onclick="myFunction('Spikelets')" class="w3-button w3-block w3-theme-l1 w3-left-align">Spikelets</button>
	            <div id="Spikelets" class="w3-hide w3-container">
                    <div class="w3-col m12"><p>As noted under Synflorescence characters, we interpret the spikelet (or spikelet proper of a pseudospikelet) as a bracteate spike, which thus represents the true inflorescence in grasses (Stapleton 1997 and others). Based on this interpretation, the main axis (rachilla) of the spikelet becomes a rachis and the pedicel becomes a peduncle, so we use this terminology here.</p></div>
                <div class="w3-half">
                <img src="characters_files/SP-1.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Compression of florets:  0 = terete; 1 = lateral; 2 = dorsal.</p>      
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-3.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Lowermost glume (glume I) development:  0 = well developed; 1 = strongly reduced, scalelike.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-4.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Apex of lowermost glume:  0 = obtuse/truncate; 1 = acute; 2 = mucronate; 3 = awned.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-5.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Next higher glume (glume II) development:  0 = well developed; 1 = strongly reduced, scalelike.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-6.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Apex of next higher glume:  0 = obtuse/truncate; 1 = acute; 2 = mucronate; 3 = awned.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-9.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Rachis extension (internode only, with or without rudimentary floret):  0 = absent; 1 = present.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-10.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Relative length of the rachis extension (internode only, with or without rudimentary floret) when present:  0 = short (shorter than or equal to about half the length of the floret); 1 = long (approximately equal to or longer than the floret).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-11.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Rachis extension (internode only):  0 = glabrous; 1 = hairy.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-12.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Rudimentary floret on the rachis extension:  0 = absent; 1 = present.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-14.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Female-fertile lemma shape:  0 = navicular; 1 = spindle-shaped; 2 = ellipsoid; 3 = helmet-shaped.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-15.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Female-fertile lemma apex shape:  0 = obtuse; 1 = acute; 2 = mucronate; 3 = awned.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-16.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Female-fertile lemma apex fusion (exclusive of the awn or mucro if present):  0 = margins free; 1 = margins fused (connate).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-18.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Palea keels:  0 = bicarinate (2-keeled); 1 = 1-keeled; 2 = rounded (keels not evident).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-19.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Palea keel wings:  0 = absent; 1 = present.</p>      
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-20.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Palea apex:  0 = biapiculate (sinus shallow); 1 = tips long-divided (sinus deep); 2 = acute, not divided.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/SP-21.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Palea sulcus:  0 = well developed for full length of palea; 1 = well developed only toward the apex; 2 = absent.</p>
                </div>
                </div>
                <button onclick="myFunction('FlowersFruits')" class="w3-button w3-block w3-theme-l1 w3-left-align">Flowers and Fruits</button>
	            <div id="FlowersFruits" class="w3-hide w3-container">
                <div class="w3-half">
                <img src="characters_files/FF-2.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Lodicule margin pubescence:  0 = ciliate (l) or ciliolate (r); 1 = glabrous (entire).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-4.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Stamen filaments:  0 = free; 1 = monadelphous.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-5.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Anther apex:  0 = lobes rounded; 1 = lobes apiculate.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-6.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Anther connective:  0 = lower than apical anther lobes, not extended; 1 = narrow and slightly (l) to greatly (r) elongated; 2 = as wide as anther apex and shortly elongated.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-7.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Style base/ovary apex:  0 = ovary apex narrow and continuous with the style base (normal); 1 = ovary apex blunt, the style base forming an expanded cap (or hood) on top; 2 = ovary apex blunt, hood absent.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-8.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Style proper length:  0 = absent (including extremely short, less than 0.1 mm); 1 = elongated by over 0.1 mm up to the length of the ovary; 2 = elongated and greater than the length of the ovary.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-9.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Style proper pubescence:  0 = glabrous; 1 = pubescent.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-12.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Stigma branching:  0 = very branched and plumose (2 or more orders of branching); 1 = limited branching/simple, hispid (1 order of branching).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-13.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Caryopsis/ovary base:  0 = sessile; 1 = stalked (stipitate).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-14.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Caryopsis apex:  0 = acute, no additional persistent structures; 1 = short style, style base (if style elongated) or short style plus stigma bases persistent; 2 = thickened style base persistent, often a slight constriction between the caryopsis apex and the style base evident or a distinct line or ridge present in this position; 3 = elongated style persistent; 4 = hood (cap) persistent.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-15.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Pericarp adnation (in mature fruit):  0 = strongly adnate to the seed coat (separates only with great difficulty or not at all through cutting, scraping or rubbing); 1 = not adnate to the seed coat (separates easily through cutting, scraping or rubbing).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-16.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Pericarp texture:  0 = thin, papery and dull; 1 = thin, hardened and shiny; 2 = thickened, fleshy.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FF-17.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Embryo position (caryopsis in longitudinal side view):  0 = lateral at the base; 1 = central at the base.</p>
                </div>
                </div>
                <button onclick="myFunction('LeafAnatomy')" class="w3-button w3-block w3-theme-l1 w3-left-align">Leaf Anatomy</button>
	            <div id="LeafAnatomy" class="w3-hide w3-container">
                    <div class="w3-col m12"><p>The transverse (or cross-) section of a bamboo leaf blade shows features such as the presence of arm and fusoid cells that are characteristic of bamboos generally, but variations in these and other features can help to distinguish among major groups within the bamboos.  For additional information on grass leaf anatomy and terminology, please consult Ellis (1976). [Ellis, R. P.  1976.  A procedure for standardizing comparative leaf anatomy in the Poaceae.  I. The leaf blade as viewed in transverse section.  Bothalia 12: 65-109.]</p></div>
                <div class="w3-half">
                <img src="characters_files/FA-1.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Vasculature of the midrib:  0 = one larger bundle with one or more superposed smaller bundles; 1 = two or more (usually at least three) bundles in an arc; 2 = one single bundle.</p>      
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-2.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Midrib protrusion:  0 = protruding adaxially and abaxially approximately equally; 1 = protruding strongly adaxially only; 2 = protruding abaxially only.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-3.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Intercostal sclerenchyma in mesophyll:  0 = absent; 1 = present.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-4.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Intercostal sclerenchyma in mesophyll, distribution:  0 = abaxial only; 1 = adaxial only; 2 = both abaxial and adaxial.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-6.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Arm cell invagination (transverse section, only the row directly beneath the adaxial epidermis, between midrib and margin):  0 = entire, no lobing or invagination; 1 = rosette (lobing more or less shallow and all around); 2 = asymmetrically invaginated, abaxial side; 3 = asymmetrically invaginated, adaxial side.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-7.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Fusoid cells (score as present even if found only in part of the blade transverse section):  0 = present; 1 = absent.</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-8.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Abaxial sclerenchyma girder of primary bundles:  0 = more or less straight-sided (whether narrow or wide); 1 = dilated (narrower at the bundle, becoming wider toward the epidermis).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-9.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Adaxial sclerenchyma girder of primary bundles:  0 = narrow to slightly dilated (one or a few columns wide); 1 = anchor-shaped (surface between bulliform cell groups lined with sclerenchyma cells).</p>
                </div>
                <div class="w3-half">
                <img src="characters_files/FA-11.jpeg" style="width:100%" class="w3-margin-bottom">
                <p>Bulliform cell groups:  0 = even with or slightly lower than the adaxial epidermis; 1 = elevated relative to the adaxial epidermis.</p>
                </div>
                </div>
	        </div>
	        </div>
	        <br>
</div>
	     <!-- End Left Column -->
	     </div>




	     <!-- Right Column -->
	     <div class="w3-col m6">
	       <div class="w3-row-padding">

	           <div class="w3-card w3-round w3-white">
	             <div class="w3-container w3-padding">
	               <h4>Distribution</h4><br>
	               <hr class="w3-clear">
                   <p>Bamboos have a wide natural distribution, occurring from approximately 46° N latitude to approximately 47° S latitude and from sea level to as much as 4,300 meters in elevation in equatorial highlands. Here, maps of the major groups of bamboos are provided to illustrate broad distribution patterns within Bambusoideae.</p>
                   <div class="w3-half">
                        <img src="maps_files/Olyreae.gif" style="width:100%" class="w3-margin-bottom">
                        <span class="w3-tiny">Figure 1. Distribution of Olyreae.</span>
                    </div>
                        <p>The "herbaceous" bamboos (tribe Olyreae) are concentrated in the Neotropics, where more than 20 genera and over 150 species are found (Judziewicz et al. 1999) from Mexico to northern Argentina, Paraguay and southern Brazil as well as in the West Indies (Fig. 1). Buergersiochloa, which includes only one species, is endemic to New Guinea (Fijten 1975). Members of this tribe rarely occur above 1,000 meters in elevation. One of the neotropical species, <i>Olyra latifolia</i>, is somewhat weedy and is the most widely distributed herbaceous bamboo, known from tropical Africa and Madagascar in addition to its broad neotropical distribution. <i>Olyra latifolia</i> is clearly naturalized in tropical Africa and Madagascar, but the question of whether it is truly native to these areas is still debated. We have used a lighter shade of gold to indicate this uncertainty. A report that <i>O. latifolia</i> occurred in the Tampa area of Florida in the continental United States is derived from confusion surrounding the geographic names. According to Dr. Gerald (Stinger) Guala, there is or was a location called Tampa in Cuba, and Cuba was included in a broader region called Florida, therefore Dr. Guala considers it much more likely that the specimen upon which this report was based came from Cuba and not the continental United States.</p>
                        <div class="w3-half">
                            <img src="maps_files/world-total-woody.gif" style="width:100%" class="w3-margin-bottom">
                            <span class="w3-tiny">Figure 2. Distribution of Arundinarieae and Bambuseae.</span>
                        </div>
	               <p>The woody bamboos (Fig. 2) are much more widely distributed, both geographically and altitudinally, than the herbaceous bamboos (Judziewicz et al., 1999). Within the woody bamboos, three major clades have emerged from recent studies: the "north temperate" woody bamboos (Arundinarieae), the paleotropical woody bamboos (PWB, Bambuseae), and the neotropical woody bamboos (NWB, Bambuseae). Species in Arundinarieae are widespread and diverse in the north temperate zone but some members occur at higher elevations in parts of Africa, Madagascar, southern India, Sri Lanka, and South-East Asia (Fig. 3). The paleotropical woody bamboos are distributed in tropical and subtropical regions of Africa, Madagascar, India, Sri Lanka, South-East Asia, southern China, southern Japan, and Oceania (Fig. 4). The neotropical bamboos are distributed from Mexico south to Argentina and Chile and in the West Indies (Fig. 5).</p>
                   <div class="w3-half">
                            <img src="maps_files/north-temperate.gif" style="width:100%" class="w3-margin-bottom">
                            <span class="w3-tiny">Figure 3. Distribution of Arundinarieae.</span>
                        </div>
                        <div class="w3-half">
                            <img src="maps_files/paleotropical.gif" style="width:100%" class="w3-margin-bottom">
                            <span class="w3-tiny">Figure 4. Distribution of the paleotropical (PWB) clade of Bambuseae.</span>
                        </div>
                        <div class="w3-half">
                            <img src="maps_files/neotropical.gif" style="width:100%" class="w3-margin-bottom">
                            <span class="w3-tiny">Figure 5. Distribution of the neotropical (NWB) clade of Bambuseae.</span>
                        </div>
	             </div>

	         </div>
	       </div>


	       </div>

	     <!-- End Right Column -->
	     </div>

	   <!-- End Grid -->
	   </div>
	 <br>
	<?php
	include($SERVER_ROOT.'/includes/footer.php');
	?>
</body>
</html>

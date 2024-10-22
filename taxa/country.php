<?php
include_once('../config/symbini.php');
include_once($SERVER_ROOT.'/content/lang/taxa/index.'.$LANG_TAG.'.php');
include_once($SERVER_ROOT.'/classes/TaxonProfile.php');
include_once($SERVER_ROOT.'/taxa/graphics.php');
include('americas.php');
Header('Content-Type: text/html; charset='.$CHARSET);


$countryValue = array_key_exists('country',$_REQUEST)?$_REQUEST['country']:'';

$taxonValue = array_key_exists('taxon',$_REQUEST)?$_REQUEST['taxon']:'';
$tid = array_key_exists('tid',$_REQUEST)?$_REQUEST['tid']:'';
$taxAuthId = array_key_exists('taxauthid',$_REQUEST)?$_REQUEST['taxauthid']:1;
$clid = array_key_exists('clid',$_REQUEST)?$_REQUEST['clid']:0;
$pid = array_key_exists('pid',$_REQUEST)?$_REQUEST['pid']:'';
$lang = array_key_exists('lang',$_REQUEST)?$_REQUEST['lang']:$DEFAULT_LANG;
$taxaLimit = array_key_exists('taxalimit',$_REQUEST)?$_REQUEST['taxalimit']:50;
$page = array_key_exists('page',$_REQUEST)?$_REQUEST['page']:0;

//Sanitation
$countryValue = strip_tags($countryValue);
$countryValue = preg_replace('/[^a-zA-Z0-9\-\s.†×]/', '', $countryValue);
$countryValue = htmlspecialchars($countryValue, ENT_QUOTES, 'UTF-8');
if(!is_numeric($tid)) $tid = 0;
if(!is_numeric($taxAuthId)) $taxAuthId = 1;
if(!is_numeric($clid)) $clid = 0;
if(!is_numeric($pid)) $pid = '';
$lang = filter_var($lang,FILTER_SANITIZE_STRING);
if(!is_numeric($taxaLimit)) $taxaLimit = 100;
if(!is_numeric($page)) $page = 0;

$taxonManager = new TaxonProfile();
if($taxAuthId) $taxonManager->setTaxAuthId($taxAuthId);
if($tid) $taxonManager->setTid($tid);
elseif($taxonValue){
	$tidArr = $taxonManager->taxonSearch($taxonValue);
	$tid = key($tidArr);
	//Need to add code that allows user to select target taxon when more than one homonym is returned
}

$taxonManager->setLanguage($lang);
if($pid === '' && isset($DEFAULT_PROJ_ID) && $DEFAULT_PROJ_ID) $pid = $DEFAULT_PROJ_ID;

/* if($redirect = $taxonManager->getRedirectLink()){
	header('Location: '.$redirect);
	exit;
} */

$isEditor = false;
if($SYMB_UID){
	if($IS_ADMIN || array_key_exists('TaxonProfile',$USER_RIGHTS)){
		$isEditor = true;
	}
}
?>


<!--  START PAGE  -->


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $countryValue . " - " . $DEFAULT_TITLE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $CHARSET; ?>"/>
	<?php
	$activateJQuery = true;
	include_once($SERVER_ROOT.'/includes/head.php');
	include_once($SERVER_ROOT.'/includes/googleanalytics.php');
	//$cssPath = $CLIENT_ROOT.$CSS_BASE_PATH.'/taxa/speciesprofile.css?ver=1';
	//if(!file_exists($cssPath)){
	//	$cssPath = $CLIENT_ROOT.'/css/symb/taxa/speciesprofile.css?ver=2';
	//}
	echo '<link href="'.$cssPath.'?ver='.$CSS_VERSION_LOCAL.'" type="text/css" rel="stylesheet" />';
	echo '<link rel="stylesheet" type="text/css" href="'.$CSS_BASE_PATH.'/taxa/traitplot.css" />';
	echo '<link rel="stylesheet" type="text/css" href="'.$CSS_BASE_PATH.'/taxa/graphics.css" />';
	?>

	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery-ui.js" type="text/javascript"></script>
	<script src="../js/symb/taxa.index.js?ver=202101" type="text/javascript"></script>
	<script src="../js/symb/taxa.editor.js?ver=202101" type="text/javascript"></script>
	<script type="text/javascript">
		const countryName = '<?php echo $countryValue; ?>';
		function colorMap(countryCode) {
			try {
				var svgpath = document.getElementById(countryCode);
				svgpath.setAttribute("style", "fill:#537828");
			}
			catch {
				console.log("SVG path "+countryCode+" does not exist.")
			}
		}
	</script>

	<style type="text/css">
		.resource-title{ font-weight: bold; }
	</style>
</head>
<body class="w3-theme-l5">
	<?php include($SERVER_ROOT.'/includes/header.php'); ?>
	<!-- Start Page Grid -->
	<div class="w3-row">
    	<!-- Left Column -->
    	<div class="w3-col m7">
	    <div class="w3-row-padding">

		<?php
		if($taxonManager->getTaxonName()){
			if(count($taxonManager->getAcceptedArr()) == 1){
				$taxonRank = $taxonManager->getRankId();
				if($taxonRank > 210){  // i.e., above genus
					?>
					<div class="w3-card w3-round w3-white">
	        		<div class="w3-container">
					<?php
					if($isEditor){
						echo '<div id="editorDiv" class="w3-right">';
						echo '<a href="profile/tpeditor.php?tid='.$taxonManager->getTid().'" title="'.(isset($LANG['EDIT_TAXON_DATA'])?$LANG['EDIT_TAXON_DATA']:'Edit Taxon Data').'">';
						echo '<img class="navIcon" src="../images/edit.png" /></a></div>';
					}
					?>

					<div id="scinameDiv" class="w3-col m12 w3-center">
						<span id="<?php echo ($taxonManager->getRankId() > 179?'sciname':'taxon'); ?>">
						<?php echo $taxonManager->getTaxonName(); ?>
						</span>
						<span id="author"><?php echo $taxonManager->getTaxonAuthor(); ?></span>
						<?php $parentLink = 'index.php?tid='.$taxonManager->getParentTid().'&clid='.$clid.'&pid='.$pid.'&taxauthid='.$taxAuthId; ?>
						<!-- &nbsp;<a href="<?php //echo $parentLink; ?>"><img class="navIcon" src="../images/toparent.png" title="Go to Parent" /></a> -->
					</div>

					<?php
					if($synArr = $taxonManager->getSynonymArr()){
						$primerArr = array_shift($synArr);
						$synStr = '<span class="synSpan w3-small" style="display:inline"><i>'.$primerArr['sciname'].'</i>'.(isset($primerArr['author']) && $primerArr['author']?' '.$primerArr['author']:'');
						if($synArr){
							foreach($synArr as $synKey => $sArr){
								$synStr .= '<br><i>'.$sArr['sciname'].'</i> '.$sArr['author'].', ';
							}
							$synStr = trim($synStr,', ').'</span>';
						}
						echo '<div class="w3-col m12" id="synonymDiv" title="'.(isset($LANG['SYNONYMS'])?$LANG['SYNONYMS']:'Synonyms').'">';
						if($taxonManager->isForwarded()){
							echo '<span class="w3-tiny w3-opacity w3-right"> ['.(isset($LANG['REDIRECT'])?$LANG['REDIRECT']:'redirected from').': <i>'.$taxonManager->getSubmittedValue('sciname').'</i> '.$taxonManager->getSubmittedValue('author').']</span><br>';
						}
						echo $synStr;
						echo '</div>';
					}

							//Map
							echo '<div class="w3-container w3-center">
							<hr>
							<h4 class="w3-left">Distribution</h4>';
							echo emitCountrySVG($countryValue);
							//echo emitAmericasSVG($taxonManager->getTid());
							$countryinfo = $taxonManager->getCountries();
							$countries = str_replace(' ', '-', $countryinfo);
							$countries = preg_filter('/^/', $taxonManager->getTid(), $countries);
							?>
							<textarea id="bboxvalues"></textarea>
							<script type="text/javascript">
								var countries = <?php echo json_encode($countries); ?>;
								countries.forEach(colorMap);
								mapelem = document.getElementById("countryMap");
								txtelem = document.getElementById("bboxvalues");
								txtelem.innerHTML = "x: " + mapelem.x.toFixed(2) + ", w: " + mapelem.width.toFixed(2) + ", y: " + mapelem.y.toFixed(2) + ", h: " + mapelem.height.toFixed(2);
							</script>
							<script src="../js/symb/taxa.country.js"></script>
							<?php 
								echo '<span class="w3-small">Reportedly collected from: ' . implode(', ', $countryinfo) . '</span>';
							?>
							</div>

							<?php
							if(!$taxonManager->echoImages(0,1,0)){
								echo '<div class="w3-col m12">';
								echo '<div class="image" style="text-align:center;">';   //style="width:260px;height:260px;border-style:solid;margin-top:5px;margin-left:20px;text-align:center;"
								echo '</div></div>';
							}
							?>

							</div></div> <!-- close container, then card -->

						</div>
					</div>

					<!-- Right Column -->
						<div class="w3-col m5">
						<div class="w3-row-padding">

			 	<!-- Alert Box -->
				 <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
					<span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
					<i class="fa fa-remove"></i>
					</span>
					<p>Please Note: Data, maps and profiles are provided as-is and are dynamically generated from specimen records. Inaccuracies and misidentifications can affect data quality. If you notice or suspect an error, please notify the maintainer at tyrrell@mpm.edu. Thank you!
					<div style="margin: 5px"><img src="https://img.shields.io/badge/Data Snapshot-DEV ENV-green.svg" /></div>
					</p>
				</div>

						<div class="w3-card w3-round w3-white">
	        			<div class="w3-container">
							<h4>Habitat</h4>
							<div class="w3-col m12">
								<?php
									$habdesc = "<i>".$taxonManager->getTaxonName()."</i> is ";
									if ($wcdata['bio-avg'][0]) {
										$habdesc .= "known from localities with an annual mean temperature of ".round($wcdata['bio-avg'][0],1)."&deg;C";
										if ($wcdata['bio-avg'][11]) $habdesc .= " and precipitation of ".round($wcdata['bio-avg'][11],0)." mm";
										$habdesc .= ".";
									} elseif ($wcdata['bio-avg'][11]) {
										$habdesc .= "known from localities with an annual mean precipitation of ".round($wcdata['bio-avg'][11],0)." mm.";
									} else { $habdesc .= "not known from any georeferenced localities or the localities lack mean annual temperature or precipitation data."; }

									if($wcdata['bio-avg'][3]) {
										if($wcdata['bio-avg'][3] < 100) {
											$tadv = "relatively little";
										} elseif ($wcdata['bio-avg'][3] > 200) {
											$tadv = "considerable";
										} else {
											$tadv = "moderate";
										}
										$habdesc .= " Temperatures show ".$tadv." seasonality (standard deviation ~".round($wcdata['bio-avg'][3],1)."), varying from ".round($wcdata['bio-avg'][4],1)."&deg;C in the warmest month to ".round($wcdata['bio-avg'][5],1)."&deg;C in the coolest (isothermality ratio ~".round($wcdata['bio-avg'][2],1).").";
									}

									if($wcdata['bio-avg'][14]) {
										if($wcdata['bio-avg'][14] < 30) {
											$padv = "relatively little";
										} elseif ($wcdata['bio-avg'][14] > 50) {
											$padv = "considerable";
										} else {
											$padv = "moderate";
										}
										$habdesc .= " Precipitation shows ".$padv." seasonality (coefficient of variation ~".round($wcdata['bio-avg'][14],1)."), varying from ".round($wcdata['bio-max'][12],0)." mm in the wettest month to ".round($wcdata['bio-min'][13],0)." mm in the driest.";
									}

									if($wcdata['bio-max'][15]){
										$habdesc .= " The mean temperatures of the wettest (totaling ".round($wcdata['bio-max'][15],0)." mm) and driest (totaling ".round($wcdata['bio-min'][16],0)." mm) quarters being ".round($wcdata['bio-avg'][7],1)."&deg;C and ".round($wcdata['bio-avg'][8],1)."&deg;C, respectively, and the mean precipitation of the warmest (".round($wcdata['bio-max'][9],1)."&deg;C) and coolest (".round($wcdata['bio-min'][10],1)."&deg;C) quarters being ".round($wcdata['bio-avg'][17],0)." mm and ".round($wcdata['bio-avg'][18],0)." mm, respectively.";
									}

									echo $habdesc;
								?>
								<p>Tables and figures are dynamically generated by intersecting georeferenced herbarium specimen localities with 10 minute resolution <a href="http://www.worldclim.com/version2" target="_blank">WorldClim v2.1</a> variables (Fick and Hijmans 2017). The above data are subject to change as specimens and geocoordinates are added, removed or altered.</p>
								<p class="w3-tiny">Fick, S.E. and R.J. Hijmans, 2017. Worldclim 2: New 1-km spatial resolution climate surfaces for global land areas. International Journal of Climatology 37(12), 4302–4315. <a href="https://doi.org/10.1002/joc.5086" target="_blank">doi:10.1002/joc.5086</a></p>
								<hr>

								<p class="w3-tiny">Specimens Referenced: 
								<?php echo $taxonManager->getGatherings(); ?>
								</p> 
							</div>
						</div>
						</div>
						<br>

							<?php
							$imgCnt = $taxonManager->getImageCount();
							$tabText = (isset($LANG['TOTAL_IMAGES'])?$LANG['TOTAL_IMAGES']:'Total Images');
							if($imgCnt == 100){
								$tabText = (isset($LANG['INITIAL_IMAGES'])?$LANG['INITIAL_IMAGES']:'Initial Images').'<br/>- - - - -<br/>';
								$tabText .= '<a href="'.$CLIENT_ROOT.'/imagelib/search.php?submitaction=search&taxa='.$tid.'">'.(isset($LANG['VIEW_ALL_IMAGES'])?$LANG['VIEW_ALL_IMAGES']:'View All Images').'</a>';
							}
							?>
							<div id="img-tab-div" style="display:<?php echo $imgCnt > 6?'block':'none';?>;border-top:2px solid gray;margin-top:2px;">
								<div style="background:#eee;padding:10px;border: 1px solid #ccc;width:110px;margin:auto;text-align:center">
									<a href="#" onclick="expandExtraImages();return false;">
										<?php echo (isset($LANG['CLICK_TO_DISPLAY'])?$LANG['CLICK_TO_DISPLAY']:'Click to Display').'<br/>'.$imgCnt.' '.$tabText; ?>
									</a>
								</div>
							</div>
						</div></div>

					<?php
				} else { 


// Page for above the rank of species starts here

					?>
					<div class="w3-card w3-round w3-white">
	        		<div class="w3-container">
						<?php
						if($isEditor){
							echo '<div id="editorDiv" class="w3-right">';
							echo '<a href="profile/tpeditor.php?tid='.$taxonManager->getTid().'" title="'.(isset($LANG['EDIT_TAXON_DATA'])?$LANG['EDIT_TAXON_DATA']:'Edit Taxon Data').'">';
							echo '<img class="navIcon" src="../images/edit.png" /></a></div>';
						}
						?>

						<div id="scinameDiv" class="w3-col m12 w3-center">
							<span id="<?php echo ($taxonManager->getRankId() > 179?'sciname':'taxon'); ?>">
							<?php echo $taxonManager->getTaxonName(); ?>
							</span>
							<span id="author"><?php echo $taxonManager->getTaxonAuthor(); ?></span>
							<?php $parentLink = 'index.php?tid='.$taxonManager->getParentTid().'&clid='.$clid.'&pid='.$pid.'&taxauthid='.$taxAuthId; ?>
							<!-- &nbsp;<a href="<?php //echo $parentLink; ?>"><img class="navIcon" src="../images/toparent.png" title="Go to Parent" /></a> -->
						</div>
<?php
						//Map
							echo '<div class="w3-container w3-center">
							<hr>';
							//  <h4 class="w3-left">Distribution</h4>';
							// echo file_get_contents("americas.svg");
							// $countryinfo = $taxonManager->getCountries();
							// $countries = $countryinfo['code'];
							?>

							<?php 
								//echo '<span class="w3-small">Reportedly collected from: ' . implode(', ', $countryinfo['name']) . '</span>';
							?>
							</div><br>

							<?php
							if(!$taxonManager->echoImages(0,1,0)){
								echo '<div class="w3-col m12">';
								echo '<div class="image" style="text-align:center;">';   //style="width:260px;height:260px;border-style:solid;margin-top:5px;margin-left:20px;text-align:center;"
								echo '</div></div>';
							}
							?>
							</div></div> <!-- close container, then card -->
						</div>
					</div>

					<!-- Right Column -->
						<div class="w3-col m5">
						<div class="w3-row-padding">
							<!-- Alert Box -->
							 <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
							<span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
							<i class="fa fa-remove"></i>
							</span>
							<p>Please Note: Data, maps and profiles are provided as-is and are dynamically generated from specimen records. Inaccuracies and misidentifications can affect data quality. If you notice or suspect an error, please notify the maintainer at tyrrell@mpm.edu. Thank you!
							<div style="margin: 5px"><img src="https://img.shields.io/badge/Data Snapshot-5 Oct 2022-green.svg" /></div>
							</p>
							</div>
						</div>
						</div>

					<!-- Lower Block -->	
						<div class="w3-row-padding">
								<?php
								//echo $taxonManager->getDescriptionTabs();
								$taxaLimit = 1000;
								if($sppArr = $taxonManager->getSppArray($page, $taxaLimit, $pid, $clid)){
									$cnt = 1;
									$calendarlegend = array("F","M","A","M","J","J","A","S","O","N");
									$countrymapdata = array();
									foreach($sppArr as $sciNameKey => $subArr){
										?>
										<div class="w3-col m3">
										<div class="w3-card w3-round w3-white w3-container">
										<div class="w3-threequarter w3-center">
											<?php
											echo "<p><a href='index.php?tid=".$subArr["tid"]."&taxauthid=".$taxAuthId."&clid=".$clid."'>";
											echo "<i>".$sciNameKey."</i></a></p>\n";
											echo emitAmericasSVG($subArr["tid"]);
											$countries = $taxonManager->getCountries($subArr["tid"]);
											$countries = str_replace(' ', '-', $countries);
											$countries = preg_filter('/^/', $subArr["tid"], $countries);
											$countrymapdata = array_merge($countrymapdata, $countries);
											//echo '<h5>Precipitation Profile</h5>';
											//$wcdata = $taxonManager->getWC($subArr["tid"]);
											//echo linearGraph($wcdata['prec-avg'], $wcdata['prec-min'], $wcdata['prec-max'], $calendarlegend, "prec", TRUE, 150, 30);
											//echo '<h5>Temperature Profile</h5>';
											//echo linearGraph($wcdata['tavg-avg'], $wcdata['tavg-min'], $wcdata['tavg-max'], $calendarlegend, "temp", TRUE, 150, 30);
										echo '</div>';
										echo '<div class="w3-quarter w3-center" ><br>';
										echo linearGraph(null, array(0,0,0,0,0,0,0,0,0), $taxonManager->getElevations($subArr["tid"]), array("3500","","2500","","1500","","500"), "elev", FALSE, 100, 30);
										echo '</div>';
										echo "</div><br></div>";
										$cnt++;
										//if($cnt > $taxaLimit) break;
									}
								}
								?>
								<script type="text/javascript">
									var countries = <?php echo json_encode($countrymapdata); ?>;
									countries.forEach(colorMap);
								</script>
						</div>
		<?php
				}
			} else {
		?>
				<div id="innerDiv">
					<?php
					if($isEditor){
						?>
						<div id="editorDiv">
							<?php
							echo '<a href="profile/tpeditor.php?tid='.$taxonManager->getTid().'" title="'.(isset($LANG['EDIT_TAXON_DATA'])?$LANG['EDIT_TAXON_DATA']:'Edit Taxon Data').'">';
							echo '<img class="navIcon" src="../images/edit.png" />';
							echo '</a>';
							?>
						</div>
						<?php
					}
					?>
					<div id="scinameDiv"><span id="taxon"><?php echo $taxonManager->getTaxonName(); ?></span></div>
					<div>
						<div id="leftPanel">
							<fieldset style="clear:both">
								<legend><?php echo (isset($LANG['ACCEPTED_TAXA'])?$LANG['ACCEPTED_TAXA']:'Accepted Taxa'); ?></legend>
								<div>
									<?php
									$acceptedArr = $taxonManager->getAcceptedArr();
									foreach($acceptedArr as $accTid => $accArr){
										echo '<div><a href="index.php?tid='.$accTid.'"><b>'.$accArr['sciname'].'</b></a></div>';
									}
									?>
								</div>
							</fieldset>
						</div>
						<div id="rightPanel"><?php echo $taxonManager->getDescriptionTabs(); ?></div>
					</div>
				</div>
				<?php
			}
		}
		else{
			?>
			<div style="margin-top:45px;margin-left:20px">
				<h1><?php echo '<i>'.htmlspecialchars($taxonValue, ENT_QUOTES, 'UTF-8').'</i> '.(isset($LANG['NOT_FOUND'])?$LANG['NOT_FOUND']:'not found'); ?></h1>
				<?php
				if($matchArr = $taxonManager->getCloseTaxaMatches($taxonValue)){
					?>
					<div style="margin-left: 15px;font-weight:bold;font-size:120%;">
						<?php echo (isset($LANG['DID_YOU_MEAN'])?$LANG['DID_YOU_MEAN']:'Did you mean?');?>
						<div style=margin-left:25px;>
							<?php
							foreach($matchArr as $t => $n){
								echo '<a href="index.php?tid='.$t.'">'.$n.'</a><br/>';
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}
		?>
	</div>
	</div>
	</div>
	<?php
	include($SERVER_ROOT.'/includes/footer.php');
	?>
</body>
</html>

<?php
include_once('../config/symbini.php');
include_once($SERVER_ROOT.'/content/lang/taxa/index.'.$LANG_TAG.'.php');
include_once($SERVER_ROOT.'/classes/TaxonProfile.php');
include_once($SERVER_ROOT.'/taxa/graphics.php');
Header('Content-Type: text/html; charset='.$CHARSET);


$taxonValue = array_key_exists('taxon',$_REQUEST)?$_REQUEST['taxon']:'';
$tid = array_key_exists('tid',$_REQUEST)?$_REQUEST['tid']:'';
$taxAuthId = array_key_exists('taxauthid',$_REQUEST)?$_REQUEST['taxauthid']:1;
$clid = array_key_exists('clid',$_REQUEST)?$_REQUEST['clid']:0;
$pid = array_key_exists('pid',$_REQUEST)?$_REQUEST['pid']:'';
$lang = array_key_exists('lang',$_REQUEST)?$_REQUEST['lang']:$DEFAULT_LANG;
$taxaLimit = array_key_exists('taxalimit',$_REQUEST)?$_REQUEST['taxalimit']:50;
$page = array_key_exists('page',$_REQUEST)?$_REQUEST['page']:0;

//Sanitation
$taxonValue = strip_tags($taxonValue);
$taxonValue = preg_replace('/[^a-zA-Z0-9\-\s.†×]/', '', $taxonValue);
$taxonValue = htmlspecialchars($taxonValue, ENT_QUOTES, 'UTF-8');
if(!is_numeric($tid)) $tid = 0;
if(!is_numeric($taxAuthId)) $taxAuthId = 1;
if(!is_numeric($clid)) $clid = 0;
if(!is_numeric($pid)) $pid = '';
$lang = filter_var($lang,FILTER_SANITIZE_STRING);
if(!is_numeric($taxaLimit)) $taxaLimit = 50;
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
	<title><?php echo $taxonManager->getTaxonName() . " - " . $DEFAULT_TITLE; ?></title>
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
	?>

	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery-ui.js" type="text/javascript"></script>
	<script src="../js/symb/taxa.index.js?ver=202101" type="text/javascript"></script>
	<script src="../js/symb/taxa.editor.js?ver=202101" type="text/javascript"></script>
	<style type="text/css">
		.resource-title{ font-weight: bold; }
	</style>
</head>
<body class="w3-theme-l5">
	<?php include($SERVER_ROOT.'/includes/header.php'); ?>
	<!-- Start Page Grid -->
	<div class="w3-row">
    	<!-- Left Column -->
    	<div class="w3-col m5">
	    <div class="w3-row-padding">

		<?php
		if($taxonManager->getTaxonName()){
			if(count($taxonManager->getAcceptedArr()) == 1){
				$taxonRank = $taxonManager->getRankId();
				if($taxonRank > 180){  // i.e., above genus
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
						<?php
						if($taxonManager->isForwarded()){
							echo '<span class="w3-tiny w3-opacity w3-right"> ['.(isset($LANG['REDIRECT'])?$LANG['REDIRECT']:'redirected from').': <i>'.$taxonManager->getSubmittedValue('sciname').'</i> '.$taxonManager->getSubmittedValue('author').']</span><br>';
						}
						?>
						<span id="<?php echo ($taxonManager->getRankId() > 179?'sciname':'taxon'); ?>">
						<?php echo$taxonManager->getTaxonName(); ?>
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
						echo '<div id="synonymDiv" title="'.(isset($LANG['SYNONYMS'])?$LANG['SYNONYMS']:'Synonyms').'">';
						echo $synStr;
						echo '</div>';
					}

							//Map
							echo '<div class="container w3-center">';
							echo file_get_contents("americas.svg");
							$countries = $taxonManager->getCountries();
							?>
							<script type="text/javascript">
								function colorMap(countryCode) {
									var svgpath = document.getElementById(countryCode);
									svgpath.setAttribute("style", "fill:#537828");
								}
								var countries = <?php echo json_encode($countries); ?>;
								countries.forEach(colorMap);
							</script>
							<?php 
								echo '<span class="w3-small">Reportedly collected from: ' . implode(', ', $countries) . '</span>';
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
						<div class="w3-col m7">
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

						<div class="w3-card w3-round w3-white">
	        			<div class="w3-container">

							<div class="w3-third w3-center">
								<h4>Elevation Profile</h4>
							<?php 
							echo linearGraph(null, $taxonManager->getElevations(), "elev");
							?>
							</div>
							<div class="w3-twothirds">
								&nbsp;
								<script type="text/javascript">
									<?php include_once($SERVER_ROOT.'/taxa/prec.js'); ?>
									console.log(prec.get(344).keys());
								</script>
							</div>
							<div class="w3-col m12">
							<p class="w3-tiny">Specimens Referenced: 
							<?php echo $taxonManager->getGatherings(); ?>
							</p> 
							</div>
						</div>
						</div>
						<br>

							<?php
							echo $taxonManager->getDescriptionTabs();
							?>
							<div id="img-div" style="height:300px;overflow:hidden;">
								<?php
								$taxonManager->echoImages(1);
								?>
							</div>
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
				} else {  //Ends the species check if
					?>
					<table id="innertable">
					<tr>
						<td colspan="2" style="vertical-align:top;">
							<?php
							if($isEditor){
								?>
								<div id="editorDiv">
									<a href="profile/tpeditor.php?tid=<?php echo $taxonManager->getTid(); ?>" title="<?php echo (isset($LANG['EDIT_TAXON_DATA'])?$LANG['EDIT_TAXON_DATA']:'Edit Taxon Data'); ?>">
										<img class="navIcon" src='../images/edit.png'/>
									</a>
								</div>
								<?php
							}
							?>
							<div id="scinameDiv">
								<?php
								$displayName = $taxonManager->getTaxonName();
								if($taxonRank > 140){
									$parentLink = "index.php?tid=".$taxonManager->getParentTid()."&clid=".$clid."&pid=".$pid."&taxauthid=".$taxAuthId;
									$displayName .= ' <a href="'.$parentLink.'">';
									$displayName .= '<img class="navIcon" src="../images/toparent.png" title="'.(isset($LANG['GO_TO_PARENT'])?$LANG['GO_TO_PARENT']:'Go to Parent Taxon').'" />';
									$displayName .= '</a>';
								}
								echo '<div id="taxon">'.$displayName.'</div>';
								?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="300" valign="top">
							<?php
							if($taxonRank > 140) echo '<div id="family"><b>Family:</b> '.$taxonManager->getTaxonFamily().'</div>';
							if(!$taxonManager->echoImages(0,1,0)){
								echo "<div class='image' style='width:260px;height:260px;border-style:solid;margin-top:5px;margin-left:20px;text-align:center;'>";
								if($isEditor){
									echo '<a href="profile/tpeditor.php?category=imageadd&tid='.$taxonManager->getTid().'"><b>'.(isset($LANG['ADD_IMAGE'])?$LANG['ADD_IMAGE']:'Add an Image').'</b></a>';
								}
								else{
									echo (isset($LANG['IMAGE_NOT_AVAILABLE'])?$LANG['IMAGE_NOT_AVAILABLE']:'Images<br/>not available');
								}
								echo '</div>';
							}
							?>
						</td>
						<td class="desc">
							<?php
							echo $taxonManager->getDescriptionTabs();
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php
							if($sppArr = $taxonManager->getSppArray($page, $taxaLimit, $pid, $clid)){
								?>
								<fieldset style="padding:10px 2px 10px 2px;">
									<?php
									$legendStr = '';
									if($clid){
										if($checklistName = $taxonManager->getClName($clid)){
											$legendStr .= (isset($LANG['SPECIES_CHECKLIST'])?$LANG['SPECIES_CHECKLIST']:'Species within checklist').': <b>'.$checklistName.'</b>';
										}
										if($parentChecklistArr = $taxonManager->getParentChecklist($clid)){
											$titleStr = (isset($LANG['GO_TO_PARENT_CHECKLIST'])?$LANG['GO_TO_PARENT_CHECKLIST']:'Include species within checklist').': '.current($parentChecklistArr);
											$legendStr .= ' <a href="index.php?tid='.$tid.'&clid='.key($parentChecklistArr).'&pid='.$pid.'&taxauthid='.$taxAuthId.'" title="'.$titleStr.'">';
											$legendStr .= '<img style="border:0px;width:10px;" src="../images/toparent.png"/>';
											$legendStr .= '</a>';
										}
										elseif($pid){
											$projName = $taxonManager->getProjName($pid);
											if($projName) $titleStr = (isset($LANG['WITHIN_INVENTORY'])?$LANG['WITHIN_INVENTORY']:'Species within inventory project').': '.$projName;
											else $titleStr = (isset($LANG['SHOW_ALL_TAXA'])?$LANG['SHOW_ALL_TAXA']:'Show all taxa');
											$legendStr .= ' <a href="index.php?tid='.$tid.'&clid=0&pid='.$pid.'&taxauthid='.$taxAuthId.'" title="'.$titleStr.'">';
											$legendStr .= '<img style="border:0px;width:10px;" src="../images/toparent.png"/>';
											$legendStr .= '</a>';
										}
									}
									elseif($pid){
										$projName = $taxonManager->getProjName($pid);
										if($projName) $legendStr .= (isset($LANG['WITHIN_INVENTORY'])?$LANG['WITHIN_INVENTORY']:'Species within inventory project').': <b>'.$projName.'</b>';
										else $legendStr = (isset($LANG['SHOW_ALL_TAXA'])?$LANG['SHOW_ALL_TAXA']:'Show all taxa');
										$titleStr = (isset($LANG['SHOW_ALL_TAXA'])?$LANG['SHOW_ALL_TAXA']:'Show all taxa');
										$legendStr .= ' <a href="index.php?tid='.$tid.'&clid=0&pid=0&taxauthid='.$taxAuthId.'" title="'.$titleStr.'">';
										$legendStr .= '<img style="border:0px;width:10px;" src="../images/toparent.png"/>';
										$legendStr .= '</a>';
									}
									if($legendStr){
										$legendStr = '<span style="margin:0px 10px">'.$legendStr.'</span>';
									}

									$taxonCnt = count($sppArr);
									if($taxonCnt > $taxaLimit || $page){
										$navStr = '<span style="margin:0px 10px">';
										$dynLink = 'tid='.$tid.'&taxauthid='.$taxAuthId.'&clid='.$clid.'&pid='.$pid.'&lang='.$lang.'&taxalimit='.$taxaLimit;
										if($page) $navStr .= '<a href="index.php?'.$dynLink.'&page='.($page-1).'">&lt;&lt;</a>';
										else $navStr .= '&lt;&lt;';
										$upperCnt = ($page+1)*$taxaLimit;
										if($taxonCnt < $taxaLimit) $upperCnt = ($page*$taxaLimit)+$taxonCnt;
										$navStr .= ' '.(($page*$taxaLimit)+1).' - '.$upperCnt.' taxa ';
										if($taxonCnt > $taxaLimit) $navStr .= '<a href="index.php?'.$dynLink.'&page='.($page+1).'">&gt;&gt;</a>';
										else $navStr .= '&gt;&gt;';
										$navStr .= '</span>';
										if($legendStr) $legendStr .= ' || ';
										$legendStr .= ' '.$navStr.' ';
									}

									if($legendStr) echo '<legend>'.$legendStr.'</legend>';
									?>
									<div>
									<?php
										$cnt = 1;
										foreach($sppArr as $sciNameKey => $subArr){
											echo "<div class='spptaxon'>";
											echo "<div style='margin-top:10px;'>";
											echo "<a href='index.php?tid=".$subArr["tid"]."&taxauthid=".$taxAuthId."&clid=".$clid."'>";
											echo "<i>".$sciNameKey."</i>";
											echo "</a></div>\n";
											echo "<div class='sppimg' style='overflow:hidden;'>";

											if(array_key_exists("url",$subArr)){
												$imgUrl = $subArr["url"];
												if(array_key_exists("imageDomain",$GLOBALS) && substr($imgUrl,0,1)=="/"){
													$imgUrl = $GLOBALS["imageDomain"].$imgUrl;
												}
												echo "<a href='index.php?tid=".$subArr["tid"]."&taxauthid=".$taxAuthId."&clid=".$clid."'>";

												if($subArr["thumbnailurl"]){
													$imgUrl = $subArr["thumbnailurl"];
													if(array_key_exists("imageDomain",$GLOBALS) && substr($subArr["thumbnailurl"],0,1)=="/"){
														$imgUrl = $GLOBALS["imageDomain"].$subArr["thumbnailurl"];
													}
												}
												elseif($image = exif_thumbnail($imgUrl)){
													$imgUrl = 'data:image/jpeg;base64,'.base64_encode($image);
												}
												echo '<img src="'.$imgUrl.'" title="'.$subArr['caption'].'" alt="Image of '.$sciNameKey.'" style="z-index:-1" />';
												echo '</a>';
												echo '<div style="text-align:right;position:relative;top:-26px;left:5px;" title="'.(isset($LANG['PHOTOGRAPHER'])?$LANG['PHOTOGRAPHER']:'Photographer').': '.$subArr['photographer'].'">';
												echo '</div>';
											}
											elseif($isEditor){
												echo '<div class="spptext"><a href="profile/tpeditor.php?category=imageadd&tid='.$subArr['tid'].'">'.(isset($LANG['ADD_IMAGE'])?$LANG['ADD_IMAGE']:'Add an Image').'!</a></div>';
											}
											else{
												echo '<div class="spptext">'.(isset($LANG['IMAGE_NOT_AVAILABLE'])?$LANG['IMAGE_NOT_AVAILABLE']:'Images<br/>not available').'</div>';
											}
											echo "</div>\n";
											if(isset($MAP_THUMBNAILS) && $MAP_THUMBNAILS){
												//Display thumbnail map
												if($taxonManager->getRankId() > 140){
													echo '<div class="sppmap">';
													if(array_key_exists("map",$subArr) && $subArr["map"]){
														echo '<img src="'.$subArr['map'].'" title="'.$taxonManager->getTaxonName().'" alt="'.$taxonManager->getTaxonName().'" />';
													}
													else{
														echo '<div class="spptext">'.(isset($LANG['MAP_NOT_AVAILABLE'])?$LANG['MAP_NOT_AVAILABLE']:'Map not<br />Available').'</div>';
													}
													echo '</div>';
												}
											}
											echo "</div>";
											$cnt++;
											if($cnt > $taxaLimit) break;
										}
										?>
									</div>
								</fieldset>
								<?php
							}
						?>
						</td>
					</tr>
					</table>
					<?php
				}
			}
			else{
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

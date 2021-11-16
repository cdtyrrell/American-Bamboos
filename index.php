<?php
include_once('config/symbini.php');
include_once('content/lang/index.'.$LANG_TAG.'.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Home</title>
	<?php
	$activateJQuery = false;
	include_once($SERVER_ROOT.'/includes/head.php');
	include_once($SERVER_ROOT.'/includes/googleanalytics.php');
	?>
<!--
	<link href="css/quicksearch.css" type="text/css" rel="Stylesheet" />
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/symb/api.taxonomy.taxasuggest.js" type="text/javascript"></script>
	<style>
		#slideshowcontainer{
			border: 2px solid black;
			border-radius:10px;
			padding:10px;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
-->
</head>
<body class="w3-theme-l5">
	<?php
	include($SERVER_ROOT.'/includes/header.php');
	?>

	<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
	  <!-- The Grid -->
	  <div class="w3-row">
	    <!-- Left Column -->
	    <div class="w3-col m3">
	      <!-- Profile -->
	      <div class="w3-card w3-round w3-white">
	        <div class="w3-container">
	          <h4 class="w3-center">American Bamboos</h4>
	          <p class="w3-center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Bamboo_DSCN2465.jpg/450px-Bamboo_DSCN2465.jpg" class="w3-rounded-rect" style="height:106px;width:106px" alt="image credit: Michele~commonswiki"></p>
	          <hr>
	          <p>Dedicated to documenting and presenting information on the diversity and distribution of bamboo species native to the western hemisphere.</p>
	         </div>
	       </div>
	       <br>

	       <!-- Accordion -->
	       <div class="w3-card w3-round">
	         <div class="w3-white">
	           <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align">Systematics</button>
	           <div id="Demo1" class="w3-hide w3-container">
	             <p>Some text..</p>
	           </div>
	           <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align">Characteristics</button>
	           <div id="Demo2" class="w3-hide w3-container">
	             <p>Some other text..</p>
	           </div>
	           <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align">Publications</button>
	           <div id="Demo3" class="w3-hide w3-container">
	          <div class="w3-row-padding">
	          <br>
	            <div class="w3-half">
	              <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
	            </div>
	            <div class="w3-half">
	              <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
	            </div>
	            <div class="w3-half">
	              <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
	            </div>
	            <div class="w3-half">
	              <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
	            </div>
	            <div class="w3-half">
	              <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
	            </div>
	            <div class="w3-half">
	              <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
	            </div>
	          </div>
	           </div>
	         </div>
	       </div>
	       <br>

	       <!-- Interests -->
	       <div class="w3-card w3-round w3-white w3-hide-small">
	         <div class="w3-container">
	           <p>Diversity</p>
	           <p>
	             <span class="w3-tag w3-small w3-theme-d5">Arthrostylidiinae</span>
	             <span class="w3-tag w3-small w3-theme-d4">Chusqueinae</span>
	             <span class="w3-tag w3-small w3-theme-d3">Guaduiinae</span>
	             <span class="w3-tag w3-small w3-theme-d2">Chusquea</span>
	             <span class="w3-tag w3-small w3-theme-d1">Merostachys</span>
	             <span class="w3-tag w3-small w3-theme">Aulonemia</span>
	             <span class="w3-tag w3-small w3-theme-l1">Arthrostylidium</span>
	             <span class="w3-tag w3-small w3-theme-l2">Guadua</span>
	             <span class="w3-tag w3-small w3-theme-l3">Rhipidocladum</span>
	             <span class="w3-tag w3-small w3-theme-l4">Colanthelia</span>
	             <span class="w3-tag w3-small w3-theme-l5">Myriocladus</span>
	           </p>
	         </div>
	       </div>
	       <br>

	       <!-- Alert Box -->
	       <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
	         <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
	           <i class="fa fa-remove"></i>
	         </span>
	         <p><strong>Hey!</strong></p>
	         <p>This box can be closed.</p>
	       </div>

	     <!-- End Left Column -->
	     </div>

	     <!-- Right Column -->
	     <div class="w3-col m9">
	       <div class="w3-row-padding">
	         <div class="w3-col m12">
	           <div class="w3-card w3-round w3-white">
	             <div class="w3-container w3-padding">

	               <span class="w3-right w3-opacity">Poaceae: Bambusoideae</span>
	               <h4>What is a bamboo?</h4><br>
	               <hr class="w3-clear">
	               <p>The bamboos (Poaceae: Bambusoideae) are grasses that evolved in and adapted to forest habitats (though some species can now be found in more open environments). There are over 1,500 species of bamboo worldwide, around a third of which are native to the western hemisphere including one genus with three species (<i>Arundinaria</i>; "cane") that is native to what is now the southeastern continental United States.</p>
	                 <div class="w3-row-padding" style="margin:0 -16px">
	                   <div class="w3-half">
	                     <img src="images/uploads/Chusquea_pohlii-cropped.jpg" style="width:100%" alt="Branch of Chusquea species" class="w3-margin-bottom">
	                   </div>
	                   <div class="w3-half">
	                     <img src="images/uploads/Rhipidocladum_clarkiae-BraulioCarrillo.JPG" style="width:100%" alt="Tall bamboo" class="w3-margin-bottom">
	                 </div>
	               </div>
	               <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">More Info</button>

	             </div>
	           </div>
	         </div>
	       </div>

	       <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
					 <div id="quicksearchdiv">
 						<form name="quicksearch" id="quicksearch" action="<?php echo $CLIENT_ROOT; ?>/taxa/index.php" method="get" onsubmit="return verifyQuickSearch(this);">
 							<div id="quicksearchtext" >
 							<?php echo (isset($LANG['QSEARCH_SEARCH'])?$LANG['QSEARCH_SEARCH']:'Taxon Search'); ?>
 						</div>
 							<input id="taxa" type="text" name="taxon" />
 							<button name="formsubmit"  id="quicksearchbutton" type="submit" value="Search Terms">
 							<?php echo (isset($LANG['QSEARCH_SEARCH_BUTTON'])?$LANG['QSEARCH_SEARCH_BUTTON']:'Search'); ?>
 						</button>
 						</form>
 					</div>
	       </div>

	     <!-- End Right Column -->
	     </div>

	   <!-- End Grid -->
	   </div>

	 <!-- End Page Container -->
	 </div>
	 <br>

	<?php
	include($SERVER_ROOT.'/includes/footer.php');
	?>
</body>
</html>

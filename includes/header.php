<?php
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/header.'.$LANG_TAG.'.php')) include_once($SERVER_ROOT.'/content/lang/header.en.php');
else include_once($SERVER_ROOT.'/content/lang/header.'.$LANG_TAG.'.php');
?>
<script>
	//if(top.frames.length!=0) top.location=self.document.location;
</script>
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <!-- Home -->
  <a href="<?php echo $clientRoot; ?>/index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4" title="Home"><?php echo $LANG['H_HOME']; ?></a>
  <!-- icon: <i class="fa fa-home w3-margin-right"></i> -->
  <!-- Species -->
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Search"><?php echo $LANG['H_SPECIES']; ?></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:150px">
      <a href="<?php echo $clientRoot; ?>/taxa/taxonomy/taxonomydisplay.php?target=Bambusoideae" class="w3-bar-item w3-button"><?php echo $LANG['H_BROWSE']; ?></a>
      <!-- <a href="<?php echo $clientRoot; ?>/checklists/dynamicmap.php" class="w3-bar-item w3-button">Map Search</a> -->
      <!-- <a href="<?php echo $clientRoot; ?>/imagelib/search.php" class="w3-bar-item w3-button">Images</a> -->
    </div>
  </div>
  <!-- Specimens -->
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Search"><?php echo $LANG['H_COLLECTIONS']; ?></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:150px">
      <a href="<?php echo $clientRoot; ?>/collections/harvestparams.php" class="w3-bar-item w3-button"><?php echo $LANG['H_SEARCH']; ?></a>
      <!-- <a href="<?php echo $clientRoot; ?>/collections/map/mapinterface.php" class="w3-bar-item w3-button">Map Search</a> -->
      <!-- <a href="<?php echo $clientRoot; ?>/imagelib/search.php" class="w3-bar-item w3-button">Images</a> -->
    </div>
  </div>
  <!-- Keys -->
  <!-- <a href="<?php #echo $clientRoot; ?>/ident/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Keys">Keys</a> -->
  
  <!-- About -->
  <a href="<?php #echo $clientRoot; ?>/projects/about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Keys"><?php echo $LANG['H_ABOUT']; ?></a>


<!--			<div id="top_navbar">
				<div id="right_navbarlinks"> -->
					<?php
					if($USER_DISPLAY_NAME){
						?>
						<div class="w3-dropdown-hover w3-hide-small w3-right">
<!--             <span style="">
							Welcome <?php echo $USER_DISPLAY_NAME; ?>!
						</span> -->
					    <button class="w3-button w3-padding-large" title="My Account"><?php echo $LANG['H_MY_ACCOUNT']; ?></button>
					    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:100px">
					      <a href="<?php echo $clientRoot; ?>/profile/viewprofile.php" class="w3-bar-item w3-button"><?php echo $LANG['H_PROFILE']; ?></a>
					      <a href="<?php echo $clientRoot; ?>/profile/index.php?submit=logout" class="w3-bar-item w3-button"><?php echo $LANG['H_LOGOUT']; ?></a>
					      <a href='<?php echo $clientRoot; ?>/sitemap.php' class="w3-bar-item w3-button"><?php echo $LANG['H_SITEMAP']; ?></a>
					    </div>
					  </div>
<?php
					}
					else{
						?>
						<div class="w3-dropdown-hover w3-hide-small w3-right">
					    <button class="w3-button w3-padding-large" title="Account"><?php echo $LANG['H_WELCOME']; ?></button>
					    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:100px">
					      <a href="<?php echo $clientRoot."/profile/index.php?refurl=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>" class="w3-bar-item w3-button" title="Log In"><?php echo $LANG['H_LOGIN']; ?></a>
					      <a href="<?php echo $clientRoot; ?>/profile/newprofile.php" class="w3-bar-item w3-button"><?php echo $LANG['H_NEW_ACCOUNT']; ?></a>
					    </div>
					  </div>

						<?php
					}
						?>
					</div>
				 </div>


<!-- ======================================== SMALL SCREENS ======================================== -->

         <!-- Navbar on small screens -->
         <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
           <a href="<?php echo $clientRoot; ?>/index.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_HOME']; ?></a>
           <a href="<?php echo $clientRoot; ?>/taxa/taxonomy/taxonomydisplay.php?target=Bambusoideae" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_SPECIES']; ?></a>
           <!-- <a href="<?php echo $clientRoot; ?>/checklists/dynamicmap.php?interface=key" class="w3-bar-item w3-button w3-padding-large">Species Map Search</a> -->
           <a href="<?php echo $clientRoot; ?>/collections/index.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_COLLECTIONS']; ?></a>
           <!-- <a href="<?php echo $clientRoot; ?>/collections/map/mapinterface.php" class="w3-bar-item w3-button w3-padding-large">Specimen Map Search</a>
           <a href="#" class="w3-bar-item w3-button w3-padding-large">Keys</a>
           <a href="<?php echo $clientRoot; ?>/imagelib/search.php" class="w3-bar-item w3-button w3-padding-large">Image Search</a> -->
           <a href="<?php #echo $clientRoot; ?>/projects/about.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_ABOUT']; ?></a>
           

           <?php
           if($USER_DISPLAY_NAME){
           ?>
             <a href="<?php echo $clientRoot; ?>/sitemap.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_SITEMAP']; ?></a>
             <a href="<?php echo $clientRoot; ?>/profile/viewprofile.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_MY_PROFILE']; ?></a>
             <a href="<?php echo $clientRoot; ?>/profile/index.php?submit=logout" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_LOGOUT']; ?></a>
           <?php
           }
           else{
           ?>
           <a href="<?php echo $clientRoot."/profile/index.php?refurl=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_LOGIN']; ?></a>
           <a href="<?php echo $clientRoot; ?>/profile/newprofile.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $LANG['H_NEW_ACCOUNT']; ?></a>
           <?php
           }
           ?>

         </div>
  
<div class="w3-container w3-content w3-page-content">
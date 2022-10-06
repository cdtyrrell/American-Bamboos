<script>
	//if(top.frames.length!=0) top.location=self.document.location;
</script>

<table id="maintable" cellspacing="0">
	<tr>
		<td id="header" colspan="3">
			<div style="clear:both; width:100%; height:170px; border-bottom:1px solid #000000;">
				<div style="float:left">
					<img src="<?php echo $CLIENT_ROOT; ?>/images/layout/left_logo.jpg" style="margin:0px 30px;width:130px" />
				</div>
				<div style="margin-left: 40px; color: #fff; font-family: 'Mate', serif; letter-spacing: 1px; text-shadow: 0 0 7px rgba(0,0,0,0.5);">
					<div style="margin-top:30px; font-size:60px; line-height:48px;">
						<h1><?php echo ($DEFAULT_TITLE) ? $DEFAULT_TITLE : "First Level Title"; ?></h1>
					</div>
					<div style="margin-top:20px; font-size:35px; font-style: italic">
						Second Level Title
					</div>
				</div>
			</div>

			<div id="top_navbar">
				<div id="right_navbarlinks">
					<?php
					if($USER_DISPLAY_NAME){
						?>
						<span style="">
							Welcome <?php echo $USER_DISPLAY_NAME; ?>!
						</span>
						<div class="w3-dropdown-hover w3-hide-small w3-right">
					    <button class="w3-button w3-padding-large" title="My Account">My Account</button>
					    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:100px">
					      <a href="<?php echo $clientRoot; ?>/profile/viewprofile.php" class="w3-bar-item w3-button">Profile</a>
					      <a href="<?php echo $clientRoot; ?>/profile/index.php?submit=logout" class="w3-bar-item w3-button">Logout</a>
					      <a href='<?php echo $clientRoot; ?>/sitemap.php' class="w3-bar-item w3-button">Site Menu</a>
					    </div>
					  </div>
<?php
					}
					else{
						?>
						<div class="w3-dropdown-hover w3-hide-small w3-right">
					    <button class="w3-button w3-padding-large" title="Account">Accounts</button>
					    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:100px">

					      <a href="<?php echo $clientRoot."/profile/index.php?refurl=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>" class="w3-bar-item w3-button" title="Log In">Log In</a>
					      <a href="<?php echo $clientRoot; ?>/profile/newprofile.php" class="w3-bar-item w3-button">Sign Up</a>
					    </div>
					  </div>

						<?php
					}
						?>
					</div>
				 </div>

         <!-- Navbar on small screens -->
         <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
           <a href="<?php echo $clientRoot; ?>/index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
           <a href="#" class="w3-bar-item w3-button w3-padding-large">Browse Species</a>
           <!-- <a href="<?php echo $clientRoot; ?>/checklists/dynamicmap.php?interface=key" class="w3-bar-item w3-button w3-padding-large">Species Map Search</a> -->
           <a href="<?php echo $clientRoot; ?>/collections/index.php" class="w3-bar-item w3-button w3-padding-large">Search Specimens</a>
           <!-- <a href="<?php echo $clientRoot; ?>/collections/map/mapinterface.php" class="w3-bar-item w3-button w3-padding-large">Specimen Map Search</a>
           <a href="#" class="w3-bar-item w3-button w3-padding-large">Keys</a>
           <a href="<?php echo $clientRoot; ?>/imagelib/search.php" class="w3-bar-item w3-button w3-padding-large">Image Search</a> -->

           <?php
           if($userDisplayName){
           ?>
             <a href="<?php echo $clientRoot; ?>/sitemap.php" class="w3-bar-item w3-button w3-padding-large">Site Menu</a>
             <a href="<?php echo $clientRoot; ?>/profile/viewprofile.php" class="w3-bar-item w3-button w3-padding-large">Profile</a>
             <a href="<?php echo $clientRoot; ?>/profile/index.php?submit=logout" class="w3-bar-item w3-button w3-padding-large">Logout</a>
           <?php
           }
           else{
           ?>
           <a href="<?php echo $clientRoot."/profile/index.php?refurl=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>" class="w3-bar-item w3-button w3-padding-large">Log In</a>
           <a href="<?php echo $clientRoot; ?>/profile/newprofile.php" class="w3-bar-item w3-button w3-padding-large">Sign Up</a>
           <?php
           }
           ?>

         </div>


				</div>
				<ul id="hor_dropdown">
					<li>
						<a href="<?php echo $CLIENT_ROOT; ?>/index.php" >Home</a>
					</li>
					<li>
						<a href="#" >Search</a>
						<ul>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/collections/index.php" >Search Collections</a>
							</li>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/collections/map/index.php" target="_blank">Map Search</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" >Images</a>
						<ul>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/imagelib/index.php" >Image Browser</a>
							</li>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/imagelib/search.php" >Search Images</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo $CLIENT_ROOT; ?>/projects/index.php" >Inventories</a>
						<ul>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/projects/index.php?pid=1" >Project 1</a>
							</li>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/projects/index.php?pid=2" >Project 2</a>
							</li>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/projects/index.php?pid=3" >Project 3</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" >Interactive Tools</a>
						<ul>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist" >Dynamic Checklist</a>
							</li>
							<li>
								<a href="<?php echo $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=key" >Dynamic Key</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</td>
	</tr>
	<tr>
		<td id='middlecenter'  colspan="3">


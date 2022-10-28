</div>  <!-- this closes the "w3-page-container div that is created in header.php-->
<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16 w3-center">
	<p>
	<a onClick="setLanguage({value:'en'})" href="<?php $_SERVER ?>?lang=en">English</a> &middot; 
	<a onClick="setLanguage({value:'es'})" href="<?php $_SERVER ?>?lang=es">Español</a> &middot; 
	<a onClick="setLanguage({value:'pt'})" href="<?php $_SERVER ?>?lang=pt">Português</a><br>
	<span class="w3-tiny"><?php echo $LANG['FOOTER']; ?></span>
	</p>
</footer>

<footer class="w3-container w3-theme-d5 w3-center">
	<p class="w3-small">
		<b>Recommended citation:</b> Tyrrell, Christopher D. 2022. Native Bamboos of Abiayala/the Americas. Retrieved <?php echo date("j M Y") ?> from https://www.americanbamboos.org.
	</p>
</footer>
		<script>
		// Accordion
		function myFunction(id) {
		  var x = document.getElementById(id);
		  if (x.className.indexOf("w3-show") == -1) {
		    x.className += " w3-show";
		    x.previousElementSibling.className += " w3-theme-d1";
		  } else {
		    x.className = x.className.replace("w3-show", "");
		    x.previousElementSibling.className =
		    x.previousElementSibling.className.replace(" w3-theme-d1", "");
		  }
		}

		// Used to toggle the menu on smaller screens when clicking on the menu button
		function openNav() {
		  var x = document.getElementById("navDemo");
		  if (x.className.indexOf("w3-show") == -1) {
		    x.className += " w3-show";
		  } else {
		    x.className = x.className.replace(" w3-show", "");
		  }
		}
		</script>

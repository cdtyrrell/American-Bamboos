<?php
include_once('../config/symbini.php');
include_once ($SERVER_ROOT.'/classes/UtilityFunctions.php');
header("Content-Type: text/html; charset=" . $CHARSET);
$serverHost = UtilityFunctions::getDomain();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $DEFAULT_TITLE; ?> Data Usage Guidelines</title>
	<?php

	include_once($SERVER_ROOT . '/includes/head.php');
	?>
</head>

<body>
	<?php
	$displayLeftMenu = true;
	include($SERVER_ROOT . '/includes/header.php');
	?>
	<div class="navpath">
		<a href="<?php echo htmlspecialchars($CLIENT_ROOT, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE); ?>/index.php">Home</a> &gt;&gt;
		<b>Data Usage Guidelines</b>
	</div>
	<!-- This is inner text! -->
	<div role="main" id="innertext">
		<h1 class="page-heading">Guidelines for Acceptable Use of Data</h1>
		<h2>Recommended Citation Formats</h2>
		<p>Use one of the following formats to cite data retrieved from the <?php echo $DEFAULT_TITLE; ?> network:</p>
		<h3>General Citation</h3>
		<blockquote>
			<?php
			if (file_exists($SERVER_ROOT . '/includes/citationportal.php')) {
				include($SERVER_ROOT . '/includes/citationportal.php');
			}
			else {
				echo 'Biodiversity occurrence data published by: ';
				if ($DEFAULT_TITLE) {
					echo $DEFAULT_TITLE;
				}
				else {
					echo 'Name of people or institutional reponsible for maintaining the portal';
				};
				echo ' (accessed through the ';
				if ($DEFAULT_TITLE) {
					echo $DEFAULT_TITLE;
				}
				else {
					echo 'Name of people or institutional reponsible for maintaining the portal';
				};
				echo ' Portal, ' . $serverHost . $CLIENT_ROOT . ', ' . date('Y-m-d') . ').';
			};
			?>
		</blockquote>

		<h3>Usage of occurrence data from specific institutions</h3>
		<p>Access each collection profile page to find the available citation formats.</p>
		<h4>Example</h4>
		<blockquote>
			<?php
			$collData['collectionname'] = 'Name of Institution or Collection';
			$collData['dwcaurl'] = $serverHost . $CLIENT_ROOT . '/portal/content/dwca/NIC_DwC-A.zip';
			if (file_exists($SERVER_ROOT . '/includes/citationcollection.php')) {
				include($SERVER_ROOT . '/includes/citationcollection.php');
			} else {
				echo 'Name of Institution or Collection. Occurrence dataset ' . 'http://gh.local/Symbiota/portal/content/dwca/' . 'accessed via the' . 'Fresh Symbiota Install' . 'Portal, ' . 'http://gh.local/Symbiota' . ', 2022-07-25.';
			}
			?>
		</blockquote>
<!--
		<h3>Glossary</h3>
		<p>Please cite this portal's glossary as:</p>
		<blockquote>
			<?php
				if ($DEFAULT_TITLE) {
					echo $DEFAULT_TITLE;
				}
				else {
					echo 'Name of people or institutional reponsible for maintaining the portal';
				};
				echo '. Glossary. ' . $serverHost . $CLIENT_ROOT . 'glossary/index.php. Accessed: ' . date('Y-m-d') . '.';
			?>
		</blockquote>
-->
		<h2>Occurrence Record Use Policy</h2>
		<div>
			<ul>
				<li>
					While <?php echo $DEFAULT_TITLE; ?> will make every effort possible to control and document the quality
					of the data it publishes, the data are made available "as is". Any report of errors in the data should be
					directed to the appropriate curators and/or collections managers.
				</li>
				<li>
					<?php echo $DEFAULT_TITLE; ?> cannot assume responsibility for damages resulting from misuse or
					misinterpretation of datasets or from errors or omissions that may exist in the data.
				</li>
				<li>
					It is considered a matter of professional ethics to cite and acknowledge the work of other scientists that
					has resulted in data used in subsequent research. We encourage users to
					contact the original investigator responsible for the data that they are accessing.
				</li>
				<li>
					<?php echo $DEFAULT_TITLE; ?> asks that users not redistribute data obtained from this site without permission from data owners.
					However, links or references to this site may be freely posted.
				</li>
				<li>
					Data herein were aggregated from the Global Biodiversity Information Facility using (as of Oct 2022) the following query:</br>
					https://www.gbif.org/occurrence/search?occurrence_status=present&taxon_key=4139279&taxon_key=4106473&taxon_key=9779519&taxon_key=4132081&taxon_key=4131604&taxon_key=2702480&taxon_key=2705960&taxon_key=4108465&taxon_key=4106325&taxon_key=4106111&taxon_key=11096269&taxon_key=10934677&taxon_key=7672148&taxon_key=2706422&taxon_key=4115977&taxon_key=4140976&taxon_key=4136043&taxon_key=8166993&taxon_key=4116198&taxon_key=4152730&taxon_key=4138612&taxon_key=4138475&taxon_key=4110457&taxon_key=4109977&taxon_key=4107447&taxon_key=4127579&taxon_key=2703322&taxon_key=4124876&taxon_key=3232907&taxon_key=4121915&taxon_key=3232888&taxon_key=4112442&taxon_key=2705466&taxon_key=4108439&taxon_key=4116760&taxon_key=7745475&taxon_key=4116625&taxon_key=4112283&taxon_key=4133146&taxon_key=3232713&taxon_key=4144664&taxon_key=4144186&taxon_key=4143934&taxon_key=4126203&taxon_key=4129014&taxon_key=11031493&taxon_key=10795800
				</li>
			</ul>
		</div>

		<h2>Images</h2>
		<p>Images within this website have been generously contributed by their owners to promote education and research. These contributors retain the full copyright for their images.
		Unless stated otherwise, images are made available under the Creative Commons Attribution-ShareAlike
		(<a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">CC BY-SA</a>).
		Users are allowed to copy, transmit, reuse, and/or adapt content, as long as attribution regarding the source of the content is made. If the content is altered, transformed,
		or enhanced, it may be re-distributed only under the same or similar license by which it was acquired.
		</p>

		<h2>Notes on Specimen Records and Images</h2>
		<p>Specimens are used for scientific research and because of skilled preparation and careful use they may last for hundreds of years. Some collections have specimens that were
		collected hundreds of years ago that are no longer occur within the area. By making these specimens available on the web as images, their availability and value improves without
		an increase in inadvertent damage caused by use. Note that if you are considering making specimens, remember collecting normally requires permission of the landowner and,
		in the case of rare and endangered plants, additional permits may be required. It is best to coordinate such efforts with a regional institution that manages a publicly
		accessible collection.
		</p>

		<p><b>Disclaimer:</b> This data portal may contain specimens and historical records that are culturally sensitive. The collections include specimens dating back over 200 years
		collected from all around the world. Some records may also include offensive language. These records do not reflect the portal community's current viewpoint but rather the
		social attitudes and circumstances of the time period when specimens were collected or cataloged.
		</p>
	</div>
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>

</html>
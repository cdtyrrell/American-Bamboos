<?php
include_once('config/symbini.php');
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/templates/index.'.$LANG_TAG.'.php')) include_once($SERVER_ROOT.'/content/lang/templates/index.en.php');
else include_once($SERVER_ROOT.'/content/lang/templates/index.'.$LANG_TAG.'.php');
header('Content-Type: text/html; charset=' . $CHARSET);
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG_TAG ?>">
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Home</title>
	<?php
	include_once($SERVER_ROOT . '/includes/head.php');
	include_once($SERVER_ROOT . '/includes/googleanalytics.php');
	?>
</head>
<body>
	<?php
	include($SERVER_ROOT . '/includes/header.php');
	?>
	<div class="navpath"></div>
	<main id="innertext">
		<h1 class="page-heading"><?php echo $DEFAULT_TITLE; ?>: Native Bamboos of the Americas</h1>
		<?php
		if($LANG_TAG == 'es'){
			?>
			<div>
				<h1 class="headline">Bienvenidos</h1>
				<p>Dedicado a documentar y presentar información sobre la diversidad y distribución de especies de bambú nativas de América del Norte y del Sur.</p>
				<p>Los bambúes (Poaceae: Bambusoideae) son gramíneas que evolucionaron y se adaptaron a hábitats forestales (aunque algunas especies ahora se pueden encontrar en entornos abiertos). Hay más de 1.700 especies de bambú en todo el mundo, más de un tercio de las cuales son nativas de América. Un género (<i>Arundinaria</i>; "caña") con cuatro especies es nativo de lo que ahora es el sureste continental de los Estados Unidos.</p>
				<h2>¡Disculpe nuestro polen!</h2>
				<p>Este sitio está en desarrollo activo, por favor, vuelva a visitarlo para ver las actualizaciones.</p>
			</div>
			<?php
		}
		elseif($LANG_TAG == 'pt'){
			?>
			<div>
				<h1 class="headline">Bem-vindo</h1>
				<p>Dedicado a documentar e apresentar informações sobre a diversidade e distribuição de espécies de bambu nativas da América do Norte e do Sul.</p>
				<p>Os bambus (Poaceae: Bambusoideae) são gramíneas que evoluíram e se adaptaram a habitats florestais (embora algumas espécies possam ser encontradas em ambientes abertos). Existem mais de 1.700 espécies de bambu no mundo todo, mais de um terço das quais são nativas das Américas. Um gênero (<i>Arundinaria</i>; "cana") com quatro espécies é nativo do que hoje é o sudeste dos Estados Unidos continentais.</p>
				<h2>Por favor, perdoem nosso pólen!</h2>
				<p>Este site está em desenvolvimento ativo, volte para atualizações.</p>
			</div>
			<?php
		}
        elseif($LANG_TAG == 'fr'){
			?>
			<div>
				<h1 class="headline">Bienvenue</h1>
				<p>Dédié à la documentation et à la présentation d'informations sur la diversité et la répartition des espèces de bambou originaires d'Amérique du Nord et du Sud.</p>
				<p>Les bambous (Poaceae : Bambusoideae) sont des graminées qui ont évolué et se sont adaptées aux habitats forestiers (bien que certaines espèces puissent désormais être trouvées dans des environnements ouverts). Il existe plus de 1700 espèces de bambous dans le monde, dont plus d'un tiers sont originaires des Amériques. Un genre (<i>Arundinaria</i> ; « canne ») comprenant quatre espèces est originaire de ce qui est aujourd'hui le sud-est des États-Unis continentaux.</p>
				<h2>Veuillez pardonner notre pollen!</h2>
				<p>Ce site est en cours de développement, veuillez consulter régulièrement les mises à jour.</p>
			</div>
			<?php
		}
		else{
			//Default Language
			?>
			<div>
				<h1>Welcome</h1>
				<p>
                    American Bamboos is dedicated to documenting and presenting information on the 
					diversity and distribution of bamboo species native to North and South America.
				</p>
				<p>
					The bamboos (Poaceae: Bambusoideae) are grasses that evolved in and adapted to forest 
					habitats (though some species can now be found in open environments). There are 
					more than 1,700 species of bamboo worldwide, over a third of which are native to the 
					the Americas. One genus (<i>Arundinaria</i>; "cane") with four species is 
					native to what is now the southeastern continental United States.
				</p>
				<h2>Please Pardon Our Pollen!</h2>
				<p>
					This site is under active development, please check back for updates.
				</p>
			</div>
			<?php
		}
		?>
	</main>
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>
</html>

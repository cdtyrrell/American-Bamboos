<?php

function rescale_norm($arr) {
	if(is_array($arr)) {
		$arrmax = max($arr);
		$arrmin = min($arr);
		foreach ($arr as $n) {
			if($arrmax == $arrmin){
				$newval = ($n - $arrmin);
			} else {
				$newval = ($n - $arrmin) / ($arrmax - $arrmin);
			}
			$newarr[] = $newval;
		}
	}
	return $newarr;
}

function rescale($arr, $min, $max, $prec = 1) {
	foreach ($arr as $n) {
		$newval = abs(1-$n) * ($max - $min) + $min;
		$newarr[] = round($newval, $prec);
	}
	return $newarr;
}

function linearGraph($data_line, $data_area, $type) {
	if($type == "elev") {
		$grid_num = 7;
		$long_len = 200;
		$short_len = 60;
		$bg_fill = "#F8FBF4";
		$bg_stroke = "#70A236";
		$fg_fill = "#537828";
		$fg_opacity = 0.8;
		$horiz = FALSE;
		$legend = array("3500","","2500","","1500","","500");
		$font_size = "0.5em";
		$font_color = "#000000";
	}
	
	if($type == "precip") {
		$grid_num = 10;
		$long_len = 200;
		$short_len = 60;
		$bg_fill = "#F8FBF4";
		$bg_stroke = "#70A236";
		$fg_fill = "#0099ff";
		$fg_stroke = "#537828";
		$fg_opacity = 0.5;
		$legend = array("F","M","A","M","J","J","A","S","O","N");
		$font_size = "0.5em";
		$font_color = "#000000";
		$horiz = TRUE;
	}
	
	if($type == "temp") {
		$grid_num = 10;
		$long_len = 200;
		$short_len = 60;
		$bg_fill = "#d3d3d3";
		$bg_stroke = "#ffffff";
		$fg_fill = "#ff5050";
		$fg_stroke = "#800000";
		$fg_opacity = 0.5;
		$legend = array("F","M","A","M","J","J","A","S","O","N");
		$font_size = "0.5em";
		$font_color = "#800000";
		$horiz = TRUE;
	}	
	
	$grid_dist = round($long_len / ($grid_num + 1), 1);
	if($horiz) {
		$width = $long_len;
		$height = $short_len;
		$path_d = 'M' . $grid_dist .' 0 V' . $short_len;
		for ($i = 2; $i <= $grid_num; $i++) {
			$path_d .= ' M' . $i * $grid_dist .' 0 V' . $short_len;
		}
	} else {
		$width = $short_len;
		$height = $long_len;
		$path_d = 'M0 ' . $grid_dist .' H' . $short_len;
		for ($i = 2; $i <= $grid_num; $i++) {
			$path_d .= ' M0 ' . $i * $grid_dist .' H' . $short_len;
		}
	}
	$corner_radius = round(0.1 * $short_len, 0);
	$text_inset = round(0.75 * $corner_radius, 0);
	$code = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="' . $width . '" height="' . $height . '"><rect x="0" y="0" rx="'. $corner_radius . '" ry="'. $corner_radius . '" width="'. $width . '" height="'. $height . '" fill="'. $bg_fill . '"/><path d="' . $path_d . '" fill="none" stroke="' . $bg_stroke . '" stroke-width="0.5"/>';
	if(is_array($legend)) {
		if($horiz) {
			$legendcode = '<text text-anchor="middle" y="1em" x="' . $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[0] . '</text>';
			for ($i = 1; $i < count($legend); $i++) {
				$legendcode .= '<text text-anchor="middle" y="1em" x="' . ($i+1) * $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[$i] . '</text>';
			}
		} else {
			$legendcode = '<text alignment-baseline="middle" x="' . $text_inset . '" y="' . $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[0] . '</text>';
			for ($i = 1; $i < count($legend); $i++) {
				$legendcode .= '<text alignment-baseline="middle" x="' . $text_inset . '" y="' . ($i+1) * $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[$i] . '</text>';
			}
		}
		$code .= $legendcode;
	}
	
	$normal_area = rescale_norm($data_area);
	$scaled_area = rescale($normal_area, $text_inset * 3, $short_len - 1);
	$normal_line = rescale_norm($data_line);
	$scaled_line = rescale($normal_line, $text_inset * 3, $short_len - 1);
	$datacode = $linecode = '<path d="M';
	if ($horiz) {
		for ($i = 0; $i < count($scaled_line); $i++) {
			if ($i > ($grid_num + 1)) { 
				$yvar = ((($grid_num + 2) - ($i - ($grid_num + 2))) - 1) * $grid_dist;
				$datacode .= $yvar . ' ' . $scaled_area[$i];
			} else {
				$datacode .= $i * $grid_dist . ' ' . $scaled_area[$i];
				$linecode .= $i * $grid_dist . ' ' . $scaled_line[$i];
			}
			if ($i < count($scaled_area) - 1) $datacode .= ' L';
			if ($i < count($scaled_line) - 1) $linecode .= ' L';
		}	
	} else {
		for ($i = 0; $i < count($scaled_area); $i++) {
			if ($i > ($grid_num + 1)) { 
				$yvar = ((($grid_num + 2) - ($i - ($grid_num + 2))) - 1) * $grid_dist;
				$datacode .= $scaled_area[$i] . ' ' . $yvar;
			} else {
				$datacode .= $scaled_area[$i] . ' ' . $i * $grid_dist;
				$linecode .= $scaled_line[$i] . ' ' . $i * $grid_dist;
			}
			if ($i < count($scaled_area) - 1) $datacode .= ' L';
			if ($i < count($scaled_line) - 1) $linecode .= ' L';
		}
	}
	if($type == "elev") $datacode .= 'L' . ($short_len-1) . ' ' . $long_len;
	if (is_array($data_area)) {
		$datacode .= ' Z" fill="' . $fg_fill . '" style="opacity:' . $fg_opacity . ';"/>';
		$code .= $datacode;
	}
	if (is_array($data_line)) {
		$linecode .= '" fill="none" stroke-width="2" stroke="' . $fg_stroke . '"/>';
		$code .= $linecode;
	}
	$code .= '</svg>';
	return($code);
}

function rangeGraph($data_line, $data_area, $type, $grid_num = 2, $long_len, $short_len, $fg_stroke, $fg_fill, $fg_opacity, $bg_stroke, $bg_fill, $horiz = TRUE, $legend, $font_size, $font_color) {
	if($type == "elev") {
		$grid_num = 7;
		$long_len = 200;
		$short_len = 60;
		$bg_fill = "#1a1a1a";
		$bg_stroke = "#cccccc";
		$fg_fill = "#d3d3d3";
		$fg_opacity = 0.8;
		$horiz = FALSE;
		$legend = array("3500","","2500","","1500","","500");
		$font_size = "0.5em";
		$font_color = "#ffffff";
	}
	
	if($type == "precip") {
		$grid_num = 10;
		$long_len = 200;
		$short_len = 60;
		$bg_fill = "#d3d3d3";
		$bg_stroke = "#ffffff";
		$fg_fill = "#0099ff";
		$fg_stroke = "#002e4d";
		$fg_opacity = 0.5;
		$legend = array("F","M","A","M","J","J","A","S","O","N");
		$font_size = "0.5em";
		$font_color = "#002e4d";
	}
	
	if($type == "temp") {
		$grid_num = 10;
		$long_len = 200;
		$short_len = 60;
		$bg_fill = "#d3d3d3";
		$bg_stroke = "#ffffff";
		$fg_fill = "#ff5050";
		$fg_stroke = "#800000";
		$fg_opacity = 0.5;
		$legend = array("F","M","A","M","J","J","A","S","O","N");
		$font_size = "0.5em";
		$font_color = "#800000";
	}	
	
	$grid_dist = round($long_len / ($grid_num + 1), 1);
	if($horiz) {
		$width = $long_len;
		$height = $short_len;
		$path_d = 'M' . $grid_dist .' 0 V' . $short_len;
		for ($i = 2; $i <= $grid_num; $i++) {
			$path_d .= ' M' . $i * $grid_dist .' 0 V' . $short_len;
		}
	} else {
		$width = $short_len;
		$height = $long_len;
		$path_d = 'M0 ' . $grid_dist .' H' . $short_len;
		for ($i = 2; $i <= $grid_num; $i++) {
			$path_d .= ' M0 ' . $i * $grid_dist .' H' . $short_len;
		}
	}
	$corner_radius = round(0.1 * $short_len, 0);
	$text_inset = round(0.75 * $corner_radius, 0);
	$code = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="' . $width . '" height="' . $height . '"><rect x="0" y="0" rx="'. $corner_radius . '" ry="'. $corner_radius . '" width="'. $width . '" height="'. $height . '" fill="'. $bg_fill . '"/><path d="' . $path_d . '" fill="none" stroke="' . $bg_stroke . '" stroke-width="0.5"/>';
	if(is_array($legend)) {
		if($horiz) {
			$legendcode = '<text text-anchor="middle" y="1em" x="' . $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[0] . '</text>';
			for ($i = 1; $i < count($legend); $i++) {
				$legendcode .= '<text text-anchor="middle" y="1em" x="' . ($i+1) * $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[$i] . '</text>';
			}
		} else {
			$legendcode = '<text alignment-baseline="middle" x="' . $text_inset . '" y="' . $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[0] . '</text>';
			for ($i = 1; $i < count($legend); $i++) {
				$legendcode .= '<text alignment-baseline="middle" x="' . $text_inset . '" y="' . ($i+1) * $grid_dist . '" style="font: ' . $font_size . ' sans-serif;" fill="' . $font_color . '">' . $legend[$i] . '</text>';
			}
		}
		$code .= $legendcode;
	}
	
	$normal_area = rescale_norm($data_area);
	$scaled_area = rescale($normal_area, $text_inset * 3, $short_len - 1);
	$code .= '<path d="';	
	$datacode = 'M';
	if($horiz) {
		for ($i = 0; $i < count($scaled_area); $i++) {
			if ($i > ($grid_num + 1)) { 
				$yvar = ((($grid_num + 2) - ($i - ($grid_num + 2))) - 1) * $grid_dist;
				$datacode .= $yvar . ' ' . $scaled_area[$i];
			} else {
				$datacode .= $i * $grid_dist . ' ' . $scaled_area[$i];
			}
			if ($i < count($scaled_area) - 1) $datacode .= ' L';
		}	
	} else {
		for ($i = 0; $i < count($scaled_area); $i++) {
			if ($i > ($grid_num + 1)) { 
				$yvar = ((($grid_num + 2) - ($i - ($grid_num + 2))) - 1) * $grid_dist;
				$datacode .= $scaled_area[$i] . ' ' . $yvar;
			} else {
				$datacode .= $scaled_area[$i] . ' ' . $i * $grid_dist;
			}
			if ($i < count($scaled_area) - 1) $datacode .= ' L';
		}
	}
	$datacode .= ' Z" fill="' . $fg_fill . '" style="opacity:' . $fg_opacity . ';"/>';
	$code .= $datacode . '</svg>';
	return($code);
}

function radarGraph() {

}


//echo linearGraph(null, array(0,0,15,25,40,35,10,0,0), "elev");

//echo linearGraph(null, array(5,6,7,8,9,8,7,6,5,4,3,3,1,2,3,4,5,6,7,7,6,5,4,3), "precip");

//echo linearGraph(array(4,5,6,7,8,7,6,5,4,3,2,2), array(5,6,7,8,9,8,7,6,5,4,3,3,1,2,3,4,5,6,7,7,6,5,4,3), "temp");

?>
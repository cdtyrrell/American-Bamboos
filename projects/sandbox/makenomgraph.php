<html>
    <head>
        <style>
            .active {
                fill:none;
                stroke:teal;
                stroke-width:2;
                opacity:1;
            }
            .action {
                stroke-width:1;
                opacity:1;
            }
            .Arundinaria-parviflora.active {
                stroke:salmon;
            }
            .Arthrostylidium-trinii.active {
                stroke:gold;
            }
            .Arthrostylidium-capillifolium.active {
                stroke:salmon;
            }
            .Arundo-farcta.action {
                fill:teal;
                stroke:teal;
            }
            .Arthrostylidium-capillifolium.action {
                fill:salmon;
                stroke:salmon;
            }
            .inactive {
                fill:none;
                stroke:grey;
                stroke-width:1;
                opacity:1;
            }
            .genusbar {
                fill:lightgrey;
                stroke:white;
                stroke-width:0;
                opacity:1; 
            }
            .genusbartext {
                fill:white;
            }
        </style>
    </head>
    <body>

        <?php

            $filecontents = file_get_contents('nomdat2.txt');
            $statementarr = explode(PHP_EOL, $filecontents);
            $actions = array();
            $min = $now = cal_to_jd(CAL_GREGORIAN, date('d'), date('m'), date('Y')+50);
            $jdays = array();
            foreach($statementarr as $statement) {
                // Parse each statement on semicolon, Trim, actions in (element 0)
                $blownstatement = explode(';', $statement);
                $blownstatement = array_map('trim', $blownstatement);

                // Convert dates into Julian day for sorting
                $statementdate = explode('-', $blownstatement[2]);
                if (count($statementdate) == 3) {
                    $jd = cal_to_jd(CAL_GREGORIAN, $statementdate[1], $statementdate[2], $statementdate[0]);
                } elseif (count($statementdate) == 2) {
                    $jd = cal_to_jd(CAL_GREGORIAN, $statementdate[1], 1, $statementdate[0]);
                } else {
                    $jd = cal_to_jd(CAL_GREGORIAN, 1, 1, $statementdate[0]);
                }
                array_unshift($blownstatement, $jd);
                // find year range (min, max)
                if($jd < $min and $blownstatement[1] == 'new') $min = $jd;

                $actions[] = $blownstatement;
            }
            $min = $min - (($now - $min) * 0.02);  // pad out start by 2%
            // Sort descending by Julian date
            usort($actions, fn($a, $b) => $a[0] <=> $b[0]);

            
            $scinames = $genera = array();
            foreach($actions as $act) {
                // Classify unique scientific names
                if ($act[1] == 'gen') {
                    $genera[] = $act[2];
                } elseif ($act[1] == 'comb' or $act[1] == 'syn') {                        
                    $scinames[] = $act[5];
                } else {
                    $scinames[] = $act[2];
                }
            }
            $species = array_values(array_unique($scinames));
            $genera = array_flip(array_values(array_unique($genera)));  //an array with a genus as key and rank order of nomenclatural age as value, starting with 0
            //Assign y-value multipliers to species names
            $scinamegen = $scinames = array();
            foreach($species as $sp) {
                $parts = explode(' ', $sp);
                $scinamegen[] = $parts[0];
                $scinames[] = array($parts[0], $sp);
            }
            $scinamegen = array_count_values($scinamegen);
            $cntarr = array_fill_keys(array_keys($scinamegen), 0);
            $species = array();
            foreach($scinames as $name) {
                $genus = $name[0];
                $spacer = round(1 / ($scinamegen[$genus] + 1), 3);
                $cntarr[$genus] = $cntarr[$genus] + 1;
                $species[$name[1]] = $genera[$genus] + ($spacer * $cntarr[$genus]);
            }


            $svgwidth = $pxPerJDay = 1200;
            $radius = 13;
            $genbarheight = 26;
            $genpadding = 4;
            $genheight = $genbarheight + $genpadding;
            $genfontsize = 24;
            $genfontpadding = $genfontsize - ($genbarheight - $genfontsize);
            if ($now != $min) $pxPerJDay = $svgwidth / ($now - $min);
            echo '<svg height="400" width="'.$svgwidth.'">';
            // Genus bars
            foreach($actions as $act) {
                $pos = round(($act[0] - $min) * $pxPerJDay, 0);
                if($act[1] == 'gen') {
                    $y = round(($genheight * $genera[$act[2]]) + ($genpadding/2), 0);
                    if ($act[0] < $min) {
                        $x = 0;
                        $xtext = $radius;
                    } else {
                        $x = $xtext = round($radius + $pos, 0);
                        echo '<circle cx="'.$x.'" cy="'.($y + $radius).'" r="'.$radius.'" class="genusbar" />';
                    }
                    echo '<rect x="'.$x.'" y="'.$y.'" width="'.($svgwidth - $pos).'" height="'.$genbarheight.'" class="genusbar" />';
                    echo '<text x="'.$xtext.'" y="'.($y + $genfontpadding).'" font-family="Helvetica, san-serif" font-size="'.$genfontsize.'px" class="genusbartext">'.strtoupper($act[2]).'</text>';
                }
            }
            // Background species name lines
            $typetracker = array_fill_keys(array_keys($species), 0);
            $spnov = array();
            foreach($actions as $act) {
                $x = round(($act[0] - $min) * $pxPerJDay, 0);
                if($act[1] == 'new') {
                    $spnov[] = $act[2];
                    $typetracker[$act[2]] = $act[2];
                    $y = round(($genheight * $species[$act[2]]), 0);
                    echo '<line x1="'.$x.'" y1="'.$y.'" x2="'.$svgwidth.'" y2="'.$y.'" class="'.str_replace(' ','-',$act[2]).' inactive" />';
                }
                if($act[1] == 'comb') {
                    if (!$typetracker[$act[5]]) $typetracker[$act[5]] = $typetracker[$act[2]];
                    $y = round(($genheight * $species[$act[5]]), 0);
                    echo '<line x1="'.$x.'" y1="'.$y.'" x2="'.$svgwidth.'" y2="'.$y.'" class="'.str_replace(' ','-',$act[5]).' inactive" />';
                }
                if($act[1] == 'syn') {
                    if (!$typetracker[$act[5]]) $typetracker[$act[5]] = $typetracker[$act[2]];
                }
                //var_dump($act);
                //var_dump($typetracker);
            }

            // Foreground species name lines
            $activearr = array_fill_keys(array_keys($species), 0);
            $yarr = array_fill_keys(array_keys($species), 0);
            foreach($actions as $act) {
                if($activearr[$act[2]]) {
                    if($act[1] == 'comb' or $act[1] == 'syn') {
                        $x1 = $activearr[$act[2]];
                        $x2 = round((($act[0] - $min) * $pxPerJDay) - $radius, 0);
                        $y1 = round(($genheight * $species[$act[2]]), 0);
                        $y2 = round(($genheight * $species[$act[5]]), 0);
                        $xmid = round($x2 + ($radius / 2), 1);
                        $ymid = round(($y2 + $y1) / 2, 1);
                        if ($activearr[$act[5]]) echo '<line x1="'.$activearr[$act[5]].'" y1="'.$y2.'" x2="'.($x2 + $radius).'" y2="'.$y2.'" class="'.str_replace(' ','-',$typetracker[$act[5]]).' active" />';
                        echo '<line x1="'.$x1.'" y1="'.$y1.'" x2="'.$x2.'" y2="'.$y1.'" class="'.str_replace(' ','-',$typetracker[$act[2]]).' active" />';
                        echo '<path d="M '.$x2.' '.$y1.' Q '.$xmid.' '.$y1.' '.$xmid.' '.$ymid.' T '.($x2 + $radius).' '.$y2.'" class="'.str_replace(' ','-',$typetracker[$act[2]]).' active" />';
                        $activearr[$act[2]] = 0;
                        $activearr[$act[5]] = $x2 + $radius;
                    }
                }
                if($act[1] == 'new') {  //or $act[1] == 'comb'
                    if ($activearr[$act[2]]) {
                        $activearr[$act[2]] = 0;
                    } else {
                        $activearr[$act[2]] = round(($act[0] - $min) * $pxPerJDay, 0);
                    }
                }
            }
            foreach($activearr as $spp => $xval) {
                if($xval) {
                    $x1 = $xval;
                    $x2 = $svgwidth;
                        $y = round(($genheight * $species[$spp]), 0);
                        echo '<line x1="'.$x1.'" y1="'.$y.'" x2="'.$x2.'" y2="'.$y.'" class="'.str_replace(' ','-',$typetracker[$spp]).' active" />';
                }
            }

            //Surface features (dots, text, etc.)
            foreach($actions as $act) {
                if($act[1] != 'gen') {
                    $x = round(($act[0] - $min) * $pxPerJDay, 0);
                    if($act[1] == 'new' or $act[1] == 'type') {
                        $y = round(($genheight * $species[$act[2]]), 0);
                        $text = $act[2];
                    } else {
                        $y = round(($genheight * $species[$act[5]]), 0);
                        if ($act[1] == 'comb') {
                            $text = $act[5];
                        } else {
                            $text = '';
                        }
                    }
                    echo '<circle cx="'.$x.'" cy="'.$y.'" r="2" class="'.str_replace(' ','-',$typetracker[$act[2]]).' action" />';
                    if($act[1] == 'type') {
                        $text = $act[4];
                        $y = $y + $radius;
                    }
                    echo '<text x="'.$x.'" y="'.round($y - $genheight * 0.1, 0).'" font-family="Helvetica, san-serif" font-size="10px" fill="black">'.$text.'</text>';
                }
            }
            echo 'Your browser does not support inline SVG.</svg>';
        ?>

    </body>
</html>
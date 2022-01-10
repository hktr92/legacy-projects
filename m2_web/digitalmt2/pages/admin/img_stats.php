<?PHP
  ERROR_REPORTING(E_ALL);
  //require("..../rights.inc.php");
  session_name("m2hp");
  session_start();
  
  //if($_SESSION['user_admin']>=$adminRights['stats']) {
    
    if(isset($_GET['file']) && !empty($_GET['file'])) {
    
      if(file_exists('./cache/'.$_GET['file'])) {
      
        $contents = file('./cache/'.$_GET['file']);
        
        $imgTyp = trim($contents[1]);
        $imgTitel = trim($contents[2]);
        $imgValues = trim($contents[3]);
        $imgStrings = trim($contents[4]);
        
        $inWerte  = unserialize($imgValues);
        $inStrings = unserialize($imgStrings);
      }
    
    }
    
    $imWidth = 400;
    $imHeight = 200;
    $imRand = 3;
    $schriftGr = 2;
    $titelGr = 3;
    
    // Bereiche
    $bildBereich = round($imWidth*1/2);
    $legendeBereich = $bildBereich+75;
    
    // Legende
    $legendeOAbstand = 20;
    $legendeZAbstand = 5;
    $legendePadding = 5;
    $legendeHoehe = $legendeOAbstand+($legendePadding*2)+((imagefontheight($schriftGr)+$legendeZAbstand)*count($inStrings));
    $legendeBreite = $imWidth-$imRand-2;
    
    $im = imagecreatetruecolor($imWidth,$imHeight);
    
    // Farben
    $iColors[0]=imagecolorallocate($im, 255, 0, 0);
    $iColors[1]=imagecolorallocate($im, 0, 255, 0);
    $iColors[2]=imagecolorallocate($im, 0, 0, 255);
    $iColors[3]=imagecolorallocate($im, 255, 255, 0);
    $iColors[4]=imagecolorallocate($im, 255, 0, 255);
    $iColors[5]=imagecolorallocate($im, 0, 255, 255);
    $iColors[6]=imagecolorallocate($im, 200, 200, 200);
    $iColors[7]=imagecolorallocate($im, 150, 100, 150);
    $iColors[8]=imagecolorallocate($im, 100, 255, 255);
    
    $iColorsD[0]=imagecolorallocate($im, 200, 0, 0);
    $iColorsD[1]=imagecolorallocate($im, 0, 200, 0);
    $iColorsD[2]=imagecolorallocate($im, 0, 0, 200);
    $iColorsD[3]=imagecolorallocate($im, 200, 200, 0);
    $iColorsD[4]=imagecolorallocate($im, 200, 0, 200);
    $iColorsD[5]=imagecolorallocate($im, 0, 200, 200);
    $iColorsD[6]=imagecolorallocate($im, 150, 150, 150);
    $iColorsD[7]=imagecolorallocate($im, 100, 50, 100);
    $iColorsD[8]=imagecolorallocate($im, 50, 200, 200);
    
    $colWeiss=imagecolorallocate($im, 255, 255,255);
    $colSchwarz=imagecolorallocate($im, 0, 0, 0);
    
    $colDGrau=imagecolorallocate($im, 200, 200, 200);
    $colGrau=imagecolorallocate($im, 220, 220, 220);
    
    $colRand=imagecolorallocate($im, 240, 240, 240);
    $colHg=imagecolorallocate($im, 250, 250, 250);
  
    imagefill($im,0,0,$colRand);
    imagefilledrectangle($im, $imRand, $imRand, $imWidth-$imRand, $imHeight-$imRand, $colHg);
    
    imagefilledrectangle($im, $legendeBereich, $legendeOAbstand, $legendeBreite, $legendeHoehe, $colGrau);
    imagerectangle($im, $legendeBereich, $legendeOAbstand, $legendeBreite, $legendeHoehe, $colDGrau);
    
    imagestring($im, $titelGr, 10, 10, $imgTitel, $colSchwarz);
    imagestring($im, $titelGr, 11, 10, $imgTitel, $colSchwarz);
    
    if($_SESSION['user_admin']>0) {
      
      $cntValues = count($inWerte);
      $cntStrings = count($inStrings);
        
      if($imgTyp=='torte') {
        
        // Torte Kalkulieren
        $bBereichH = $bildBereich/2;
        $bBereichM = $imHeight/2;
        $torteBreite = $bildBereich*0.7;
        $torteHoehe = $imHeight*0.60;
        
        $topDistance=$legendeOAbstand+$legendePadding;
        
        $sumValues=0;
        for($i=0;$i<$cntValues;$i++) {
          $sumValues=$sumValues+$inWerte[$i];
          
          imagestring($im, $schriftGr, $legendeBereich+$legendePadding+25, $topDistance, $inStrings[$i], $colSchwarz);
          imagefilledrectangle($im, $legendeBereich+$legendePadding, $topDistance, $legendeBereich+$legendePadding+10, $topDistance+15, $iColors[$i]);
          imagerectangle($im, $legendeBereich+$legendePadding, $topDistance, $legendeBereich+$legendePadding+10, $topDistance+15, $colSchwarz);
          $topDistance += (imagefontheight($schriftGr)+$legendeZAbstand);
        }  
        
        $angleOld = 0;
        $newAngle = 0;
        for($j=0;$j<$cntValues;$j++) {
          $relValue=$inWerte[$j]/$sumValues;
          $relAngle=round(360*$relValue,0);
          $angleOld = $newAngle;
          $newAngle=$newAngle+$relAngle;
          
          if($relAngle>0) {
            for($t=0;$t<=10;$t++) {
              imagefilledarc($im, $bBereichH, $bBereichM+$t, $torteBreite, $torteHoehe, $angleOld, $newAngle , $iColorsD[$j], IMG_ARC_PIE);
              if($t==10) { imagearc($im, $bBereichH, $bBereichM+$t, $torteBreite, $torteHoehe, $angleOld, $newAngle, $colSchwarz); }
            }
          }
          
        }
        
        $angleOld = 0;
        $newAngle = 0;
        
        for($j=0;$j<$cntValues;$j++) {
        
          
          $relValue=$inWerte[$j]/$sumValues;
          $relAngle=round(360*$relValue,0);
          $angleOld = $newAngle;
          $newAngle=$newAngle+$relAngle;
          if($newAngle>360) $newAngle=360;
          imagefilledarc($im, $bBereichH, $bBereichM, $torteBreite, $torteHoehe, $angleOld, $newAngle, $iColors[$j], IMG_ARC_PIE);
          imagearc($im, $bBereichH, $bBereichM, $torteBreite, $torteHoehe, $angleOld, $newAngle, $colSchwarz);
          $xRand = round(floor($torteBreite/2) * cos($newAngle* M_PI / 180) + $bBereichH);
          $yRand = round(floor($torteHoehe/2) * sin($newAngle* M_PI / 180) + $bBereichM);
          imageline($im, $bBereichH, $bBereichM, $xRand, $yRand, $colSchwarz);
          
          $difAngle = round($angleOld+(($newAngle-$angleOld)/2));
          $xText = round(floor($torteBreite/2) * cos($difAngle* M_PI / 180) + $bBereichH);
          $yText = round(floor($torteHoehe/2) * sin($difAngle* M_PI / 180) + $bBereichM);
          
          if($yText<$bBereichH) $yFP = imagefontheight($schriftGr)*(-1);
          else { $yFP = imagefontheight($schriftGr); }
          if($xText<$bBereichH) $xFP = (-20);
          else { $xFP = 0; }
          imagestring($im, $schriftGr, $xText+$xFP+1,$yText+$yFP, round($relValue*100,2).' % ('.$inWerte[$j].')', $colWeiss);
          imagestring($im, $schriftGr, $xText+$xFP-1,$yText+$yFP, round($relValue*100,2).' % ('.$inWerte[$j].')', $colWeiss);
          imagestring($im, $schriftGr, $xText+$xFP,$yText+$yFP+1, round($relValue*100,2).' % ('.$inWerte[$j].')', $colWeiss);
          imagestring($im, $schriftGr, $xText+$xFP,$yText+$yFP-1, round($relValue*100,2).' % ('.$inWerte[$j].')', $colWeiss);
          //imagestring($im, $schriftGr, $xText+1,$yText+$yFP, round($relValue*100,2).' % ('.$inWerte[$j].')', $colSchwarz);
          imagestring($im, $schriftGr, $xText+$xFP,$yText+$yFP, round($relValue*100,2).' % ('.$inWerte[$j].')', $colSchwarz);
          
          //imageline($im, $bBereichH, $bBereichM, $xText, $yText, $colSchwarz);
          
        }
      
      }
      
    }
    
    /*
    $newWidth = round($imWidth*0.75);
    $newHeight = round($imHeight*0.75);
    $thumb = imagecreatetruecolor($newWidth,$newHeight);
    imagecopyresampled($thumb, $im, 0, 0, 0, 0, $newWidth, $newHeight, $imWidth, $imHeight); */
  
    header('Content-type: image/png');
    imagepng($im);
    imagedestroy($im);
    //imagedestroy($thumb);
  
  /*
  }
  else {
    echo'<p class="meldung">Kein Zugriff auf diesen Bereich!</p>';
  }
  /**/
?>
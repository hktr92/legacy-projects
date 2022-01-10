<?PHP

  function calcPages($gesEin,$aktSeite,$eSeite) {
    $output = array();
    $esQuote = ceil(($gesEin/$eSeite));
    if($aktSeite==0) {$aktSeite=1;}
    $startS = ($aktSeite*$eSeite)-$eSeite;
    $output[0]=$esQuote;
    $output[1]=$startS;
    return $output;
  }
  
  function checkAnum($wert) {
    $checkit = preg_match("/^[a-zA-Z0-9]+$/",$wert);
    if($checkit) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function checkIP($wert) {
    $checkit = preg_match("/^[0-9\*]{1,3}+\.[0-9\*]{1,3}+\.[0-9\*]{1,3}+\.[0-9\*]{1,3}+$/",$wert);
    if($checkit) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function checkName($wert) {
    $checkit = preg_match("/^[a-zA-Z0-9[:space:]]+$/",$wert);
    if($checkit) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function checkVoucher($wert) {
    $checkit = preg_match("/^[0-9]+[0-9\-]+[0-9]+$/",$wert);
    $wert = str_replace('-','',$wert);
    if($checkit && strlen($wert)>=16 && strlen($wert)<=25) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function checkLogin($username, $password) {
	$sql = mysql_query("SELECT COUNT(*) FROM account.account WHERE login='{$username}' AND password=PASSWORD('{$password}')");
	$result = mysql_result($sql, 0);
	if($result == 0) {
		return false;
	} else {
		return true;
	}
  }
  
  function checkPwd($wert) {
    $checkit = preg_match("/^[a-zA-Z0-9[:space:]]+$/",$wert);
    if($checkit) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function checkMail($string) {
    if(preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,4}$/", $string)) {
      return true;
    }
    else { return false; }
  }
  
  function checkInt($wert) {
    $checkit = preg_match("/^[0-9]+$/",$wert);
    if($checkit) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function checkRate($wert) {
    //if(checkInt($wert) && $wert>0) {
    if(preg_match("/^[1-9]+\.[0-9]+$/",$wert) || $wert>0) {
      return true;
    }
    else {
      return false;
    }
  }

  function compareItems($inputID) {
  
    $input = "./archives/items.txt";
    
    $getFile =  file($input);
    $getZeilen = count($getFile);
    
    for($x=0;$x<$getZeilen;$x++) {
    
      $aktZeile = $getFile[$x];
      $splitZeile = explode('|||',$aktZeile);
      $startWert = $splitZeile[0]+0;
      $endWert = $splitZeile[1]+0;
      if($inputID<=$endWert AND $inputID>=$startWert) {
        $maxStufe = $endWert-$startWert;
        $stufe=$inputID-$startWert;
        $aus=array();
        $aus['item'] = $splitZeile[2];
        $aus['groesse'] = trim($splitZeile[3]);
        $aus['stufe'] = ($maxStufe==0) ? NULL : $stufe;
        $aus['maxStufe'] = $maxStufe;
        $aus['vnum']=$startWert;
        return $aus;
      }
    }
    $nItem=array();
    $nItem['groesse']=1;
    $nItem['item']=$inputID;
    $nItem['stufe']=NULL;
    $nItem['maxStufe']=0;
    $nItem['vnum']=$inputID;
    return $nItem;
  
  }
  
  function checkPos($inID) {
    global $sqlServ;
    $sqlCmd="SELECT pos,vnum FROM player.item WHERE owner_id='".$inID."' AND window='SAFEBOX'";
    $sqlQry=mysql_query($sqlCmd,$sqlServ);
    
    $lagerPos=array();
    while($getLager=mysql_fetch_object($sqlQry)) {
      $maxGr = compareItems($getLager->vnum);
      $aktPos=$getLager->pos;
      for($i=1;$i<=$maxGr['groesse'];$i++) {
        $lagerPos[$aktPos]=$getLager->vnum;
        $aktPos = $aktPos + 5;
      }
    }
    
    $sqlCmd="SELECT pos,vnum FROM player.item WHERE owner_id='".$inID."' AND window='MALL'";
    $sqlQry=mysql_query($sqlCmd,$sqlServ);
    
    $islPos=array();
    while($getISL=mysql_fetch_object($sqlQry)) {
      $maxGr = compareItems($getISL->vnum);
      $aktPos=$getISL->pos;
      for($i=1;$i<=$maxGr['groesse'];$i++) {
        $islPos[$aktPos]=$getISL->vnum;
        $aktPos = $aktPos + 5;
      }
    }
    
    $returnArray['lager']=$lagerPos;
    $returnArray['islager']=$islPos;
    
    return $returnArray;
  }
  
  function listLager($inArray,$typus=0) {
    if($typus==1) {
      $ueS='IS-Lager';
      $cInput=$inArray['islager'];
    }
    else {
      $ueS='Lager';
      $cInput=$inArray['lager'];
    }
    echo'<table class="lager">';
    echo'<tr>
      <th class="topLine" colspan="5">'.$ueS.'</th>
    </tr>';
    for($i=0;$i<45;$i++) {
      if($i==0) { echo'<tr>'; }
      if(isset($cInput[$i])) {
        $zF="tdunkel";
        $getItem = compareItems($cInput[$i]);
        $iStufe = (checkInt($getItem['stufe'])) ? "+".$getItem['stufe'] : '';
        $lineout="<a title=\"".$getItem['item'].$iStufe."\">".$i."</a>";
      }
      else { $zF="thell"; $lineout=$i; }
      echo '<td class="'.$zF.'">'.$lineout.'</td>';
      if($i!=0 && ($i+1)%5==0) { 
        echo'</tr>';
        if(($i+1)!=45) { echo '<tr>'; } 
      }
    }
    echo'</table>';
  
  }
  
  function findPos($belegtePos,$iGroesse) {
    $possPos=array();
    for($i=0;$i<45;$i++) {
    
      if(empty($belegtePos[$i])) {
      
        for($y=0;$y<$iGroesse;$y++) {
        
          $aktPos=$i+($y*5);
          $thisFits = true;
          if(!isset($belegtePos[$aktPos]) && $aktPos<45) {
            $thisFits = true;
          }
          else {
            $thisFits = false;
            break;
          }
          
        }
        if($thisFits) { $possPos[]=$i; }
        
      }
    
    }
    return $possPos;
  }

  function checkUploadSize($dateiGr,$maxGr) {
    $maxGrByte = $maxGr*1024;
    if($dateiGr<=$maxGrByte) {
      return true;
    }
    else {
      return false;
    }
  }
  
  function imageCheckSize($datei,$xMax,$yMax) {
    $erlaubteBilder = array(
      'image/jpeg' => '.jpg',
      'image/gif'  => '.gif'
    );
    $getGr=getimagesize($datei);

    if($getGr[0]<=$xMax && $getGr[1]<=$yMax && !empty($erlaubteBilder[$getGr['mime']]) ) {
      return $erlaubteBilder[$getGr['mime']];
    }
    else {
      return false;
    }
  }
  
  function imageUpload($dateiIn,$maxDateiGr,$maxDateix,$maxDateiy) {
    if($_FILES[$dateiIn]['size']>0) {
      if(checkUploadSize($_FILES[$dateiIn]['size'],$maxDateiGr)) {
        if($dateiEndung = imageCheckSize($_FILES[$dateiIn]['tmp_name'],$maxDateix,$maxDateiy)) {
          $md5datei = md5_file($_FILES[$dateiIn]['tmp_name']).'_'.rand(10000,99999);
          if(move_uploaded_file($_FILES[$dateiIn]['tmp_name'],'./is_img/'.$md5datei.$dateiEndung)) { 
            return $md5datei.$dateiEndung;
          }
          else { return false; }
        }
        else { return false; }
      }
      else { return false; }
    }
    else { return false; }
  }
  
  function getMapByIndex($mapIndex) {
    if(checkInt($mapIndex)) {
      $mapArchive = "./archives/maps.txt";
      $mapContents = file($mapArchive);
      $returnArray=false;
      foreach($mapContents AS $aktMap) {
      
        $splitZeile = explode("|||",$aktMap);
        if(trim($splitZeile[0])==$mapIndex) {
          $returnArray=array();
          $returnArray=$splitZeile;
        }
        
      }
      
      if(is_array($returnArray)) {
        return $returnArray;
      }
      else {
        return false;
      }
      
    }
    else {
      return false;
    }
  }
  
  function listItems($iid='') {
    echo'<select name="itemtyp">';
      echo'<option value="">-------</option>';
      $itemDatei = "./archives/items.txt";
      $itemListe = file($itemDatei);
      $dateiLaenge = count($itemListe);
      for($i=0;$i<$dateiLaenge;$i++) {
        $splitZeile = explode("|||",$itemListe[$i]);
        $selected= ($iid>=$splitZeile[0] && $iid<=$splitZeile[1]) ? 'selected=selected':''; // to go
        echo'<option '.$selected.' value="'.$splitZeile[0].'">'.$splitZeile[2].'</option>';
      }
    echo'</select>';
  }
  
  function listMaps() {
    $mDatei = file('./archives/maps.txt');
    
    echo'<ul class="menue">';
    
    foreach($mDatei AS $aktMap) {
      
      $splitZeile = explode("|||",$aktMap);
      if(isset($splitZeile[6])) {
        echo '<li><a href="index.php?s=admin&a=map&mapindex='.$splitZeile[0].'">'.$splitZeile[6].'</a></li>';
      }
    
    }
    
    echo'</ul>';
    
  }
  
  function getDatum($timeStamp=0)
  {
    return date("d.m.Y",$timeStamp);
  }
  
  function getZeit($timeStamp=0)
  {
    return date("H:i",$timeStamp);
  }

  function x_nl2br($input)
  {
    $input = str_replace("\n",'<br/>',$input);
    return $input;
  }
  
  function listNewsKat($mIndex=-1)
  {
    global $newsKategorien;
    echo'<select name="kategorie">';
    foreach($newsKategorien AS $katIndex => $katName)
    {
      $selected = ($mIndex==$katIndex) ? 'selected="selected"' : '';
      echo'<option '.$selected.' value="'.$katIndex.'">'.$katName.'</option>';
    }
    echo'</select>';
  }
  
  function checkBetween($input,$lower=0,$upper=0)
  {
    if($input>=$lower && $input<=$upper) { return true; }
    else { return false; }
  }
  
	function generateRandomPassword(){
		define("pzeichen", "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWKXYZ0123456789");	
			$lange = mt_rand(12, 12);
			$genPass = "";
			
			$i = 0;
			
			while($i < $lange){
				
				$genPass .= substr(pzeichen, mt_rand(0, strlen(pzeichen)), 1);
				
				$i++;
				
			}
			return $genPass;
			
		}  
		
	function genCouponCode(){
		define("czeichen", "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWKXYZ0123456789");	
			$lange = mt_rand(16, 16);
			$genCouponCode = "";
			
			$i = 0;
			
			while($i < $lange){
				
				$genCouponCode .= substr(czeichen, mt_rand(0, strlen(czeichen)), 1);
				
				$i++;
				
			}
			return $genCouponCode;
			
		}		
?>
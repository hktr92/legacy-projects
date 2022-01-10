<?PHP
  $eProSeite=10;
  
  $sqlZeit = date("Y-m-d H:i:s",time());
  
  $itemBoni = array(
   '0' =>'Nici unul',
   '1' =>'Max PV',
   '2' =>'Max PM',
   '3' =>'--- Vitalitate',
   '4' =>'--- Inteligenta',
   '5' =>'--- Strenght',
   '6' =>'--- Flexibilitate',
   '7' =>'Viteza de atac',
   '8' =>'Viteza de miscare',
   '9' =>'Viteza de magie',
   '10' =>'Pv - Regenerare',
   '11' =>'Pm - Regenerare',
   '12' =>'Sansa otravire',
   '13' =>'Sansa Necunostintei',
   '14' =>'Sansa de incetinire',
   '15' =>'Sansa de criticala',
   '16' =>'Sansa unei lovituri patrunzatoare',
   '17' =>'Puternica impotriva semi-oamenilor',
   '18' =>'Puternica impotriva animalelor',
   '19' =>'Puternica impotriva orcilor',
   '20' =>'Puternica impotriva esotericilor',
   '21' =>'Puternica impotriva  vampirilor',
   '22' =>'Puternica impotriva diavol',
   '23' =>'Paguba este absorbita de PV',
   '24' =>'Paguba este absorbita de PM',
   '25' =>'Sansa de a prelua PM',
   '26' =>'Sansa recuperare PM',
   '27' =>'Sansa de a bloca atacul corporal',
   '28' =>'Sansa de a evita atacul de sageti',
   '29' =>'Aparare Sabie',
   '30' =>'Aparare cu 2 maini',
   '31' =>'Aparare pumnal',
   '32' =>'Aparare clopot',
   '33' =>'Aparare evantai',
   '34' =>'Rezistent la sageti',
   '35' =>'Rezistent la foc',
   '36' =>'Rezistent la fulger',
   '37' =>'Rezistent la magie',
   '38' =>'Rezistent la vant',
   '39' =>'Sansa de a reflecta atac corporal direct',
   '40' =>'Sansa de a reflecta un blestem',
   '41' =>'Rezistent la otrava',
   '42' =>'Sansa de a reface PM',
   '43' =>'Sansa de bonus la EXP',
   '44' =>'Sansa de a arunca de 2x yang',
   '45' =>'Sansa de a arunca de 2x Obiecte',
   '46' =>'Sansa de a creste efectu Potiuni',
   '47' =>'Sansa de a reface Pv',
   '48' =>'Imun la necunostinta',
   '49' =>'Imun la incetinire',
   '50' =>'Imun la cazatura',
   '52' =>'Raza arc +',
   '53' =>'Atac +',
   '54' =>'Aparare',
   '55' =>'Magic AW',
   '56' =>'Aparare magie',
   '58' =>'Max. rezistenta',
   '59' =>'Puternic impotriva Warrior',
   '60' =>'Puternic impotriva Ninja',
   '61' =>'Puternic impotriva Sura',
   '62' =>'Puternic impotriva Shaman',
   '63' =>'Puternic impotriva Monstrii',
   '64' =>'Atac +?',
   '65' =>'Aparare',
   '66' =>'EXP +?%',
   '67' =>'Sansa drop [obiecte]',
   '68' =>'Sansa drop [Gold]',
   '71' =>'Paguba competenta',
   '72' =>'Paguba medie',
   '73' =>'Rez Paguba competent',
   '74' =>'Rez Paguba medie',
   '76' =>'iCafe exp-bonus',
   '77' =>'Sansa iCafe de a captura obiecte',
   '78' =>'Sansa de aparare war',
   '79' =>'Sansa de aparare ninja',
   '80' =>'Sansa de aparare sura',
   '81' =>'Sansa de aparare shaman'
  );

  $itemSteine = array(
    '0' => 'Fara Slot',
    '1' => 'Slot liber',
    '28960' => 'Aschie',
    '28030' => 'Penetrare+0',
    '28130' => 'Penetrare+1',
    '28230' => 'Penetrare+2',
    '28330' => 'Penetrare+3',
    '28430' => 'Penetrare+4',
    '28530' => 'Penetrare+5',
    '28630' => 'Penetrare+6',
    '28031' => 'Uciderii+0',
    '28131' => 'Uciderii+1',
    '28231' => 'Uciderii+2',
    '28331' => 'Uciderii+3',
    '28431' => 'Uciderii+4',
    '28531' => 'Uciderii+5',
    '28631' => 'Uciderii+6',
    '28032' => 'Repetare+0',
    '28132' => 'Repetare+1',
    '28232' => 'Repetare+2',
    '28332' => 'Repetare+3',
    '28432' => 'Repetare+4',
    '28532' => 'Repetare+5',
    '28632' => 'Repetare+6',
    '28033' => 'Razboinic+0',
    '28133' => 'Razboinic+1',
    '28233' => 'Razboinic+2',
    '28333' => 'Razboinic+3',
    '28433' => 'Razboinic+4',
    '28533' => 'Razboinic+5',
    '28633' => 'Razboinic+6',
    '28034' => 'Ninja+0',
    '28134' => 'Ninja+1',
    '28234' => 'Ninja+2',
    '28334' => 'Ninja+3',
    '28434' => 'Ninja+4',
    '28534' => 'Ninja+5',
    '28634' => 'Ninja+6',
    '28035' => 'Sura+0',
    '28135' => 'Sura+1',
    '28235' => 'Sura+2',
    '28335' => 'Sura+3',
    '28435' => 'Sura+4',
    '28535' => 'Sura+5',
    '28635' => 'Sura+6',
    '28036' => 'Shaman+0',
    '28136' => 'Shaman+1',
    '28236' => 'Shaman+2',
    '28336' => 'Shaman+3',
    '28436' => 'Shaman+4',
    '28536' => 'Shaman+5',
    '28636' => 'Shaman+6',
    '28037' => 'Monster+0',
    '28137' => 'Monster+1',
    '28237' => 'Monster+2',
    '28337' => 'Monster+3',
    '28437' => 'Monster+4',
    '28537' => 'Monster+5',
    '28637' => 'Monster+6',
    '28038' => 'Evaziv+0',
    '28138' => 'Evaziv+1',
    '28238' => 'Evaziv+2',
    '28338' => 'Evaziv+3',
    '28438' => 'Evaziv+4',
    '28538' => 'Evaziv+5',
    '28638' => 'Evaziv+6',
    '28039' => 'Tremor+0',
    '28139' => 'Tremor+1',
    '28239' => 'Tremor+2',
    '28339' => 'Tremor+3',
    '28439' => 'Tremor+4',
    '28539' => 'Tremor+5',
    '28639' => 'Tremor+6',
    '28040' => 'Magie+0',
    '28140' => 'Magie+1',
    '28240' => 'Magie+2',
    '28340' => 'Magie+3',
    '28440' => 'Magie+4',
    '28540' => 'Magie+5',
    '28640' => 'Magie+6',
    '28041' => 'Vitalitate+0',
    '28141' => 'Vitalitate+1',
    '28241' => 'Vitalitate+2',
    '28341' => 'Vitalitate+3',
    '28441' => 'Vitalitate+4',
    '28541' => 'Vitalitate+5',
    '28641' => 'Vitalitate+6',
    '28042' => 'Protectie+0',
    '28142' => 'Protectie+1',
    '28242' => 'Protectie+2',
    '28342' => 'Protectie+3',
    '28442' => 'Protectie+4',
    '28542' => 'Protectie+5',
    '28642' => 'Protectie+6',
    '28043' => 'Graba+0',
    '28143' => 'Graba+1',
    '28243' => 'Graba+2',
    '28343' => 'Graba+3',
    '28443' => 'Graba+4',
    '28543' => 'Graba+5',
    '28643' => 'Graba+6',
    '28000' => 'Piatra Masacru+0 (100% Sansa de a prelua PM inamic)',
    '28100' => 'Piatra Masacru+1 (Med. Rezistenta la deteriorare 100%)',
    '28200' => 'Piatra Masacru+2 (Magic Rezistenta 100%)',
    '28300' => 'Piatra Masacru+3 (Apararii 100%)',
    '28004' => 'Piatra Paranoia+0 (70% Sansa de a prelua PM)',
    '28104' => 'Piatra Paranoia+1 (Rezistenta impotriva pierderii de indemanare 100%)',
    '28204' => 'Piatra Paranoia+2 (Rezistenta Magie 70%)',
    '28304' => 'Piatra Paranoia+3 (Aparare 70%)',
    '28008' => 'Piatra Traumei+0 (50% Sansa de a prelua PM inamic)',
    '28108' => 'Piatra Traumei+1 (Rezistenta la deteriorare 50%)',
    '28208' => 'Piatra Traumei+2 (Rezistenta Magie 50%)',
    '28308' => 'Piatra Traumei+3 (Aparare 50%)',
    '28012' => 'Piatra prostiei+0 (30% Sansa de a prelua PM inamic)',
    '28112' => 'Piatra prostiei+1 (Rezistenta impotriva pierderii de indemanare 50%)',
    '28212' => 'Piatra prostiei+2 (Rezistenta Magie 30%)',
    '28312' => 'Piatra prostiei+3 (Aparare 30%)'
  );
  
 
  
  $gmRechte = array(
    'SGA' => 'IMPLEMENTOR',
    'GA' => 'HIGH_WIZARD',
    'GM' => 'GOD',
    'TGM' => 'LOW_WIZARD',
    'PLAYER' => 'PLAYER'
  );
  
  $resetPos = array();
  $resetPos[1]['map_index']=1; // Rotes Reich
  $resetPos[1]['x']=468779;
  $resetPos[1]['y']=962107;
  $resetPos[2]['map_index']=21; // Gelbes Reich
  $resetPos[2]['x']=55700;
  $resetPos[2]['y']=157900;
  $resetPos[3]['map_index']=41; // Blaues Reich
  $resetPos[3]['x']=969066;
  $resetPos[3]['y']=278290;
  
  $pscBetraege = array(10,25,50,100);
  

?>
<?PHP
  $eProSeite=10;
  
  $sqlZeit = date("Y-m-d H:i:s",time());
  
  $itemBoni = array(
   '0' =>'F&#259;r&#259;',
   '1' =>'Max HP',
   '2' =>'Max MP',
   '3' =>'CON',
   '4' =>'INT',
   '5' =>'STR',
   '6' =>'DEX',
   '7' =>'Viteza de atac',
   '8' =>'Viteza de miscare',
   '9' =>'Viteza skill-urilor',
   '10' =>'Regenerare HP',
   '11' =>'Regenerare MP',
   '12' =>'&#350;ansa de otr&#259;vire',
   '13' =>'&#350;ansa de a bloca inamicul',
   '14' =>'&#350;ansa de &#238;ncetinire a inamicului',
   '15' =>'&#350;ansa unei lovituri critice',
   '16' =>'&#350;ansa unei lovituri p&#259;trunz&#259;toare',
   '17' =>'Anti Semi-Om', 
   '18' =>'Puternic &#238;mpotriva animalelor',
   '19' =>'Puternic &#238;mpotriva orcilor',
   '20' =>'Puternic &#238;mpotriva esotericilor',
   '21' =>'Puternic &#238;mpotriva undead',
   '22' =>'Puternic &#238;mpotriva devils',
   '23' =>'Damage-ul este absorbit de HP',
   '24' =>'Damage-ul este absorbit de MP',
   '25' =>'&#350;ansa de a fura inamicului MP',
   '26' =>'&#350;ansa de regenerare MP',
   '27' =>'&#350;ansa de blocare al atacului psihic',
   '28' =>'&#350;ansa de a evita atacul cu s&#259;ge&#355;i',
   '29' =>'Ap&#259;rare sabie',
   '30' =>'Ap&#259;rare lam&#259; dou&#259; m&#226;ini',
   '31' =>'Ap&#259;rare pumnal',
   '32' =>'Ap&#259;rare clopot',
   '33' =>'Ap&#259;rare evantai',
   '34' =>'Ap&#259;rare s&#259;ge&#355;i',
   '35' =>'Rezisten&#355;&#259; foc',
   '36' =>'Rezisten&#355;&#259; fulger',
   '37' =>'Rezisten&#355;&#259; magie',
   '38' =>'Rezisten&#355;&#259; v&#226;nt',
   '39' =>'&#350;ansa de a reflecta atacul psihic',
   '40' =>'&#350;ansa de a reflecta asupra blestemului',
   '41' =>'Rezisten&#355;&#259; otr&#259;vire',
   '42' =>'&#350;ansa de a restaura MP',
   '43' =>'&#350;ansa bonus experien&#355;&#259;',
   '44' =>'&#350;ansa dubl&#259; yang',
   '45' =>'&#350;ansa dubl&#259; iteme',
   '46' =>'Crestere efect otr&#259;vire',
   '47' =>'&#350;ansa de a lua MP-ul inamicului',
   '48' =>'Rezisten&#355;&#259; &#238;mpotriva bloc&#259;ri',
   '49' =>'Imun &#238;mpotriva incetiniri',
   '50' =>'Imun &#238;mpotriva bloc&#259;ri',
   '52' =>'Raz&#259; arca&#350; +',
   '53' =>'Atac +',
   '54' =>'Ap&#259;rare',
   '55' =>'Atac magic',
   '56' =>'Ap&#259;rare Magie',
   '58' =>'Max Stamina',
   '59' =>'Puternic &#238;mpotriva r&#259;zboinici',
   '60' =>'Puternic &#238;mpotriva ninja',
   '61' =>'Puternic &#238;mpotriva sura',
   '62' =>'Puternic &#238;mpotriva &#351;amani',
   '63' =>'Puternic &#238;mpotriva monstri',
   '64' =>'Atac +?',
   '65' =>'Ap&#259;rare',
   '66' =>'EXP +?%',
   '67' =>'&#350;ansa drop [iteme]',
   '68' =>'&#350;ansa drop [Yang]',
   '71' =>'Paguba competen&#355;ei',
   '72' =>'Paguba medie',
   '73' =>'Rezisten&#355;&#259; paguba competen&#355;ei',
   '74' =>'Rezisten&#355;&#259; paguba medie',
   '76' =>'iCafe exp-bonus',
   '77' =>'iCafe &#350;ans&#259; drop iteme',
   '78' =>'&#350;ansa ap&#259;rare &#238;mpotriva atacurilor de r&#259;zboinici',
   '79' =>'&#350;ansa ap&#259;rare &#238;mpotriva atacurilor de ninja',
   '80' =>'&#350;ansa ap&#259;rare &#238;mpotriva atacurilor de sura',
   '81' =>'&#350;ansa ap&#259;rare &#238;mpotriva atacurilor de &#351;amani'
  );

  $itemSteine = array(
    '0' => 'F&#259;r&#259; slot',
    '1' => 'Cu Slot',
    '28960' => 'Ciob',
    '28030' => 'Piatra p&#259;trunderii+0',
    '28130' => 'Piatra p&#259;trunderii+1',
    '28230' => 'Piatra p&#259;trunderii+2',
    '28330' => 'Piatra p&#259;trunderii+3',
    '28430' => 'Piatra p&#259;trunderii+4',
    '28530' => 'Piatra p&#259;trunderii+5',
    '28630' => 'Piatra p&#259;trunderii+6',
    '28031' => 'Piatra lovitur&#259;-fatal&#259;+0',
    '28131' => 'Piatra lovitur&#259;-fatal&#259;+1',
    '28231' => 'Piatra lovitur&#259;-fatal&#259;+2',
    '28331' => 'Piatra lovitur&#259;-fatal&#259;+3',
    '28431' => 'Piatra lovitur&#259;-fatal&#259;+4',
    '28531' => 'Piatra lovitur&#259;-fatal&#259;+5',
    '28631' => 'Piatra lovitur&#259;-fatal&#259;+6',
    '28032' => 'Piatra re&#226;ntoarceri+0',
    '28132' => 'Piatra re&#226;ntoarceri+1',
    '28232' => 'Piatra re&#226;ntoarceri+2',
    '28332' => 'Piatra re&#226;ntoarceri+3',
    '28432' => 'Piatra re&#226;ntoarceri+4',
    '28532' => 'Piatra re&#226;ntoarceri+5',
    '28632' => 'Piatra re&#226;ntoarceri+6',
    '28033' => 'Piatra anti-r&#259;zboinici+0',
    '28133' => 'Piatra anti-r&#259;zboinici+1',
    '28233' => 'Piatra anti-r&#259;zboinici+2',
    '28333' => 'Piatra anti-r&#259;zboinici+3',
    '28433' => 'Piatra anti-r&#259;zboinici+4',
    '28533' => 'Piatra anti-r&#259;zboinici+5',
    '28633' => 'Piatra anti-r&#259;zboinici+6',
    '28034' => 'Piatra anti-ninja+0',
    '28134' => 'Piatra anti-ninja+1',
    '28234' => 'Piatra anti-ninja+2',
    '28334' => 'Piatra anti-ninja+3',
    '28434' => 'Piatra anti-ninja+4',
    '28534' => 'Piatra anti-ninja+5',
    '28634' => 'Piatra anti-ninja+6',
    '28035' => 'Piatra anti-sura+0',
    '28135' => 'Piatra anti-sura+1',
    '28235' => 'Piatra anti-sura+2',
    '28335' => 'Piatra anti-sura+3',
    '28435' => 'Piatra anti-sura+4',
    '28535' => 'Piatra anti-sura+5',
    '28635' => 'Piatra anti-sura+6',
    '28036' => 'Piatra anti-&#350;amani+0',
    '28136' => 'Piatra anti-&#350;amani+1',
    '28236' => 'Piatra anti-&#350;amani+2',
    '28336' => 'Piatra anti-&#350;amani+3',
    '28436' => 'Piatra anti-&#350;amani+4',
    '28536' => 'Piatra anti-&#350;amani+5',
    '28636' => 'Piatra anti-&#350;amani+6',
    '28037' => 'Piatra anti-monstrii+0',
    '28137' => 'Piatra anti-monstrii+1',
    '28237' => 'Piatra anti-monstrii+2',
    '28337' => 'Piatra anti-monstrii+3',
    '28437' => 'Piatra anti-monstrii+4',
    '28537' => 'Piatra anti-monstrii+5',
    '28637' => 'Piatra anti-monstrii+6',
    '28038' => 'Piatra eschivei+0',
    '28138' => 'Piatra eschivei+1',
    '28238' => 'Piatra eschivei+2',
    '28338' => 'Piatra eschivei+3',
    '28438' => 'Piatra eschivei+4',
    '28538' => 'Piatra eschivei+5',
    '28638' => 'Piatra eschivei+6',
    '28039' => 'Piatra pitularii+0',
    '28139' => 'Piatra pitularii+1',
    '28239' => 'Piatra pitularii+2',
    '28339' => 'Piatra pitularii+3',
    '28439' => 'Piatra pitularii+4',
    '28539' => 'Piatra pitularii+5',
    '28639' => 'Piatra pitularii+6',
    '28040' => 'Piatra magiei+0',
    '28140' => 'Piatra magiei+1',
    '28240' => 'Piatra magiei+2',
    '28340' => 'Piatra magiei+3',
    '28440' => 'Piatra magiei+4',
    '28540' => 'Piatra magiei+5',
    '28640' => 'Piatra magiei+6',
    '28041' => 'Piatra vitalit&#259;&#355;ii+0',
    '28141' => 'Piatra vitalit&#259;&#355;ii+1',
    '28241' => 'Piatra vitalit&#259;&#355;ii+2',
    '28341' => 'Piatra vitalit&#259;&#355;ii+3',
    '28441' => 'Piatra vitalit&#259;&#355;ii+4',
    '28541' => 'Piatra vitalit&#259;&#355;ii+5',
    '28641' => 'Piatra vitalit&#259;&#355;ii+6',
    '28042' => 'Piatra protec&#355;iei+0',
    '28142' => 'Piatra protec&#355;iei+1',
    '28242' => 'Piatra protec&#355;iei+2',
    '28342' => 'Piatra protec&#355;iei+3',
    '28442' => 'Piatra protec&#355;iei+4',
    '28542' => 'Piatra protec&#355;iei+5',
    '28642' => 'Piatra protec&#355;iei+6',
    '28043' => 'Piatra grabei+0',
    '28143' => 'Piatra grabei+1',
    '28243' => 'Piatra grabei+2',
    '28343' => 'Piatra grabei+3',
    '28443' => 'Piatra grabei+4',
    '28543' => 'Piatra grabei+5',
    '28643' => 'Piatra grabei+6',
    '28000' => 'Piatra Masacrului+0 (100% &#350;ansa de a prelua MP-ul inamicului)',
    '28100' => 'Piatra Masacrului+1 (AVG. Rezisten&#355;&#259; la damage 100%)',
    '28200' => 'Piatra Masacrului+2 (Rezisten&#355;&#259; Magic&#259; 100%)',
    '28300' => 'Piatra Masacrului+3 (Ap&#259;rare 100%)',
    '28004' => 'Piatra Paranoia+0 (70% &#350;ansa de a prelua MP-ul inamicului)',
    '28104' => 'Piatra Paranoia+0+1 (Rezisten&#355;&#259; &#238;mpotriva pierderii competen&#355;ei 100%)',
    '28204' => 'Piatra Paranoia+0+2 (Rezisten&#355;&#259; Magic&#259; 70%)',
    '28304' => 'Piatra Paranoia+0+3 (Aparare 70%)',
    '28008' => 'Piatra Traumei+0 (50% &#350;ansa de a prelua MP-ul inamicului)',
    '28108' => 'Piatra Traumei+1 (AVG. Rezisten&#355;&#259; la damage 50%)',
    '28208' => 'Piatra Traumei+2 (Rezisten&#355;&#259; Magic&#259; 50%)',
    '28308' => 'Piatra Traumei+3 (Ap&#259;rare 50%)',
    '28012' => 'Piatra Prostiei+0 (30% &#350;ansa de a prelua MP-ul inamicului)',
    '28112' => 'Piatra Prostiei+1 (AVG. Rezisten&#355;&#259; la damage 50%)',
    '28212' => 'Piatra Prostiei+2 (Rezisten&#355;&#259; Magic&#259; 30%)',
    '28312' => 'Piatra Prostiei+3 (Ap&#259;rare 30%)'
  );
  
  $gReiche = array(
    '1' => 'Ro&#351;u',
    '2' => 'Galben',
    '3' => 'Albastru'
  );
  
  
  $aRassen = array(
    '0' => 'Razboinic (m)',
    '1' => 'Ninja (f)',
    '2' => 'Sura (m)',
    '3' => 'Saman (f)',
    '4' => 'Razboinic (f)',
    '5' => 'Ninja (m)',
    '6' => 'Sura (f)',
    '7' => 'Saman (m)'
  );
  
  $gmRechte = array(
    'SGA' => 'IMPLEMENTOR',
    'GA' => 'HIGH_WIZARD',
    'GM' => 'GOD',
    'TGM' => 'LOW_WIZARD',
    'PLAYER' => 'PLAYER'
  );
  
  $resetPos = array();
  $resetPos[1]['map_index']=1; // Regatul Ro&#350;u
  $resetPos[1]['x']=468779;
  $resetPos[1]['y']=962107;
  $resetPos[2]['map_index']=21; // Regatul Galben
  $resetPos[2]['x']=55700;
  $resetPos[2]['y']=157900;
  $resetPos[3]['map_index']=41; // Regatul Albastru
  $resetPos[3]['x']=969066;
  $resetPos[3]['y']=278290;
  
  $pscBetraege = array(10,25,50,100);
  
  $coinsBetraege = array(
    '10' => '11000000',
    '25' => '30000000',
    '50' => '60000000',
    '100' => '120000000',
  );
  
  $waehrungen = array(
    'EUR' => 'Euro',
    'CHF' => 'Franc Elve&#355;ian'
  );
  
  $kartenTypen = array(
    'PSC' => 'Paysafecard',
    'Ukash' => 'Ukash'
  );
  
  $sFrage = array(
    1 =>'Numele mamei?',
    2 =>'Numele tat&#259;lui?',
    3 =>'Numele animalu&#355;ului de companie?',
    4 =>'&#354;ara natal&#259;?'
  );
  
  $banGruende = array(
    0 => 'Hacking',
    1 => 'Buguri',
    2 => 'Insulte',
    3 => 'Altele'
  );
  
  $newsKategorien = array(
    0 => 'General',
    1 => 'Not&#259;',
    2 => 'Eveniment',
    3 => 'Server',
    4 => 'Mentenan&#355;&#259;'
  );
?>
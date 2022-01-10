<?PHP
  $eProSeite=10;
  
  $sqlZeit = date("Y-m-d H:i:s",time());
  
  $itemBoni = array(
   '0' =>'No',
   '1' =>'Max HP',
   '2' =>'Max MP',
   '3' =>'CON',
   '4' =>'INT',
   '5' =>'STR',
   '6' =>'DEX',
   '7' =>'Atack speed',
   '8' =>'Movement Speed',
   '9' =>'Skill Speed',
   '10' =>'HP-Regeneration',
   '11' =>'MP-Regeneration',
   '12' =>'Poisoning Chance',
   '13' =>'Faint chance',
   '14' =>'Slowing chance',
   '15' =>'Chance to hit Crit',
   '16' =>'Chance to DB',
   '17' =>'Demi-Human', 
   '18' =>'Strong against animals',
   '19' =>'Strong against Orcs',
   '20' =>'Strong against Esoteric',
   '21' =>'Strong against undead',
   '22' =>'Strong against Devils',
   '23' =>'Damage is absorbed by HP',
   '24' =>'Damage is absorbed by MP',
   '25' =>'Chanse to take enemy MP',
   '26' =>'Chance on hit recover MP',
   '27' =>'Chance to block physical atack',
   '28' =>'Chance pfeilangriff auszuweichen',
   '29' =>'Sword Defense',
   '30' =>'Two-hand defense',
   '31' =>'Knife defense',
   '32' =>'Bell-defense',
   '33' =>'Fan-defense',
   '34' =>'Arrow resistance',
   '35' =>'Fire Resistance',
   '36' =>'Lightning Resistance',
   '37' =>'Magic Resistance',
   '38' =>'Wind resistance',
   '39' =>'Chance to reflect physical attack',
   '40' =>'Opportunity to reflect on curse',
   '41' =>'Poison Resist',
   '42' =>'Chance to restore MP',
   '43' =>'Opportunity to exp bonus',
   '44' =>'Double Chance Yang',
   '45' =>'Double Chanse of droping items',
   '46' =>'Growth potion effect',
   '47' =>'Chanse to take the enemy MP',
   '48' =>'Unconscious defense against',
   '49' =>'Imune against slow',
   '50' =>'Imun against falling',
   '52' =>'Archery range +',
   '53' =>'Attack Rating +',
   '54' =>'Defense',
   '55' =>'Magical Attack',
   '56' =>'Magical Defense',
   '58' =>'Max Stamina',
   '59' =>'Strong against Warrior',
   '60' =>'Strong against Ninja',
   '61' =>'Strong against Sura',
   '62' =>'Strong against Shamans',
   '63' =>'Strong against Monsters',
   '64' =>'Attack Rating +?',
   '65' =>'Defense',
   '66' =>'EXP +?%',
   '67' =>'Drop Chance [items]',
   '68' =>'Drop Chance [Gold]',
   '71' =>'Skill damage',
   '72' =>'Average damage',
   '73' =>'Resistance skill damage',
   '74' =>'Avg. Damage Resistance',
   '76' =>'iCafe exp-bonus',
   '77' =>'iCafe chance to capture objects',
   '78' =>'Defense chance against warrior attacks',
   '79' =>'Defense a chance against ninja attacks',
   '80' =>'Defense chance against Sura attacks',
   '81' =>'Defense chance against shaman attacks'
  );

  $itemSteine = array(
    '0' => 'Leerer Slot',
    '1' => 'Freier Slot',
    '28960' => 'Splitter',
    '28030' => 'Durchbruch+0',
    '28130' => 'Durchbruch+1',
    '28230' => 'Durchbruch+2',
    '28330' => 'Durchbruch+3',
    '28430' => 'Durchbruch+4',
    '28530' => 'Durchbruch+5',
    '28630' => 'Durchbruch+6',
    '28031' => 'Todesstoß+0',
    '28131' => 'Todesstoß+1',
    '28231' => 'Todesstoß+2',
    '28331' => 'Todesstoß+3',
    '28431' => 'Todesstoß+4',
    '28531' => 'Todesstoß+5',
    '28631' => 'Todesstoß+6',
    '28032' => 'Wiederkehr+0',
    '28132' => 'Wiederkehr+1',
    '28232' => 'Wiederkehr+2',
    '28332' => 'Wiederkehr+3',
    '28432' => 'Wiederkehr+4',
    '28532' => 'Wiederkehr+5',
    '28632' => 'Wiederkehr+6',
    '28033' => 'Krieger+0',
    '28133' => 'Krieger+1',
    '28233' => 'Krieger+2',
    '28333' => 'Krieger+3',
    '28433' => 'Krieger+4',
    '28533' => 'Krieger+5',
    '28633' => 'Krieger+6',
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
    '28036' => 'Schamane+0',
    '28136' => 'Schamane+1',
    '28236' => 'Schamane+2',
    '28336' => 'Schamane+3',
    '28436' => 'Schamane+4',
    '28536' => 'Schamane+5',
    '28636' => 'Schamane+6',
    '28037' => 'Monster+0',
    '28137' => 'Monster+1',
    '28237' => 'Monster+2',
    '28337' => 'Monster+3',
    '28437' => 'Monster+4',
    '28537' => 'Monster+5',
    '28637' => 'Monster+6',
    '28038' => 'Ausweichen+0',
    '28138' => 'Ausweichen+1',
    '28238' => 'Ausweichen+2',
    '28338' => 'Ausweichen+3',
    '28438' => 'Ausweichen+4',
    '28538' => 'Ausweichen+5',
    '28638' => 'Ausweichen+6',
    '28039' => 'Ducken+0',
    '28139' => 'Ducken+1',
    '28239' => 'Ducken+2',
    '28339' => 'Ducken+3',
    '28439' => 'Ducken+4',
    '28539' => 'Ducken+5',
    '28639' => 'Ducken+6',
    '28040' => 'Magie+0',
    '28140' => 'Magie+1',
    '28240' => 'Magie+2',
    '28340' => 'Magie+3',
    '28440' => 'Magie+4',
    '28540' => 'Magie+5',
    '28640' => 'Magie+6',
    '28041' => 'Vitalität+0',
    '28141' => 'Vitalität+1',
    '28241' => 'Vitalität+2',
    '28341' => 'Vitalität+3',
    '28441' => 'Vitalität+4',
    '28541' => 'Vitalität+5',
    '28641' => 'Vitalität+6',
    '28042' => 'Schutz+0',
    '28142' => 'Schutz+1',
    '28242' => 'Schutz+2',
    '28342' => 'Schutz+3',
    '28442' => 'Schutz+4',
    '28542' => 'Schutz+5',
    '28642' => 'Schutz+6',
    '28043' => 'Hast+0',
    '28143' => 'Hast+1',
    '28243' => 'Hast+2',
    '28343' => 'Hast+3',
    '28443' => 'Hast+4',
    '28543' => 'Hast+5',
    '28643' => 'Hast+6',
    '28000' => 'Stein des Masakers+0 (100% Chance MP des Gegners zu übernehmen)',
    '28100' => 'Stein des Masakers+1 (Durchschn. Schadenswiederstand 100%)',
    '28200' => 'Stein des Masakers+2 (Magiewiederstand 100%)',
    '28300' => 'Stein des Masakers+3 (Schwerverteidigung 100%)',
    '28004' => 'Stein der Paranoia+0 (70% Chance MP des gegners zu übernehmen)',
    '28104' => 'Stein der Paranoia+1 (Wiederstand gegen Fertigkeitsschaden 100%)',
    '28204' => 'Stein der Paranoia+2 (Magiewiederstand 70%)',
    '28304' => 'Stein der Paranoia+3 (Schwerverteidigung 70%)',
    '28008' => 'Stein des Traumas+0 (50% Chance MP des Gegners zu übernehmen)',
    '28108' => 'Stein des Traumas+1 (Durchschn. Schadenswiederstand 50%)',
    '28208' => 'Stein des Traumas+2 (Magiewiederstand 50%)',
    '28308' => 'Stein des Traumas+3 (Schwerverteidigung 50%)',
    '28012' => 'Stein der Dummheit+0 (30% Chance MP des Gegners zu übernehmen ',
    '28112' => 'Stein der Dummheit+1 (Wiederstand gegen Fertigkeitsschaden 50%)',
    '28212' => 'Stein der Dummheit+2 (Magiewiederstand 30%)',
    '28312' => 'Stein der Dummheit+3 (Schwerverteidigung 30%)'
  );
  
  $gReiche = array(
    '1' => 'Red',
    '2' => 'Yellow',
    '3' => 'Blue'
  );
  
  
  $aRassen = array(
    '0' => 'Warrior (m)',
    '1' => 'Ninja (w)',
    '2' => 'Sura (m)',
    '3' => 'Shaman (w)',
    '4' => 'Warrior (w)',
    '5' => 'Ninja (m)',
    '6' => 'Sura (w)',
    '7' => 'Shaman (m)'
  );
  
  $gmRechte = array(
    'SGA' => 'IMPLEMENTOR',
    'GA' => 'HIGH_WIZARD',
    'GM' => 'GOD',
    'TGM' => 'LOW_WIZARD',
    'PLAYER' => 'PLAYER'
  );
  
  $resetPos = array();
  $resetPos[1]['map_index']=1; // Red Empire
  $resetPos[1]['x']=468779;
  $resetPos[1]['y']=962107;
  $resetPos[2]['map_index']=21; // Yellow Empire
  $resetPos[2]['x']=55700;
  $resetPos[2]['y']=157900;
  $resetPos[3]['map_index']=41; // Empire Blue
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
    'CHF' => 'Swiss franc'
  );
  
  $kartenTypen = array(
    'PSC' => 'Paysafecard',
    'Ukash' => 'Ukash'
  );
  
  $sFrage = array(
    1 =>'Mothers Name?',
    2 =>'Father Name?',
    3 =>'Name of pet?',
    4 =>'Home country?'
  );
  
  $banGruende = array(
    0 => 'Hacking',
    1 => 'Bugusing',
    2 => 'Insult',
    3 => 'Other'
  );
  
  $newsKategorien = array(
    0 => 'General',
    1 => 'Notice',
    2 => 'Event',
    3 => 'Server',
    4 => 'Maintenance'
  );
?>
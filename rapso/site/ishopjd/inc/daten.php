
<?php
function bonus_name($attrtype,$attrvalue)
{
if ($attrtype!="")
	{
	if ($attrtype==1)
		{
		echo "Max HP: $attrvalue";
		}
	elseif ($attrtype==2)
		{
		echo "Max MP: $attrvalue";
		}
	elseif ($attrtype==3)
		{
		echo "Vitalitate;: $attrvalue";
		}
	elseif ($attrtype==4)
		{
		echo "Inteligenta: $attrvalue";
		}
	elseif ($attrtype==5)
		{
		echo "Strenght: $attrvalue";
		}
	elseif ($attrtype==6)
		{
		echo "Dexteritate: $attrvalue";
		}
	elseif ($attrtype==7)
		{
		echo "Viteza de Atac: $attrvalue%";
		}
	elseif ($attrtype==8)
		{
		echo "Viteza de miscare: $attrvalue%";
		}
	elseif ($attrtype==9)
		{
		echo "Viteza Farmecului: $attrvalue%";
		}
	elseif ($attrtype==10)
		{
		echo "Regenerare Viata: $attrvalue%";
		}
	elseif ($attrtype==11)
		{
		echo "Regenerare Mana: $attrvalue%";
		}
	elseif ($attrtype==12)
		{
		echo "Sansa de Otravire: $attrvalue%";
		}
	elseif ($attrtype==13)
		{
		echo "Sansa Necunostinta: $attrvalue%";
		}
	elseif ($attrtype==14)
		{
		echo "Sansa Incetinire : $attrvalue%";
		}
	elseif ($attrtype==15)
		{
		echo "Sansa Lovitura Critica: $attrvalue%";
		}
	elseif ($attrtype==16)
		{
		echo "Sansa patrunzatoare: $attrvalue%";
		}
	elseif ($attrtype==17)
		{
		echo "Puternic Semi-OM: $attrvalue%";
		}
	elseif ($attrtype==18)
		{
		echo "Putenric contra Animale: $attrvalue%";
		}
	elseif ($attrtype==19)
		{
		echo "Putenric contra Orci: $attrvalue%";
		}
	elseif ($attrtype==20)
		{
		echo "Putenric contra Esoterici: $attrvalue%";
		}
	elseif ($attrtype==21)
		{
		echo "Putenric contra Zombie: $attrvalue%";
		}
	elseif ($attrtype==22)
		{
		echo "Putenric contra Diavol: $attrvalue%";
		}
	elseif ($attrtype==23)
		{
		echo "Absorbire HP: $attrvalue%";
		}
	elseif ($attrtype==24)
		{
		echo "Asorbire MP: $attrvalue%";
		}
	elseif ($attrtype==25)
		{
		echo "Sansa de a lua MP adversarului: $attrvalue%";
		}
	elseif ($attrtype==26)
		{
		echo "Poss. Mantenere MP: $attrvalue%";
		}
	elseif ($attrtype==27)
		{
		echo "Sansa Blocare Atac Corporal.: $attrvalue%";
		}
	elseif ($attrtype==28)
		{
		echo "Sansa ferire Sageti: $attrvalue%";
		}
	elseif ($attrtype==29)
		{
		echo "Aparare Sabie: $attrvalue%";
		}
	elseif ($attrtype==30)
		{
		echo "DAparare Sabie: $attrvalue%";
		}
	elseif ($attrtype==31)
		{
		echo "Aparare Pumnal: $attrvalue%";
		}
	elseif ($attrtype==32)
		{
		echo "Aparare Clopot: $attrvalue%";
		}
	elseif ($attrtype==33)
		{
		echo "Aparare Evantai: $attrvalue%";
		}
	elseif ($attrtype==34)
		{
		echo "Rezistenta sageti: $attrvalue%";
		}
	elseif ($attrtype==35)
		{
		echo "Resistenta Foc: $attrvalue%";
		}
	elseif ($attrtype==36)
		{
		echo "Resistenta Flash: $attrvalue%";
		}
	elseif ($attrtype==37)
		{
		echo "Resistenta Magie: $attrvalue%";
		}
	elseif ($attrtype==38)
		{
		echo "Resistenta : $attrvalue%";
		}
	elseif ($attrtype==39)
		{
		echo "Sansa de a reflecta atac corporal.: $attrvalue%";
		}
	elseif ($attrtype==40)
		{
		echo "Sansa de a refecta blestemul: $attrvalue%";
		}
	elseif ($attrtype==41)
		{
		echo "Resitenta Otrava: $attrvalue%";
		}
	elseif ($attrtype==42)
		{
		echo "Sansa regenerare MP: $attrvalue%";
		}
	elseif ($attrtype==43)
		{
		echo "Posibilitatea de; Exp Bonus: $attrvalue%";
		}
	elseif ($attrtype==44)
		{
		echo "Sansa de Drop Yang: $attrvalue%";
		}
	elseif ($attrtype==45)
		{
		echo "Sansa de Drop la obiecte: $attrvalue%";
		}
	elseif ($attrtype==46)
		{
		echo "Efect de potiune: $attrvalue%";
		}
	elseif ($attrtype==47)
		{
		echo "Sansa de regenerare HP: $attrvalue%";
		}
	elseif ($attrtype==48)
		{
		echo "Imun împotriva NECUNOSTINTA";
		}
	elseif ($attrtype==49)
		{
		echo "Imun la încetinire";
		}
	elseif ($attrtype==50)
		{
		echo "imun împotriva cadere";
		}
	elseif ($attrtype==51)
		{
		echo "Noname: $attrvalue%";
		}
	elseif ($attrtype==52)
		{
		echo "Raggio D'azione Arco: $attrvalue%";
		}
	elseif ($attrtype==53)
		{
		echo "Valoare Atac: $attrvalue";
		}
	elseif ($attrtype==54)
		{
		echo "Aparare: $attrvalue";
		}
	elseif ($attrtype==55)
		{
		echo "Valoare Atac Magic: $attrvalue%";
		}
	elseif ($attrtype==56)
		{
		echo "Aparare Magie: $attrvalue%";
		}
	elseif ($attrtype==57)
		{
		echo "Noname: $attrvalue%";
		}
	elseif ($attrtype==58)
		{
		echo "Rezistenta Maxima: $attrvalue";
		}
	elseif ($attrtype==59)
		{
		echo "Puternica impotriva Razboinic: $attrvalue%";
		}
	elseif ($attrtype==60)
		{
		echo "Puternica impotriva Ninja: $attrvalue";
		}
	elseif ($attrtype==61)
		{
		echo "Puternica impotriva Sura: $attrvalue";
		}
	elseif ($attrtype==62)
		{
		echo "Puternica impotriva Shaman: $attrvalue";
		}
	elseif ($attrtype==63)
		{
		echo "Puternica impotriva Mostri: $attrvalue";
		}
	elseif ($attrtype==64)
		{
		echo "Valoare Ataco: $attrvalue";
		}
	elseif ($attrtype==65)
		{
		echo "Aparare: $attrvalue";
		}
	elseif ($attrtype==66)
		{
		echo "Exp: $attrvalue%";
		}
	elseif ($attrtype==67)
		{
		echo "Drop: $attrvalue%";
		}
	elseif ($attrtype==68)
		{
		echo "Drop Yang: $attrvalue%";
		}
	elseif ($attrtype==69)
		{
		echo "Noname: $attrvalue%";
		}
	elseif ($attrtype==70)
		{
		echo "Noname: $attrvalue%";
		}
	elseif ($attrtype==71)
		{
		echo "Paguba Cpmpetentei t&agrave;: $attrvalue%";
		}
	elseif ($attrtype==72)
		{
		echo "Paguba Medie: $attrvalue%";
		}
	elseif ($attrtype==73)
		{
		echo "Rezistenta Paguba Competenta: $attrvalue%";
		}
	elseif ($attrtype==74)
		{
		echo "Rezistenta: $attrvalue%";
		}
	elseif ($attrtype==75)
		{
		echo "Noname: $attrvalue";
		}
	elseif ($attrtype==76)
		{
		echo "iCaf&egrave; EXP-BONUS: $attrvalue";
		}
	elseif ($attrtype==77)
		{
		echo "iCaf&egrave; Possibilit&agrave; sul razziare pi&ugrave; oggetti : $attrvalue";
		}
	elseif ($attrtype==78)
		{
		echo "Sansa de aparare impotriva Razboinic: $attrvalue";
		}
	elseif ($attrtype==79)
		{
		echo "Sansa de aparare impotriva Ninja: $attrvalue";
		}
	elseif ($attrtype==80)
		{
		echo "Sansa de aparare impotriva Sura: $attrvalue";
		}
	elseif ($attrtype==81)
		{
		echo "Sansa de aparare impotriva Shaman: $attrvalue";
		}
	
	}
	else
	{
	}
}
$itemBoni = array(
   '0' =>' ---------------------',
   '1' =>'Max PV',
   '2' =>'Max PM',
   '3' =>'Vitalitate',
   '4' =>'Inteligenta',
   '5' =>'Strenght',
   '6' =>'Flexibilitate',
   '7' =>'Viteza de atac',
   '8' =>'Viteza de miscare',
   '9' =>'Viteza farmecului',
   '10' =>'Regenerare PV',
   '11' =>'Regenerare PM',
   '12' =>'Sansa de otravire',
   '13' =>'Sansa Necunostintei',
   '14' =>'Sansa de incetinire',
   '15' =>'Sansa de criticala',
   '16' =>'Sansa lovitura patrunzatoare',
   '17' =>'Puternic contra semi-om',
   '18' =>'Puternic contra animalelor',
   '19' =>'Puternic contra orcilor',
   '20' =>'Puternic contra esotericilor',
   '21' =>'Puternic contra  vampirilor',
   '22' =>'Puternic contra diavol',
   '23' =>'Paguba este absorbita de PV',
   '24' =>'Paguba este absorbita de PM',
   '25' =>'Sansa de a prelua PM',
   '26' =>'Sansa recuperare PM',
   '27' =>'Sansa a bloca atacul corporal',
   '28' =>'Sansa evita atacul cu sageti',
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
   '39' =>'Sansa reflecta atac corporal ',
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
   '59' =>'Puternic impotriva Razboinic',
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
function pietre_name($socket0)
{
        if($socket0==28030)
         {$pietra1="Piatra Patrunzatoare  +0";}
         if($socket0==28130)
         {$pietra1="Piatra Patrunzatoare  +1";}
         if($socket0==28230)
         {$pietra1="Piatra Patrunzatoare  +2";}
         if($socket0==28330)
         {$pietra1="Piatra Patrunzatoare  +3";}
         if($socket0==28430)
         {$pietra1="Piatra Patrunzatoare  +4";}
         if($socket0==28530)
         {$pietra1="Piatra Patrunzatoare  +5";}
         if($socket0==28630)
         {$pietra1="Piatra Patrunzatoare  +6";}
         if($socket0==28031)
         {$pietra1="Piatra Fatala   +0";}
         if($socket0==28131)
         {$pietra1="Piatra Fatala   +1";}
         if($socket0==28231)
         {$pietra1="Piatra Fatala   +2";}
         if($socket0==28331)
         {$pietra1="Piatra Fatala   +3";}
         if($socket0==28431)
         {$pietra1="Piatra Fatala   +4";}
         if($socket0==28531)
         {$pietra1="Piatra Fatala   +5";}
         if($socket0==28631)
         {$pietra1="Piatra Fatala   +6";}
         if($socket0==28032)
         {$pietra1="Piatra Repetarii +0";}
         if($socket0==28132)
         {$pietra1="Piatra Repetarii +1";}
         if($socket0==28232)
         {$pietra1="Piatra Repetarii +2";}
         if($socket0==28332)
         {$pietra1="Piatra Repetarii +3";}
         if($socket0==28432)
         {$pietra1="Piatra Repetarii +4";}
         if($socket0==28532)
         {$pietra1="Piatra Repetarii +5";}
         if($socket0==28632)
         {$pietra1="Piatra Repetarii +6";}
         if($socket0==28033)
         {$pietra1="Piatra Anti-Razboinic +0";}
         if($socket0==28133)
         {$pietra1="Piatra Anti-Razboinic +1";}
         if($socket0==28233)
         {$pietra1="Piatra Anti-Razboinic +2";}
         if($socket0==28333)
         {$pietra1="Piatra Anti-Razboinic +3";}
         if($socket0==28433)
         {$pietra1="Piatra Anti-Razboinic +4";}
         if($socket0==28533)
         {$pietra1="Piatra Anti-Razboinic +5";}
         if($socket0==28633)
         {$pietra1="Piatra Anti-Razboinic +6";}
         if($socket0==28034)
         {$pietra1="Pietra Anti-Ninja +0";}
         if($socket0==28134)
         {$pietra1="Pietra Anti-Ninja +1";}
         if($socket0==28234)
         {$pietra1="Pietra Anti-Ninja +2";}
         if($socket0==28334)
         {$pietra1="Pietra Anti-Ninja +3";}
         if($socket0==28434)
         {$pietra1="Pietra Anti-Ninja +4";}
         if($socket0==28534)
         {$pietra1="Pietra Anti-Ninja +5";}
         if($socket0==28634)
         {$pietra1="Pietra Anti-Ninja +6";}
         if($socket0==28035)
         {$pietra1="Pietra Anti-Sura +0";}
         if($socket0==28135)
         {$pietra1="Pietra Anti-Sura +1";}
         if($socket0==28235)
         {$pietra1="Pietra Anti-Sura +2";}
         if($socket0==28335)
         {$pietra1="Pietra Anti-Sura +3";}
         if($socket0==28435)
         {$pietra1="Pietra Anti-Sura +4";}
         if($socket0==28535)
         {$pietra1="Pietra Anti-Sura +5";}
         if($socket0==28635)
         {$pietra1="Pietra Anti-Sura +6";}
         if($socket0==28036)
         {$pietra1="Pietra Anti-Shaman +0";}
         if($socket0==28136)
         {$pietra1="Pietra Anti-Shaman +1";}
         if($socket0==28236)
         {$pietra1="Pietra Anti-Shaman +2";}
         if($socket0==28336)
         {$pietra1="Pietra Anti-Shaman +3";}
         if($socket0==28436)
         {$pietra1="Pietra Anti-Shaman +4";}
         if($socket0==28536)
         {$pietra1="Pietra Anti-Shaman +5";}
         if($socket0==28636)
         {$pietra1="Pietra Anti-Shaman +6";}
         if($socket0==28037)
         {$pietra1="Piatra Monstilor  +0";}
         if($socket0==28137)
         {$pietra1="Piatra Monstilor  +1";}
         if($socket0==28237)
         {$pietra1="Piatra Monstilor  +2";}
         if($socket0==28337)
         {$pietra1="Piatra Monstilor  +3";}
         if($socket0==28437)
         {$pietra1="Piatra Monstilor  +4";}
         if($socket0==28537)
         {$pietra1="Piatra Monstilor  +5";}
         if($socket0==28637)
         {$pietra1="Piatra Monstilor  +6";}
         if($socket0==28038)
         {$pietra1="Piatra Eschivei   +0";}
         if($socket0==28138)
         {$pietra1="Piatra Eschivei   +1";}
         if($socket0==28238)
         {$pietra1="Piatra Eschivei   +2";}
         if($socket0==28338)
         {$pietra1="Piatra Eschivei   +3";}
         if($socket0==28438)
         {$pietra1="Piatra Eschivei   +4";}
         if($socket0==28538)
         {$pietra1="Piatra Eschivei   +5";}
         if($socket0==28638)
         {$pietra1="Piatra Eschivei   +6";}
         if($socket0==28039)
         {$pietra1="Piatra Pitularii  +0";}
         if($socket0==28139)
         {$pietra1="Piatra Pitularii  +1";}
         if($socket0==28239)
         {$pietra1="Piatra Pitularii  +2";}
         if($socket0==28339)
         {$pietra1="Piatra Pitularii  +3";}
         if($socket0==28439)
         {$pietra1="Piatra Pitularii  +4";}
         if($socket0==28539)
         {$pietra1="Piatra Pitularii  +5";}
         if($socket0==28639)
         {$pietra1="Piatra Pitularii  +6";}
         if($socket0==28040)
         {$pietra1="Piatra Magiei  +0";}
         if($socket0==28140)
         {$pietra1="Piatra Magiei  +1";}
         if($socket0==28240)
         {$pietra1="Piatra Magiei  +2";}
         if($socket0==28340)
         {$pietra1="Piatra Magiei  +3";}
         if($socket0==28440)
         {$pietra1="Piatra Magiei  +4";}
         if($socket0==28540)
         {$pietra1="Piatra Magiei  +5";}
         if($socket0==28640)
         {$pietra1="Piatra Magiei  +6";}
         if($socket0==28041)
         {$pietra1="Piatra Vitalitatii  +0";}
         if($socket0==28141)
         {$pietra1="Piatra Vitalitatii  +1";}
         if($socket0==28241)
         {$pietra1="Piatra Vitalitatii +2";}
         if($socket0==28341)
         {$pietra1="Piatra Vitalitatii +3";}
         if($socket0==28441)
         {$pietra1="Piatra Vitalitatii +4";}
         if($socket0==28541)
         {$pietra1="Piatra Vitalitatii +5";}
         if($socket0==28641)
         {$pietra1="Piatra Vitalitatii +6";}
         if($socket0==28042)
         {$pietra1="Piatra Apararii +0";}
         if($socket0==28142)
         {$pietra1="Piatra Apararii +1";}
         if($socket0==28242)
         {$pietra1="Piatra Apararii +2";}
         if($socket0==28342)
         {$pietra1="Piatra Apararii +3";}
         if($socket0==28442)
         {$pietra1="Piatra Apararii +4";}
         if($socket0==28542)
         {$pietra1="Piatra Apararii +5";}
         if($socket0==28642)
         {$pietra1="Piatra Apararii +6";}
         if($socket0==28043)
         {$pietra1="Piatra Grabei +0";}
         if($socket0==28143)
         {$pietra1="Piatra Grabei +1";}
         if($socket0==28243)
         {$pietra1="Piatra Grabei +2";}
         if($socket0==28343)
         {$pietra1="Piatra Grabei +3";}
         if($socket0==28443)
         {$pietra1="Piatra Grabei +4";}
         if($socket0==28543)
         {$pietra1="Piatra Grabei +5";}
         if($socket0==28643)
         {$pietra1="Piatra Grabei +6";}
         if($socket0==28000)
         {$pietra1="Piatra Masacrului(piatra GM) +0";}
         if($socket0==28100)
         {$pietra1="Piatra Masacrului(piatra GM) +1";}
         if($socket0==28200)
         {$pietra1="Piatra Masacrului(piatra GM) +2";}
         if($socket0==28300)
         {$pietra1="Piatra Masacrului(piatra GM) +3";}
         if($socket0==28004)
         {$pietra1="Piatra MasacruluPiatra Paranoia(piatra GM) +0";}
         if($socket0==28104)
         {$pietra1="Piatra Paranoia(piatra GM) +1";}
         if($socket0==28204)
         {$pietra1="Piatra Paranoia(piatra GM) +2";}
         if($socket0==28304)
         {$pietra1="Piatra Paranoia(piatra GM) +3";}
         if($socket0==28008)
         {$pietra1="Piatra Traumei(piatra GM) +0";}
         if($socket0==28108)
         {$pietra1="Piatra Traumei(piatra GM) +1";}
         if($socket0==28208)
         {$pietra1="Piatra Traumei(piatra GM) +2";}
         if($socket0==28308)
         {$pietra1="Piatra Traumei(piatra GM) +3";}
         if($socket0==28012)
         {$pietra1="Piatra Stupizitatii(piatra GM)' +0";}
         if($socket0==28112)
         {$pietra1="Piatra Stupizitatii(piatra GM)' +1";}
         if($socket0==28212)
         {$pietra1="Piatra Stupizitatii(piatra GM)' +2";}
         if($socket0==28312)
         {$pietra1="Piatra Stupizitatii(piatra GM)' +3";}
		 if ($socket0==28960)
		 {$pietra1="Bucata de CIOB";}
		 return $pietra1;
}
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
  function img_pietre($socket0)
{
        if($socket0==28030)
         {$pietra1="images/item/28000.png";}
         if($socket0==28130)
         {$pietra1="images/item/28000.png";}
         if($socket0==28230)
         {$pietra1="images/item/28000.png";}
         if($socket0==28330)
         {$pietra1="images/item/28000.png";}
         if($socket0==28430)
         {$pietra1="images/item/28000.png";}
         if($socket0==28530)
         {$pietra1="images/item/28000.png";}
         if($socket0==28630)
         {$pietra1="images/item/28000.png";}
         if($socket0==28031)
         {$pietra1="images/item/28001.png";}
         if($socket0==28131)
         {$pietra1="images/item/28001.png";}
         if($socket0==28231)
         {$pietra1="images/item/28001.png";}
         if($socket0==28331)
         {$pietra1="images/item/28001.png";}
         if($socket0==28431)
         {$pietra1="images/item/28001.png";}
         if($socket0==28531)
         {$pietra1="images/item/28001.png";}
         if($socket0==28631)
         {$pietra1="images/item/28001.png";}
         if($socket0==28032)
         {$pietra1="images/item/28002.png";}
         if($socket0==28132)
         {$pietra1="images/item/28002.png";}
         if($socket0==28232)
         {$pietra1="images/item/28002.png";}
         if($socket0==28332)
         {$pietra1="images/item/28002.png";}
         if($socket0==28432)
         {$pietra1="images/item/28002.png";}
         if($socket0==28532)
         {$pietra1="images/item/28002.png";}
         if($socket0==28632)
         {$pietra1="images/item/28002.png";}
         if($socket0==28033)
         {$pietra1="images/item/28003.png";}
         if($socket0==28133)
         {$pietra1="images/item/28003.png";}
         if($socket0==28233)
         {$pietra1="images/item/28003.png";}
         if($socket0==28333)
         {$pietra1="images/item/28003.png";}
         if($socket0==28433)
         {$pietra1="images/item/28003.png";}
         if($socket0==28533)
         {$pietra1="images/item/28003.png";}
         if($socket0==28633)
         {$pietra1="images/item/28003.png";}
         if($socket0==28034)
         {$pietra1="images/item/28004.png";}
         if($socket0==28134)
         {$pietra1="images/item/28004.png";}
         if($socket0==28234)
         {$pietra1="images/item/28004.png";}
         if($socket0==28334)
         {$pietra1="images/item/28004.png";}
         if($socket0==28434)
         {$pietra1="images/item/28004.png";}
         if($socket0==28534)
         {$pietra1="images/item/28004.png";}
         if($socket0==28634)
         {$pietra1="images/item/28004.png";}
         if($socket0==28035)
         {$pietra1="images/item/28005.png";}
         if($socket0==28135)
         {$pietra1="images/item/28005.png";}
         if($socket0==28235)
         {$pietra1="images/item/28005.png";}
         if($socket0==28335)
         {$pietra1="images/item/28005.png";}
         if($socket0==28435)
         {$pietra1="images/item/28005.png";}
         if($socket0==28535)
         {$pietra1="images/item/28005.png";}
         if($socket0==28635)
         {$pietra1="images/item/28005.png";}
         if($socket0==28036)
         {$pietra1="images/item/28006.png";}
         if($socket0==28136)
         {$pietra1="images/item/28006.png";}
         if($socket0==28236)
         {$pietra1="images/item/28006.png";}
         if($socket0==28336)
         {$pietra1="images/item/28006.png";}
         if($socket0==28436)
         {$pietra1="images/item/28006.png";}
         if($socket0==28536)
         {$pietra1="images/item/28006.png";}
         if($socket0==28636)
         {$pietra1="images/item/28006.png";}
         if($socket0==28037)
         {$pietra1="images/item/28007.png";}
         if($socket0==28137)
         {$pietra1="images/item/28007.png";}
         if($socket0==28237)
         {$pietra1="images/item/28007.png";}
         if($socket0==28337)
         {$pietra1="images/item/28007.png";}
         if($socket0==28437)
         {$pietra1="images/item/28007.png";}
         if($socket0==28537)
         {$pietra1="images/item/28007.png";}
         if($socket0==28637)
         {$pietra1="images/item/28007.png";}
         if($socket0==28038)
         {$pietra1="images/item/28008.png";}
         if($socket0==28138)
         {$pietra1="images/item/28008.png";}
         if($socket0==28238)
         {$pietra1="images/item/28008.png";}
         if($socket0==28338)
         {$pietra1="images/item/28008.png";}
         if($socket0==28438)
         {$pietra1="images/item/28008.png";}
         if($socket0==28538)
         {$pietra1="images/item/28008.png";}
         if($socket0==28638)
         {$pietra1="images/item/28008.png";}
         if($socket0==28039)
         {$pietra1="images/item/28009.png";}
         if($socket0==28139)
         {$pietra1="images/item/28009.png";}
         if($socket0==28239)
         {$pietra1="images/item/28009.png";}
         if($socket0==28339)
         {$pietra1="images/item/28009.png3";}
         if($socket0==28439)
         {$pietra1="images/item/28009.png";}
         if($socket0==28539)
         {$pietra1="images/item/28009.png";}
         if($socket0==28639)
         {$pietra1="images/item/28009.png";}
         if($socket0==28040)
         {$pietra1="images/item/28010.png";}
         if($socket0==28140)
         {$pietra1="images/item/28010.png";}
         if($socket0==28240)
         {$pietra1="images/item/28010.png";}
         if($socket0==28340)
         {$pietra1="images/item/28010.png";}
         if($socket0==28440)
         {$pietra1="images/item/28010.png";}
         if($socket0==28540)
         {$pietra1="images/item/28010.png";}
         if($socket0==28640)
         {$pietra1="images/item/28010.png";}
         if($socket0==28041)
         {$pietra1="images/item/28011.png";}
         if($socket0==28141)
         {$pietra1="images/item/28011.png";}
         if($socket0==28241)
         {$pietra1="images/item/28011.png";}
         if($socket0==28341)
         {$pietra1="images/item/28011.png";}
         if($socket0==28441)
         {$pietra1="images/item/28011.png";}
         if($socket0==28541)
         {$pietra1="images/item/28011.png";}
         if($socket0==28641)
         {$pietra1="images/item/28011.png";}
         if($socket0==28042)
         {$pietra1="images/item/28012.png";}
         if($socket0==28142)
         {$pietra1="images/item/28012.png";}
         if($socket0==28242)
         {$pietra1="images/item/28012.png";}
         if($socket0==28342)
         {$pietra1="images/item/28012.png";}
         if($socket0==28442)
         {$pietra1="images/item/28012.png";}
         if($socket0==28542)
         {$pietra1="images/item/28012.png";}
         if($socket0==28642)
         {$pietra1="images/item/28012.png";}
         if($socket0==28043)
         {$pietra1="images/item/28013.png";}
         if($socket0==28143)
         {$pietra1="images/item/28013.png";}
         if($socket0==28243)
         {$pietra1="images/item/28013.png";}
         if($socket0==28343)
         {$pietra1="images/item/28013.png";}
         if($socket0==28443)
         {$pietra1="images/item/28013.png";}
         if($socket0==28543)
         {$pietra1="images/item/28013.png";}
         if($socket0==28643)
         {$pietra1="images/item/28013.png";}
         if($socket0==28000)
         {$pietra1="images/item/28004.png";}
         if($socket0==28100)
         {$pietra1="images/item/28004.png";}
         if($socket0==28200)
         {$pietra1="images/item/28004.png";}
         if($socket0==28300)
         {$pietra1="images/item/28004.png";}
         if($socket0==28004)
         {$pietra1="images/item/28005.png";}
         if($socket0==28104)
         {$pietra1="images/item/28005.png";}
         if($socket0==28204)
         {$pietra1="images/item/28005.png";}
         if($socket0==28304)
         {$pietra1="images/item/28005.png";}
         if($socket0==28008)
         {$pietra1="images/item/28006.png";}
         if($socket0==28108)
         {$pietra1="images/item/28006.png";}
         if($socket0==28208)
         {$pietra1="images/item/28006.png";}
         if($socket0==28308)
         {$pietra1="images/item/28006.png";}
         if($socket0==28012)
         {$pietra1="images/item/28007.png";}
         if($socket0==28112)
         {$pietra1="images/item/28007.png1";}
         if($socket0==28212)
         {$pietra1="images/item/28007.png";}
         if($socket0==28312)
         {$pietra1="images/item/28007.png";}
		 if ($socket0==28960)
		 {$pietra1="images/item/28960.png";}
		 return $pietra1;

}
?>
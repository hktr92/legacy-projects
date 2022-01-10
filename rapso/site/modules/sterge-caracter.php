<h4>STERGE CARACTER :</h4>
<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	if(!isset($_GET['id']) || empty($_GET['id']))
	{
		echo 'Nu ai specificat nici un caracter.';
	}
	else
	{
		$id = (int)$_GET['id'];
		$cont = mysql_fetch_object(mysql_query("SELECT * FROM account.account WHERE login='{$_SESSION['user']}'"));
		$caracter = mysql_fetch_object(mysql_query("SELECT * FROM player.player WHERE id='{$id}'"));
		$index = mysql_fetch_object(mysql_query("SELECT * FROM player.player_index WHERE id='{$cont->id}'"));
		if($cont->status != "OK")
		{
			echo 'Contul tau este blocat.';
		}
		elseif($cont->id != $caracter->account_id)
		{
			echo 'Caracterul specificat nu apartine contului tau.';
		}
		else
		{
			if(isset($_POST['idcard']) && !empty($_POST['idcard']) && strlen($_POST['idcard']) == 7)
			{
				$code = replace($_POST['idcard']);
				if($code != $cont->social_id)
				{
					echo 'Codul de stergere introdus este gresit.';
				}
				else
				{
					$row_id = 0;
					if($caracter->id == $index->pid1) $row_id=1;
					if($caracter->id == $index->pid2) $row_id=2;
					if($caracter->id == $index->pid3) $row_id=3;
					if($caracter->id == $index->pid4) $row_id=4;

					if($row_id == 0)
					{
						echo 'Se pare ca acest caracter nu iti apartine. Dar cum ai ajuns aici?<br>
						IP-ul tau a fost trimis impreuna cu un raport spre baza de date.';
					}
					else
					{
						$sql = mysql_query("UPDATE player.player_index SET pid".$row_id."='0' WHERE id='{$cont->id}' AND pid".$row_id."='{$caracter->id}'");
						if($sql)
						{
							$sql2 = mysql_query("DELETE FROM player.player WHERE id='{$caracter->id}'");
							if($sql2)
							{
								echo 'Caracterul a fost sters cu succes.';
							}
							else
							{
								echo '[CODE00] Caracterul NU a fost sters. Va rugam sa raportati unui admin acest lucru.';
							}
						}
						else
						{
							echo 'Caracterul NU a fost sters. Va rugam sa reincercati.';
						}
					}
				}
			}
			elseif(isset($_POST['idcard']) && (empty($_POST['idcard']) || strlen($_POST['idcard']) != 7))
			{
				echo 'Codul de stergere introdus este invalid.';
			}
			else
			{
			?>
				<table border="0" cellspacing="4" cellpadding="0" width="100%">			<!-- character list -->
					<tr>
	                    <td width="60" rowspan="3" align="center"  ><img src="images/clase/<?=$caracter->job?>.png" width="27" height="50" /></td>
	                    <td width="244" align="left" class="iR_name" ><?=$caracter->name?></td>
	                    <td width="176" align="left" class="iR_stats" >Putere : <?=$caracter->st?></td>
	                    <td width="183" align="left" class="iR_stats" >Inteligenta : <?=$caracter->iq?></td>
	                    <td width="225" align="left" class="iR_stats" ><?php clasa_c($caracter->job)?></td>
	                </tr>
	                <tr>
	                    <td align="left" class="iR_class">Level <?=$caracter->level?></td>
	                    <td align="left" class="iR_stats">Agilitate : <?=$caracter->dx?></td>
	                    <td align="left" class="iR_stats">Vitalitate : <?=$caracter->ht?></td>
	                    <td align="left" class="iR_stats">Regat : <?=nume_regat($index->empire)?></td>
	                </tr>
	                <tr>
	                    <td align="left" class="iR_class"><?=$caracter->playtime?> minute online</td>
	                    <td align="left" class="iR_stats">Exp : <?=$caracter->exp?></td>
	                    <td align="left" class="iR_stats">Yang : <?=$caracter->gold?></td>
	                    <td align="left" class="collect"></td>
	                </tr>
	                <tr>
	                    </tr>
	                    <tr>
	                    <td colspan="6" style="border-top:1px dotted #946767;" height="4"></td>
	                </tr>
              	</table>
              	<p>
              		<form name="delete_frm" method="post" action="" id="deleteChar">
              			<table border="0" cellspacing="10" cellpadding="0" width="100%" style="margin-top: 10px;" align="center">
              				<tr>
							<td align="left" style="padding-left: 24px;">Cod stergere caractere</td>
							<td align="left"><span class="iRg_inf">
								<input name="idcard" type="text" class="iRg_input" id="username2" onblur="return check_username();" maxlength="7" required="required"/>
							</span></td>
							</tr>
							<tr>
							<td colspan="3" align="center"><input type="submit" id="delete" name="delete" value="Sterge caracter" class="buton" /></td>
							</tr>
						</table>
              	</p>
			<?php
			}
		}
	}
}
else
{
	echo "Acces restrictionat!";
}
?>
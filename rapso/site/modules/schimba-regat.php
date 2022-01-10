<h4>SCHIMBA REGAT :</h4>
<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	$cont = mysql_fetch_object(mysql_query("SELECT * FROM account.account WHERE login='{$_SESSION['user']}'"));
	$index = mysql_fetch_object(mysql_query("SELECT * FROM player.player_index WHERE id='{$cont->id}'"));
	if($cont->status != "OK")
	{
		echo 'Contul tau este blocat!';
		return;
	}
	if(!isset($_POST['empire']))
	{
?>
	<form name="change_empire_frm" method="post" action="" id="changeEmpire">
		<table border="0" cellspacing="10" cellpadding="0" width="100%" style="margin-top: 10px;" align="center">
			<tr>
			<td colspan="3" align="center">Regat curent: <br><?=($index->empire != 0) ? nume_regat($index->empire) : "fara"?></td>
			</tr>
			<tr>
			<td colspan="2" align="left" style="padding-left: 24px; text-align: center;">Alege regat nou:</td>
			<td align="left">
				<span class="iRg_inf">
					<select name="empire">
						<?=($index->empire != 1) ? '<option value="1">Rosu</option>' : ''?>
						<?=($index->empire != 2) ? '<option value="2">Galben</option>' : ''?>
						<?=($index->empire != 3) ? '<option value="3">Albastru</option>' : ''?>
					</select>
				</span>
			</tr>
			<tr>
			<td colspan="3" align="center"><input type="submit" id="delete" name="delete" value="Schimba regat" class="buton" /></td>
			</tr>
		</table>
	</form>
<?php
	}
	else
	{
		$empire = (int)$_POST['empire'];
		if($index->empire == 0)
		{
			echo 'In prezent nu esti afiliat nici unui regat.';
		}
		elseif(empty($empire) || $empire > 3 || $empire < 1 || $empire == $index->empire)
		{
			echo 'Regatul ales este invalid.';
		}
		else
		{
			$sql = mysql_query("UPDATE player.player_index SET empire='{$empire}' WHERE id='{$cont->id}'");
			if($sql)
			{
				echo 'Regatul a fost schimbat cu succes!';
			}
			else
			{
				echo 'Regatul NU a fost schimbat. Va rugam sa reincercati.';
			}
		}
	}
}
else
{
	echo 'Nu ai acces la aceasta zona.';
}
?>
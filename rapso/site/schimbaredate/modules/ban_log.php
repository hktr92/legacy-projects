<style type="text/css">
.donate_red{
border: 1px solid rgba(236, 120, 120, 0.13);
font: 11px Tahoma, "Times New Roman", Times, serif;
color: rgb(255, 255, 255);
background:#F30;
text-shadow: rgba(0, 0, 0, 0.31) 0px 1px;
padding: 5px;
}
.donate_green{
border: 1px solid rgba(236, 120, 120, 0.13);
font: 11px Tahoma, "Times New Roman", Times, serif;
color: rgb(255, 255, 255);
background:#0C0;
text-shadow: rgba(0, 0, 0, 0.31) 0px 1px;
padding: 5px;
}
</style><?php 
include("inc/drepturi.php");
if(isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['admin'] >=$drepturi['ban_log'])
{
	
	function generatePages($max, $page, $class)
	{
		if ($max>=10)
		{
			if (($page>4) && ($page<$max-3))
			{
				for ($i = 1; $i <= 3; $i++)
				{
					$data .= showPage($i,$page,$class);
				}
				$data .= '<span class="'. $class .'">...</span> ';
				for ($i = $page-1; $i <= $page+1; $i++)
				{
					$data .= showPage($i,$page,$class);
				}
				$data .= '<span class="'. $class .'">...</span> ';
				for ($i = $max-2; $i <= $max; $i++)
				{
					$data .= showPage($i,$page,$class);
				}
			}
			else
			{
				for ($i = 1; $i <= 5; $i++)
				{
					$data .= showPage($i,$page,$class);
				}
				$data .= '<span class="'. $class .'">...</span> ';
				for ($i = $max-5+1; $i <= $max; $i++)
				{
					$data .= showPage($i,$page,$class);
				}
			}
		}
		else
		{
		$max = (10 >= $max) ? $max : 10;
		for ($i = 1; $i <= $max; $i++)
		{
				$data .= showPage($i,$page,$class);
		}
		}
		return $data;
	}
		
	/**
	 * Page Style Generator .
	 * 
	 * @param int $i
	 * @param int $page
	 * @param string $class
	 * @param string $selected
	 */
	function showPage($i, $page, $class, $selected = 'pagination_selected')
	{
		if ($page==$i)
		{
			$data .= '<span class="'. $selected .'">'. $i .'</span> ';
		}
		else
		{
			global $name;
			$page = replace($_GET['page']);
			$data .= '<span  class="'. $class .'"><a href="?page='.$page.'&id='.$i.'" onclick="load()">'. $i .'</a></span> ';
		}
		return $data;
	}
	
if ((!isset($_GET['id'])) || (!is_numeric($_GET['id'])) || ($_GET['id'] < 1)) { $pagenum = 1; }
	else { $pagenum = $_GET['id']; 
	
	}
	$page_rows = 50;
	if (($pagenum > $last) && ($last > 0)) { $pagenum = $last; }
	$max = $pagenum * $page_rows;
	$min = $max - $page_rows;

	
	$result = mysql_query("SELECT * FROM web.dev_ban_log");
	

	$rows = mysql_num_rows($result);
	$last = ceil($rows/$page_rows);
$i = 0;
/////////////////////

$result2 = mysql_query("select * from web.dev_ban_log ORDER BY id desc limit ".($page_rows * ($pagenum - 1)).", ".$page_rows.""); 

//////////////////////////////////////////
if($_GET['id'] == 1 || $_GET['id'] == NULL)
{
	$nr=0;
}
else
{
	$nr = ($_GET['id']-1)*50+$nr;	
}?>
<h4>LOG BANARI / DEBANARI </h4><table width="100%" border="0">
  <tr class="top">
  <td width="18%" class="iR_stats_level">Data </td>
    <td width="18%" class="iR_stats_level">Nume </td>
    <td width="12%" class="iR_stats_level">Admin</td>
    <td width="34%" class="iR_stats_level">Motiv</td>
    <td width="18%" class="iR_stats_level">Perioada</td>
  </tr>
  <?php

  while($ban = mysql_fetch_object($result2))
  {
	  if($ban->durata != "UNBANNED")
	  {
		 $clasa = "donate_red";    
	  }
	  else
	  {
		  $clasa = "donate_green";  
	  }
	  if($ban->durata == "PERMANENT" || $ban->durata=="UNBANNED")
	  {
		$durata = $ban->durata;  
	  }
	  else
	  {
		$durata = date('d/m/Y', $ban->durata);;  
	  }
  ?>
  <tr class="top">
  <td class="iR_stats_reset"><?=$ban->data?></td>
    <td class="iR_stats_reset"><?=$ban->player?></td>
    <td class="iR_stats_reset"><?=$ban->admin?></td>
    <td class="iR_stats_reset"><?=$ban->motiv?></td>
    <td class="<?=$clasa?>"><?=$durata?></td>
  </tr>
    <?php
} 
?>
</table>
<?php
echo "<br>";
echo "<div align='center'>";
	echo generatePages($last, $pagenum, "pagination");
	echo "</font></div>";
?>

   <br>
   <?php } else { echo error("Zona restrictionata.Drepturi de acces insuficiente.");}?><a href="index.php?page=panou-admin">&laquo; Inapoi la panou administrare</a>
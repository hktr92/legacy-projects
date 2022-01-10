<?PHP
  if($_SESSION['user_admin']>=9) {
?>
<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Statistiken</h3>
        <div class="big-line"></div>
        <?php
            $query = "SELECT `amount` FROM `homepage`.`amazon_vouchers`";
            $result = mysql_query($query, $sqlHp);
            
            $gesamt_amazon = 0;
            while($row = mysql_fetch_array($result)) {
                $gesamt_amazon += $row["amount"];
            }
            
            $query = "SELECT `psc_betrag` FROM `homepage`.`psc_log`";
            $result = mysql_query($query, $sqlHp);
            
            $gesamt_foreign = 0;
            while($row = mysql_fetch_array($result)) {
                $gesamt_foreign += $row["psc_betrag"];
            }
            
            $query = "SELECT `psc_betrag` FROM `homepage`.`psc_log_copy` WHERE `waehrung`='EUR'";
            $result = mysql_query($query, $sqlHp);
            
            $gesamt_old = 0;
            while($row = mysql_fetch_array($result)) {
                $gesamt_old += $row["psc_betrag"];
            }
            
            $query = "SELECT `psc_betrag` FROM `homepage`.`psc_log_copy` WHERE `waehrung`='CHF'";
            $result = mysql_query($query, $sqlHp);
            
            $gesamt_chf = 0;
            while($row = mysql_fetch_array($result)) {
                $gesamt_chf += $row["psc_betrag"];
            }
            
            $gesamt_chf_eur = 0.8 * $gesamt_chf;
            
            $gesamt = $gesamt_amazon + $gesamt_foreign + $gesamt_old;
            
            $query = "SELECT `id` FROM `player`.`player`";
            $result = mysql_query($query, $sqlServ);
            $chars = mysql_num_rows($result);
            
            $query = "SELECT `id` FROM `account`.`account`";
            $result = mysql_query($query, $sqlServ);
            $accounts = mysql_num_rows($result);
            
            $query = "SELECT `id` FROM `account`.`account` WHERE `status`='OK'";
            $result = mysql_query($query, $sqlServ);
            $accounts_ok = mysql_num_rows($result);
            
            $query = "SELECT `id` FROM `account`.`account` WHERE `status`='BUSY'";
            $result = mysql_query($query, $sqlServ);
            $accounts_busy = mysql_num_rows($result);
            
            $query = "SELECT `id` FROM `account`.`account` WHERE `status`='BLOCK'";
            $result = mysql_query($query, $sqlServ);
            $accounts_block = mysql_num_rows($result);
        ?>
        <b>Einnahmen an Amazon-Gutscheinen: <?=$gesamt_amazon?>.00 EUR</b><br />
        <b>Einnahmen an ausländischen PSC's: <?=$gesamt_foreign?>.00 EUR</b><br />
        <b>Alte Einnahmen: <?=$gesamt_old?>.00 EUR</b><br />
        <b>Gesamte Einnahmen an EUR: <?=$gesamt?>.00 EUR</b><br /><br />
        <b>CHF Einnahmen: <?=$gesamt_chf?>.00 CHF</b><br />
        <b>CHF Einnahmen in EUR: <?=$gesamt_chf_eur?>.00 EUR</b><br />
        <b>Gesamte Einnahmen: <?=$gesamt+$gesamt_chf_eur?>.00 EUR</b><br /><br />
        <b>Anzahl von Characktere: <?=$chars?></b><br />
        <b>Anzahl von Accounts: <?=$accounts?></b><br />
        <b>Anzahl von Accounts (OK): <?=$accounts_ok?></b><br />
        <b>Anzahl von Accounts (BUSY): <?=$accounts_busy?></b><br />
        <b>Anzahl von Accounts (BLOCK): <?=$accounts_block?></b><br />
        <b>Anzahl von Accounts mit unbekannten Status: <?=$accounts - $accounts_ok - $accounts_busy - $accounts_block?></b>
    </div>
    <div class="bottom"></div>
</div>
<?php
  }
?>
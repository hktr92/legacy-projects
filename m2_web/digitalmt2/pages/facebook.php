<div style="margin-top: 70px;" class="box">
    <div class="top"></div>
    <div class="middle">
        <h3>Like 4 Us</h3>
        <div class="big-line"></div>
        <?php
            if(isset($_SESSION['user_admin']) && checkInt($_SESSION['user_admin']) && $_SESSION['user_admin']>=0) {
                //the id of the facebook page
                $pageid = '';
                //the coins to get
                $coins = "2000";
                //the column name for the coins
                $votecoins_table = "vote_coins";
                //need to change to the session on release
                $account_id = $_SESSION['user_id'];
                //for cloudflare ip fix
                $ip = $_SERVER['REMOTE_ADDR'];
                
                //Information can get from the developer center of facebook
                $app_id = '';
                $app_secret = '';

                //The link to the current page
                $my_url = 'https://www.facebook.com/pages/DigitalMetin2';

                $code = $_REQUEST["code"];

                // auth user
                if(empty($code)) {
                        $dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
                                . $app_id . '&redirect_uri=' . urlencode($my_url) ;
                        echo "Te rog asteapta...";
                        echo("<script>top.location.href='" . $dialog_url . "'</script>");
                } else {
                    // get user access_token
                    $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
                            . $app_id . '&redirect_uri=' . urlencode($my_url) 
                            . '&client_secret=' . $app_secret 
                            . '&code=' . $code;

                    // response is of the format "access_token=AAAC..."
                    $access_token = substr(file_get_contents($token_url), 13);

                    // run fql query
                    $query = "SELECT page_id, profile_section FROM page_fan WHERE page_id=" . $pageid . " AND uid=me()";
                    $fql_query_url = 'https://graph.facebook.com/'
                            . 'fql?q=' . urlencode($query)
                            . '&access_token=' . $access_token;

                    $fql_query_result = file_get_contents($fql_query_url);
                    $fql_query_obj = json_decode($fql_query_result, true);

                    if(count($fql_query_obj["data"]) == 1)
                    {
                            // get facebook name
                            $query = "SELECT uid,name,pic FROM user WHERE uid=me()";
                            $fql_query_url_2 = 'https://graph.facebook.com/'
                            . 'fql?q=' . urlencode($query)
                            . '&access_token=' . $access_token;

                            $fql_query_result_2 = file_get_contents($fql_query_url_2);
                            $fql_query_obj_2 = json_decode($fql_query_result_2, true);

                            $facebook_name = $fql_query_obj_2["data"][0]["name"];

                            $query = "SELECT * FROM `homepage`.`facebook` WHERE `account_name`='" . $account_name . "' or `ip`='" . $ip . "' or `facebook_name`='" . $facebook_name . "'";
                            $result = mysql_query($query, $sqlServ);
                            if(mysql_num_rows($result) != 0)
                                    echo "Du hast bereits Vote-Coins bekommen. Beachte das du nur einmal pro Shiro2-Account, pro Facebook Account und nur einmal pro IP Coins bekommen kannst.";
                            else {
                                    $query = "INSERT INTO `homepage`.`facebook`(`account_name`, `facebook_name`, `ip`) VALUES('" . $account_name . "', '" . $facebook_name . "', '" . $ip . "')";
                                    mysql_query($query, $sqlServ);
                                    $query = "UPDATE `account`.`account` SET `" . $votecoins_table . "`=`" . $votecoins_table . "`+" . $coins . " WHERE `id`='" . $account_id . "'";
                                    mysql_query($query, $sqlServ);

                                    $_SESSION['user_vote_coins'] += $coins;

                                    echo "Danke " . $facebook_name . " ai primit " . $coins . " Vote-Coins .";
                            }
                    }
                    else
                    {
                            echo "Te rog dane un like!";
                    }
                }
            } else {
        ?>
        <p class="meldung">Trebuie să fii logat pentru acest domeniu.</p>
        <?php
            }
        ?>
    </div>
    <div class="bottom"></div>
</div>
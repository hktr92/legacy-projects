<?php
/*
Copyright (c) 2014 Petru "hacktor" S.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
 */

// Includem configuratia globala
require_once __DIR__.'/backend/functions/functions.php';
require_once __DIR__.'/backend/functions/metin2.php';

// Includem clasele
function __autoload($class) {
  $file = sprintf('%s/backend/classes/%s.php', __DIR__, $class);
  require_once $file;
}

// Initiem clasa Async2
$async2 = new Async2(true);

// Mediul de dezvoltare al script-urilor.
// cli-server este serverul web integrat in php.
if (php_sapi_name() == "cli-server" && $async2->isDebug()) {
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
} else {
  error_reporting(0);
  ini_set('display_errors', 'Off');
}

// Definim ID-ul sesiunii.
session_id(hash('sha512', $async2->getConfig('session', 'name')));

// Definim numele sesiunii
session_name($async2->getConfig('session', 'name'));

// Definim calea de salvare a sesiunii
session_save_path($async2->getConfig('session', 'savePath'));

// Definim timpul de expirare al cache-ului
session_cache_expire($async2->getConfig('session', 'expireTimeout'));

// Definim limitarea cache
session_cache_limiter($async2->getConfig('session', 'cacheLimiter'));

// Definim parametrii unui cookie
session_set_cookie_params(
  $async2->getConfig('session', 'expireTimeout'),
  $async2->getConfig('session', 'cookiePath'),
  $async2->getConfig('session', 'cookieDomain'),
  $async2->getConfig('session', 'cookieSecure'),
  $async2->getConfig('session', 'cookieHttponly')
);

// Initiem sesiunea
session_start();

// Definim tipul de continut
header('Content-Type: text/html');

// Initiem conexiunea la serverul MySQL
$db = new MySQLi(
  $async2->getConfig('database', 'hostname'),
  $async2->getConfig('database', 'username'),
  $async2->getConfig('database', 'password'),
  $async2->getConfig('database', 'database'),
  $async2->getConfig('database', 'dataport'),
  $async2->getConfig('database', 'dbsocket')
);
$db->set_charset($async2->getConfig('database', 'xcharset'));

// Adaugam SQL Debug Trace daca modul debug este activ
if ($async2->isDebug()) {
  $db->debug(__DIR__.'/backend/safelocker/dev/mysql.trace');
}

// Verificam daca conexiunea la server s-a efectuat
if ($db->error) {
  $error = sprintf(
    'Conexiunea la serverul MySQL (%s:%d socket %s) a esuat.',
    $async2->getConfig('database', 'hostname'),
    $async2->getConfig('database', 'dataport'),
    $async2->getConfig('database', 'dbsocket')
  );

  // Facem dump la eroare
  if ($async2->isDebug()) {
    $db->dump_debug_info();
  }

  criticalError($error);
}

// Includem sablonul predefinit
require_once __DIR__.'/backend/templates/pages/home.php';

// Incheiem sesiunea
session_write_close();

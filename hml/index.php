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

/**
 * Login script
 */

require_once __DIR__.'/backend/functions.php';
function __autoload($class) {
  $file = sprintf('%s/classes/%s.php', __DIR__, $class);
  require_once $file;
}

session_start();
header('Content-Type: text/html');

if (php_sapi_name() == 'cli-server') {
  error_reporting(E_ALL);
} else {
  error_reporting(0);
}

$dbinfo = [
  'hostname' => 'localhost',
  'username' => 'hml',
  'password' => 'hml',
  'database' => 'hml',
  'xcharset' => 'utf8',
];

$db = new MySQLi($dbinfo['hostname'], $dbinfo['username'], $dbinfo['password'], $dbinfo['database']);
$db->set_charset($dbinfo['xcharset']);

if ($db->errno) {
  throw new Exception('Unable to comply the MySQL link.');
  error_log($db->error);
}

$registry = new Async();
$account = new Account($db);
$router = new Router();

$page = isset($_GET['page']) ? sanitize($_GET['page']) : null;

switch ($page) {
  case 'auth':
    if (isset($_POST['auth'])) {
      $auth = $account->login($_POST['username'], $_POST['password']);
      if ($auth) {
        redirect('index', 'php?page=panel');
      }
    }

    require_once __DIR__.'/template/auth.php';

  case 'panel':
    if (!$registry->exists('m2.username')) {
      require_once __DIR__.'/template/access_denied.php';
      exit;
    }

    require_once __DIR__.'/template/panel.php';

  default:
    require_once __DIR__.'/template/home.php';
}

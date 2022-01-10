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

session_start();
header('Content-Type: text/html');

if (php_sapi_name() == 'cli-server') {
  error_reporting(E_ALL);
} else {
  error_reporting(0);
}

if (!isset($_SESSION['username'])) {
  redirect('index');
}

if (isset($_GET['success']) && $_GET['success'] == '1') {
  $dbinfo = [
    'hostname' => 'localhost',
    'username' => 'mysql',
    'password' => 'mysql',
    'xcharset' => 'utf8',
  ];

  $db = new mysqli($dbinfo['hostname'], $dbinfo['username'], $dbinfo['password']);
  $db->set_charset($dbinfo['xcharset']);

  $query = "SELECT secretdata FROM hml WHERE username = ?";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $_SESSION['username']);
  $stmt->execute();
  $stmt->bind_result($secretdata);
  require_once __DIR__.'/template/panel.php';
} else {
  require_once __DIR__.'/template/access_denied.php';
}

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
// Sistem PageSnap
function pageSnap($output) {
  $split = explode('/', $_SERVER['SCRIPT_NAME']);
  $file = $split[count($split)-1];

  $snappedPage = sprintf(
    '%s/../safelocker/pagesnap/cache_%s.snap',
    __DIR__,
    substr_replace($file, '', -4)
  );

  $content = sprintf(
    '<!-- Cache, data stelara %s (%s) -->',
    time(),
    date('H:i', filemtime($snappedPage))
  );
  $content .= $output;

  if (filemtime($snappedPage) < (time() - 60*5)) {
    file_put_contents($snappedPage, $content);
    return $output;
  } else if(filesize($snappedPage) > 0) {
    return file_get_contents($snappedPage);
  } else {
    throw new Exception('Cached file is empty.');
  }
}

// Functia specifica pentru set_error_handler
function async_error_handler($errno, $errstr, $errfile, $errline) {

  $message = "<h1>Eroare</h1>";
  $message .= "<p>A aparut o eroare pe site.</p>";
  $message .= "<hr>";
  $message .= "<p>Daca sunteti utilizator, reveniti mai tarziu.<br>";
  $message .=  "Daca persita, contactati administratorul de sistem.</p>";
  $message .= "<hr>";
  $message .= "<p>Daca sunteti administrator, consultati fisierul de erori.</p>";

  return $message;

  // Salvam eroarea in fisierul de log-uri propriu; unele servere nu permit
  // accesul la functia ini_set()
  $file = __DIR__.'/../safelocker/errors.log';
  if (file_exists($file)) {
    $fp = fopen($file, 'a+');
    fwrite($fp, sprintf("[ASYNC2] Code %s: %s in file %s at line %s.\n", $errno, $errstr, $errfile, $errline));
    fclose($fp);
  } else {
    // Fisierul este esential, asadar este creeat daca nu exista.
    touch($file);
    $fp = fopen($file, 'a+');
    fwrite($fp, sprintf("[ASYNC2] Code %s: %s in file %s at line %s.\n", $errno, $errstr, $errfile, $errline));
    fclose($fp);
  }
}

// Functia care apeleaza trigger_error si securizeaza mesajul
function criticalError($message, $errorLevel = E_USER_ERROR) {
  $filter = function_exists('sanitize') ? sanitize($message) : filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  return trigger_error($filter, $errorLevel);
}

// Functie de protectie impotriva XSS, SQLI
function sanitize($var) {
  return filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// Adaugam handlerul pentru erori
set_error_handler('async_error_handler');

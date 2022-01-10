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

// Interfata web pentru Metin2 API
// Functie preluata de pe epvp
// Adaptat pentru OOP + user-friendly
class GameAPI {
  protected $_socket;
  protected $_password;

  // Initiem clasa
  public function __construct($hostname, $password, $port = 13000) {
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket < 0) {
      throw new Exception('Invalid socket definition.');
      exit;
    }

    // definim obiectul socket si parola
    $this->_socket = socket_connect($socket, $hostname, $port);
    $this->_password = $password;
  }

  // Executam un query spre socket si returnam rezultatul
  public function socketQuery($socketQuery) {
    $queryFormat = '\x40%s %s\x0A';
    $queryParts = explode('::', $socketQuery);

    if ($queryParts[0] == 'USER_COUNT') {
      return $this->countUsers();
    }

    $passwd = sprintf($queryFormat, $this->_password);
    $send = socket_write($this->_socket, $passwd, strlen($passwd));
    socket_recv($this->_socket, $send, 256, 0);

    $query = sprintf($queryFormat, $queryParts[0], $queryParts[1]);

    $results = socket_write($this->_socket, $queryParts[0], strlen($queryParts[0]));

    if ($results > 0) {
      return socket_recv($this->_socket, $results, 256, 0);
    } else {
      throw new Exception('Socket query failed.');
    }
  }

  // Preluam numarul de jucatori conectati
  public function countUsers() {
    $query = '\x40USER_COUNT\x0A';
    $send = socket_write($this->_socket, $query, strlen($query));

    return socket_recv($this->_socket, $send, 256, 0);
  }

  // Trimite un mesaj /notice pe server
  public static function sendNotice($text) {
    $query = $this->socketQuery(sprintf('NOTICE::%s', $text));
    return $query;
  }

  // Elimina un jucator de pe server
  public static function kickPlayer($playerName) {
    $query = $this->socketQuery(sprintf('DC::%s', strtolower($playerName)));
    return $query;
  }

  // Interzice accesul (temporar) la chat la un jucator
  public static function mutePlayer($playerName, $time) {
    return $this->socketQuery(sprintf('BLOCK_CHAT::%s %d', $playerName, $time));
  }

  // Adauga exceptie pentru interzicerea accesului la chat
  public static function muteException($playerName) {
    return $this->socketQuery(sprintf('BLOCK_EXCEPTION::%s', $playerName));
  }

  // Seteaza un bonus per regat
  public static function setBonus($empire, $type, $value, $duration) {
    return $this->socketQuery(sprintf('PRIV_EMPIRE::%d %d %d %d', $empire, $type, $value, $duration));
  }

  // Seteaza un event flag (ex: ninsoare, zi / noapte etc)
  // TODO: check pentru valori stricte (1 sau 0) (?)
  public static function setEventFlag($flagName, $value) {
    if (is_int($value) && $value == 1 || $value == 0) {
      return $this->socketQuery(sprintf('EVENT::%s %d', $flagName, $value));
    } else {
      throw new Exception('The time must be an int.');
    }
  }

  // Verifica daca channel-ul este deschis sau nu
  public static function isServerUp() {
    return $this->socketQuery('IS_SERVER_UP::');
  }

  // Echivalentul /reload
  public static function reload() {
    return $this->socketQuery('RELOAD::');
  }

  // Echivalentul /shutdown
  public static function shutdownServer() {
    return $this->socketQuery('SHUTDOWN::');
  }

  // User-friendly: seteaza timpul pe server
  public static function setTime($time) {
    return self::setEventFlag('x', $time);
  }

  // User-friendly: seteaza ninsoarea pe server
  public static function letItSnow($status) {
    return self::setEventFlag('xmas_snow', $status);
  }

  // Inchidem socket-ul la finalul clasei (custom)
  public function __destruct() {
    socket_close($this->_socket);
  }
}

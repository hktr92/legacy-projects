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

class Account extends Async {
  private $_db;
  public $username;
  public $email;

  public function __construct(MySQLi $db) {
    $this->_db = $db;
  }

  public function login($username, $password) {
    try {
      $username = sanitize($username);
      $password = sanitize($password);

      $query = "
        SELECT
          login, email
        FROM
          account
        WHERE
          login = ?
          AND password = PASSWORD(?)
      ";

      $stmt = $this->_db->prepare($query);
      $stmt->bind_param('ss', $username, $password);
      $stmt->execute();
      $stmt->bind_result($this->username, $this->email);

      if (is_null($this->username) && is_null($this->email)) {
        // error handling
        $retval = 'The username is invalid.';
        throw new Exception($retval);
      }

      // FIXME o clasa pe post de registru
      $this->set('m2.username', $username);
      $retval = true;

      return $retval;
    } catch (Exception $e) {
      error_log($e->getMessage());
    }
  }
}

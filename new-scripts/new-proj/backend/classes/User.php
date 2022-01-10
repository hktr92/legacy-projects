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

class User {
  public $userdata;

  protected $_db;
  protected $_app;

  public function __construct(MySQLi $db, Async2 $app) {
    $this->_db = $db;
    $this->_app = $app;
  }

  public function login($username, $password) {
    $username = sanitize($username);
    $password = sanitize($password);

    $query = <<<SQL
      SELECT
        id,
        login,
        email,
        web_admin
      FROM
        `account`.`account`
      WHERE
        `login` = ?
        AND
          `password` = ?
    SQL;

    $stmt = $this->_db->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result(
      $this->userdata['user_id']
      $this->userdata['username'],
      $this->userdata['email'],
      $this->userdata['web_admin']
    );

    if (!empty($this->userdata) && is_array($this->userdata)) {
      $_SESSION['username'] = $this->userdata['username'];
      $_SESSION['admin_rank'] = $this->userdata['web_admin'];

      return $this->_app->redirect('index', 'php#success');
    } else {
      return $this->_app->redirect('login', 'php#failed');
    }
  }

  /*
  public function getMyChars() {
    $query = <<<SQL
      SELECT
        `name`
      FROM
        `player`.`player`
      WHERE
        account_id = ?
    SQL;

    $stmt = $this->_db->prepare($query);
    $stmt->bind_param('i', $this->userdata['user_id']);
    $stmt->execute();
    $stmt->bind_result($this->userdata['chars']);

    return $this->userdata['chars'];
  }
  */

  public function forgotSomething($action) {
    switch ($action) {
      case 'username':
        break;
      case 'password':
        break;
      case 'email':
        break;
      default:
        break;
    }
  }

  public function changeSomething($action) {
    switch ($action) {
      case 'password':
      case 'socialCode':
      case 'safeboxPassword':
      default:
    }
  }

  /**
   * Dezactiveaza contul pentru o perioada de timp.
   *
   * Daca timpul > $timeout, contul este sters automat.
   */

  public function disableAccount() {}
}

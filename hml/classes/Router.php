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

class Router extends Async {
  public $path;
  public $parts;

  public function __construct() {
    $this->path = $_SERVER['REQUEST_URI'];
    $this->parts = explode($this->path);
  }

  public function getRequestUri() {
    return $this->path;
  }

  public function strictMode() {
    $controller = $this->registry['router.ignore_index_file'];
    if (is_bool($controller) && $controller && $this->parts[1] == 'index.php') {
      return true;
    } else {
      return false;
    }
  }

  public function match($controller, $action) {
    if (!class_exists($controller)) {
      throw new InvalidArgumentException(sprintf('Invalid item "%s": not a class.'));
    }

    if (!method_exists($action)) {
      throw new InvalidArgumentException(sprintf('Invalid item "%s": not an action.'));
    }

    if ($this->strictMode()) {
      $match = [
        'controller' => $controller == $this->parts[1] ? $this->sanitize($this->parts[1]) : null,
        'action' => $action == $this->parts[2] ? $this->sanitize($this->parts[2]) : null,
      ];
    } else {
      $match = [
        'controller' => $controller == $this->parts[2] ? $this->sanitize($this->parts[2]) : null,
        'action' => $action == $this->parts[3] ? $this->sanitize($this->parts[3]) : null,
      ];
    }

    if ($match['controller'] && $match['action']) {
      $retval = true;
    }

    return $retval;
  }

  public function get($controller) {
    $match = explode('::', $controller);

    $validController = strpos(strtolower($match[0]), 'Controller') !== false;
    $validAction = strpos(strtolower($match[1]), 'Action') !== false;

    if ($validController && $validAction) {
      if ($this->match($match[0], $match[1])) {

      }
    }
  }
}

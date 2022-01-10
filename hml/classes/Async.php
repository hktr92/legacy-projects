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

class Async {
  public $registry = [];
  public $dev = false;

  public function __construct($devStatus = false) {
    if (is_bool($devStatus) && $devStatus) {
      $this->dev = true;
    }

    if (!is_array($this->registry)) {
      $this->registry = [];
    }
  }

  public function set($key, $value) {
    $this->registry[$key] = $value;
  }

  public function get($key) {
    if (!array_key_exists($key, $this->registry)) {
      throw new InvalidArgumentException(sprintf('The "%s" key is non-existent.', $key));
    }

    return $this->registry[$key];
  }

  public function exists($key) {
    return array_key_exists($key, $this->registry);
  }
}

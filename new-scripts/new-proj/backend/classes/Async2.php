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

class Async2 {
  public $debug;
  public $changes;
  protected $_config;

  public function __construct($debug = false) {
    if (is_bool($debug) && $debug) {
      $this->debug = true;
    } else {
      $this->debug = false;
    }
  }

  public function getChanges() {
    $this->changes = array(
      'sessions' => array(
        'name' => 'Sesiuni',
        'status' => 'Actualizat',
        'details' => 'Sesiunile sunt mai stricte, sigure, si pot fi configurate usor. De asemenea, am configurat si cookie-urile.',
      ),

      'pagesnap' => array(
        'name' => 'PageSnap',
        'status' => 'Nou|Implementat',
        'details' => 'PageSnap foloseste functiile Output Buffer. Functia ob_start() a fost apelata in vechile script-uri, dar n-a fost utilizat in mod corespunzator. Aceste script-uri folosesc Output Buffer in mod corespunzator si am extins utilizarea spre caching.',
      ),

      'mysql' => array(
        'name' => 'MySQL',
        'status' => 'Actualizat',
        'details' => 'Deoarece in PHP 5.5 extensia mysql este dezactivata, aceste script-uri folosesc noua si imbunatatita extensie mysqli. Chiar daca aparent nu este nimic deosebit, noua extensie MySQL permite utilizarea functiilor in programarea orientata pe obiect.',
      ),

      'templating' => array(
        'name' => 'Sabloane',
        'status' => 'Nou',
        'details' => 'Sistemul de sabloane este unul extrem de simplu si functioneaza numai in conjunctie cu PageSnap. Acest sistem ofera o structura mai eleganta a site-ului web si faciliteaza modificarile ulterioare asupra design-ului.',
      ),

      'theme' => array(
        'name' => 'Bootstrap',
        'status' => 'Nou',
        'details' => 'Twitter Bootstrap este un front-end framework care faciliteaza crearea design-ului initital. Twitter Bootstrap este implementat cu scop demonstrativ.',
      )
    );

    return $this->changes;
  }

  // Preluam daca mediul debug este definit
  public function isDebug() {
    return $this->debug;
  }

  public function redirect($page, $ext = 'php') {
    if (!headers_sent()) {
      return header(sprintf('Location: %s/%s.%s', $this->getConfig('site', 'siteUrl'), $page, $ext));
    }
  }

  // Preluam fisierul de configuratie sub forma unei variabile protejate
  public function getConfigurationFile() {
    $this->_config = array_merge(
    file_exists(__DIR__.'/../config/config.php') ? require_once __DIR__.'/../config/config.php' : null,
    file_exists(__DIR__.'/../config/item.php')   ? require_once __DIR__.'/../config/item.php'   : null,
    file_exists(__DIR__.'/../config/rights.php') ? require_once __DIR__.'/../config/rights.php' : null,
    file_exists(__DIR__.'/../config/site.php')   ? require_once __DIR__.'/../config/site.php'   : null
  );
  return $this->_config;
}

// Preluam obiectul specific din variabila cu configuratii
public function getConfig($category, $item) {
  empty($this->_config) ? $this->getConfigurationFile() : null;
  if (!is_null($this->_config)) {
    if (array_key_exists($category, $this->_config)) {
      $config_item_template = sprintf('%s.%s', $category, $item);
      if (in_array($config_item_template, $config[$category])) {
        return $config[$category][$config_item_template];
      } else {
        criticalError('Configuratia respectiva n-a fost gasita.');
      }
    }
  } else {
    // Fisierul config.php este vital pentru intregul sistem. Deci afisam eroare.
    criticalError('Fisierul de configuratie este inexistent.');
  }
}

public function message($string, $type = 'info') {
  return sprintf('<div class="label label-%s">%s</div>', sanitize($type), sanitize($string));
}
}

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

// Initiem Output Buffer cache
if (extension_loaded('zlib')) {
  ob_start('ob_gzhandler');
} else {
  ob_start();
}

?>
<h1>Hello World!</h1>
<p>
  Noile script-uri pentru Metin2. Este o extensie al script-urilor originale,
  imbunatatite la potentialul lor maxim si intretinut de hacktor.
</p>
<hr>
<h2>Caracteristici noi</h2>
<p>O scurta lista de noi caracteristici:</p>

<table border>
  <thead>
    <tr>
      <th width="30%">Nume caracteristica</th>
      <th width="10%">Status</th>
      <th width="60%">Explicatie</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($async2->getChanges() as $feature => $array): ?>
      <tr>
        <td><?= $async2->changes[$feature]['name'] ?></td>
        <td><?= $async2->changes[$feature]['status'] ?></td>
        <td><?= $async2->changes[$feature]['details'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php

$content = ob_get_clean();
$page = 'Home';

require_once __DIR__.'/../layout.php';

?>

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
return array(
  'session' => array(
    // Numele sesiunii actuale.
    'name' => 'hackmylife',

    // Calea unde se salveaza sesiunea. De obicei, in afara directorului public_html
    'savePath' => __DIR__.'/../sessions',

    // Tipul de limitare al cache.
    //  nocache - nu se salveaza nimic in cache
    //  public - se salveaza totul in cache-ul client si proxy
    //  private - se salveaza totul numai in cache-ul client
    'cacheLimiter' => 'private',

    // Timpul de expirare al cache si cookie
    'expireTimeout' => 3600,

    // Calea relativa al cookie-urilor
    'cookiePath' => '/',

    // Domeniul pentru care se face cache-ul
    'cookieDomain' => 'localhost',

    // Trimiterea cookie-urilor doar prin conexiune sigura (SSL / HTTPS)
    //  true - recomandat pentru conexiunile sigure (doar HTTPS)
    //  false - recomandat pentru conexiunile nesigure (doar HTTP)
    'cookieSecure' => false,

    // Folosirea cookie-urilor in mod strict
    //  true - cookie-urile pot fi accesate numai din php
    //  false - cookie-urile pot fi accesate prin JavaScript
    'cookieHttponly' => true,
  ),

  'database' => array(
    // Hostname-ul unde este deschis MySQL
    'hostname' => 'localhost',

    // Numele de utilizator al serverului
    'username' => 'async2',

    // Parola pentru utilizator
    'password' => 'async2',

    // Baza de date predefinita
    'database' => 'async2',

    // Portul pentru server. Predefinit este 3306
    'dataport' => 3306,

    // Socket-ul pentru server.
    'dbsocket' => null,

    // Charset-ul predefinit pentru baza de date
    'xcharset' => 'utf8',
  ),

  'pageSnap' => array(

    // Timpul de expirare al cache-ului (secunde)
    'snapTimeout' => 60*60*24,
  ),
);

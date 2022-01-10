# content removed

inside this directory, there was this server's bulletin board.

i had to remove it because it was an allegedly nulled version of WoltLab Burning Board.
the only thing that survived was the WCF directory, which wa released under `GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>`

it's better safe than sorry. :) 

for historical references:
- it used smarty templates with (luckily) caching turned on. the latest cached content has the following timestamp: `(generated at Sun, 01 Sep 2013 07:03:22 +0000)`
- a file named `burningBoard.css` has the following copyright notice: `Copyright 2006-2009 by WoltLab GmbH. `
- most php files has the following copyright notice: `2001-2007 WoltLab GmbH`
- most php files used php ending tag `?>`, which we don't do it anymore
- the board's source code does not use namespaces, meaning it was written for PHP <5.3
- it was fully OOP and used the `ClassName.class.php` file names.
- the `options.inc.php` (yes, **that** naming convention) was generated at `Fri, 30 Aug 2013 23:11:29 +0000`, representing the installation date and time.
- no `composer.json`, because back then we had to copy code and include it manually.  :)
  - the bulletin board used the then-known [WoltLab Community Framework](https://github.com/WoltLab/WCF)

## personal notes
- `lurrdock` was a person that hacked private metin2 servers back then just for fun, considered the nemesis back then.
  - if I remember correctly, he was an active user of [Romanian Security Team forum](https://rstforums.com/forum/)
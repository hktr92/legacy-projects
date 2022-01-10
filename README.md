# legacy projects

>**DISCLAIMER:** CONTENTS OF THIS REPOSITORY IS PROVIDED "AS-IS" AND MAY CONTAIN LICENSED CODE WITHOUT ANY LICENSE NOTICE. I DO **NOT** RECOMMEND USING, DERIVING, RUNNING OR MAINTAINING ANY FILE FROM THIS CONTENTS DUE TO IT'S AGE. I DO NOT CLAIM ANY COPYRIGHT OR LICENSE ON ANY PROJECT LISTED HERE UNLESS MENTIONED OTHERWISE.

When I started programming back in 2013, I was a passionate Metin2 player. So I learned PHP by doing work for some server admins.

## short story about 4Metin
TL;DR: 4Metin was a huge Romanian Metin2 forum. It started way back in 2011, until me, llegolas and Robery (a friend of mine) decided to close it due to various internal and community issues.

I first registered on March 8, 2011 (on my birthday) and joined the staff as a simple Helper after few months. All I did was to provide tips and tricks about both Metin2 game and private servers. Slowly I rose up in ranks and used my php skills to teach good about web shells and other bad actors that were proeminent in that period of time. 

Around 2013, llegolas, the community's founder, contacted me and a friend of mine to help him better secure the forum. It ran on an outdated phpBB version; it was 6th time when it got hacked in a single year.

Back then, I took charge of it's code maintenance: updating the phpBB to latest 3.0.x version, maintaining MODs, changing themes and others. This work was done with the help of a guy named IPP, who's (or... was?) also an active contributor to phpBB Romanian translations team.

But shit happened back in 2014, when llegolas _did_ listen to the community, we took charge of migrating from phpBB to vBulletin. It took 3 days, but it was too late: the forum died.

Several other copy-cat forums rose from the ashes, but none of them had the same power the original one had. From all of those awesome people, it was only Robery with whom I kept communicating.

## homepages listed here
A non-exhaustive list of platforms and / or private servers:
- DigitalMt2 -- I.. can't remember exactly this one.
- Metin2Rapsodia -- patching up issues by my then-nemesis, DarkDev.
- 4Metin.ro -- the OG one that closed back in 2014 (RIP).
- joaca.4mt.ro -- it was 4Metin.ro community server. i swear i had the source code somewhere but i can't remember where... the design was cool, ngl, paid by llegolas.
- 4metin homepage -- it was a homepage paid for by the community's leader, llegolas, released for free.

There were also some initiatives to release my own metin2 homepage back then, but i never did release one.
The closest one I ever had to release was re-used in joaca.4mt.ro and llegolas asked for eclusivity, which I did.

Now that I'm thinking, I've never been a good frontend developer myself. I always focused on the backend part, with PHP. That's another reason why I never released Async2 CMS.

## legal stuff here
I know that Metin2 is a proprietary game. I was a kid when I played around with private servers.

But for this release, just to make sure, I changed the source code with following changes:
- removed any credentials found in the source code (such as: IPs, collected IPs);
- removed any database dumps I have found;
- removed any proprietary code;
- commented out any web shells i found (they were popular back then);

Some 3rd party libraries still has their license listed at the beginning of the file.

## a note about "frameworks"
there are some places where you'll find code from other devs, such as:
- unknown german developer(s) -> they provided the foundation of any metin2 homepage back then, so most of them were reskins of the same php code. probably it was from elitepvpers forum.
- [DarkDev.EU](https://web.archive.org/web/20131118191722/http://darkdev.eu/index.php?pagina=servicii) were the only ones that were different with the code.
- other individual dev(s) (including me)

## why the release?
I just found these on a backup drive and got nostalgic. Being curious about how I coded back then, I opened them.
Because most of these relied on PHP 5.2 - 5.5, all except one project (written by me, which relied on PHP 5.6) won't work anymore.

I don't want to make them work for the previews, I just want to give it for historic purposes.

## final thoughts
it was nice to relieve my childhood experiences as an adult, but from coding point... it's so painful to see that horrible spaghetti code.

it took me 3 hours to sweep through the code and exclude any TOSable code...

i think it's a nice piece of history regarding the metin2 private server scene in romania, since i grew up with it.
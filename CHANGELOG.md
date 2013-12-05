# ZeroBin version history #

  * **Alpha 0.8 (2012-04-11):**
    * Source code not published yet.
    * Interface completely redesigned. Icons added.
    * Now properly supports IE6/7 (ugly display, but it works. "Clone" button is disabled though.)
    * Added one level of depth for storage directories (This is better for higher load servers).
    * php version is now checked (min: 5.2.6)
    * Better checks on posted json data on server.
    * Added "1 year" expiration.
    * URLs are now converted to clickable links. This include http, https, ftp and magnet links.
    * Clickable links include ''rel="nofollow"'' to discourage SEO.
    * On my public service (http://sebsauvage.net/paste/)
      * All data will be deleted (you were warned - this is a test service)
      * Default paste expiration is now 1 month to prevent clogging-up my host.
  * **Alpha 0.9 (2012-04-11):**
    * Oh bummer... IE 8 is as shitty as IE6/7: Its does not seem to support ''white-space:pre-wrap'' correctly. I had to activate the special handling mode. I still have to test IE 9.
  * **Alpha 0.10 (2012-04-12):**
    * IE9 does not seem to correctly support ''pre-wrap'' either. Special handling mode activated for all version of IE<10. (Note: **ALL other browsers** correctly support this feature.) 
  * **Alpha 0.11 (2012-04-12):**
    * Automatically ignore parameters (such as &utm_source=...) added //after// the anchor by some stupid Web 2.0 services.
    * First public release.
  * **Alpha 0.12 (2012-04-18):**
    * **DISCUSSIONS !** Now you can enable discussions on your pastes. Of course, posted comments and nickname are also encrypted and the server cannot see them.
    * This feature implies a change in storage format. You will have to delete all previous pastes in your ZeroBin. 
    * Added [[php:vizhash_gd|Vizhash]] as avatars, so you can match posters IP addresses without revealing them. (Same image = same IP). Of course the IP address cannot be deduced from the Vizhash.
    * Remaining time before expiration is now displayed.
    * Explicit tags were added to CSS and jQuery selectors (eg. div#aaa instead of #aaa) to speed up browser. 
    * Better cleaning of the URL (to make sure the key is not broken by some stupid redirection service)
  * **Alpha 0.13 (2012-04-18):**
    * FIXED: ''imageantialias()'' call removed because it's not really usefull and can be a problem on most hosts (if GD is not compiled in php).
    * FIXED: $error not properly initialized in index.php
  * **Alpha 0.14 (2012-04-20):**
    * ADDED: GD presence is checked. 
    * CHANGED: Traffic limiter data files moved to data/ (→easier rights management)
    * ADDED: "Burn after reading" implemented. Opening the URL will display the paste and immediately destroy it on server.
  * **Alpha 0.15 (2012-04-20):**
    * FIXED: 2 minor corrections to avoid notices in php log.
    * FIXED: Sources converted to UTF-8.
  * **Alpha 0.15 (2012-04-20):**
    * FIXED: 2 minor corrections to avoid notices in php log.
    * FIXED: Sources converted to UTF-8.
  * **Alpha 0.16**:
    * FIXED minor php warnings.
    * FIXED: zerobin.js reformated and properly commented.
    * FIXED: Directory structure re-organized.
    * CHANGED: URL shortening button was removed. (It was bad for privacy.)
  * **Alpha 0.17 (2013-02-23)**:
    * ADDED: Deletion URL.
    * small refactoring.
    * improved regex checks.
    * larger server alt on installation.    
  * **Alpha 0.18 (2013-02-24)**:
    * ADDED: The resulting URL is automatically selected after pressing "Send". You just have to press CTRL+C.
    * ADDED: Automatic syntax highlighting for 53 languages using highlight.js
    * ADDED: "5 minutes" and "1 week" expirations.
    * ADDED: "Raw text" button.
    * jQuery upgraded to 1.9.1
    * sjcl upgraded to GitHub master 2013-02-23
    * base64.js upgraded to 1.7
    * FIXED: Dates in discussion are now proper local dates.
    * ADDED: Robot meta tags in HTML to prevent search engines indexing.
    * ADDED: Better json checking (including entropy).
    * ADDED: Added version to js/css assets URLs in order to prevent some abusive caches to serve an obsolete version of these files when ZeroBin is upgraded.
    * "Burn after reading" option has been moved out of Expiration combo to a separate checkbox. Reason is: You can prevent a read-once paste to be available ad vitam eternam on the net.
  * **Alpha 0.19 (2013-07-05)**:
    * Corrected XSS security flaw which affected IE<10. Other browsers were not affected.
    * Corrected spacing display in IE<10.
  * **Zalpha 0.20 (2013-12-05)**:
    * Replacing SJCL.js by [Crypto-js](http://code.google.com/p/crypto-js/)
    * Replacing highlight.js by [highlightjs](http://highlightjs.org/)
    * Adding back support for self hosted URL shortener (like [Yourls](https://github.com/YOURLS/YOURLS))

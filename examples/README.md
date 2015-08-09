Examples
========

To run the examples, you must copy the config.example.php file to config.php
 and change the configuration to your needs.

statistics.php
--------------

Fetches the client statistics for a given site.

    php statistics.php

authorize-guest.php
-------------------

Authorizes a guest (mac address) for x minutes.
 You need to login with a user that has full access to the Unifi controller.

    php authorize-guest.php

unauthorize-guest.php
---------------------

Unauthorize a guest (mac address).
 You need to login with a user that has full access to the Unifi controller.

    php unauthorize-guest.php
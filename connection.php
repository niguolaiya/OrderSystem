<?php

/**
 * ac_cred.inc.php: Secret Connection Credentials for a database class
 * @package Oracle
 */

/**
 * DB user name
 */
define('SCHEMA', 'sizheng');

/**
 * DB Password.
 *
 * Note: In practice keep database credentials out of directories
 * accessible to the web server.
 */
define('PASSWORD', 'Dec371996');

/**
 * DB connection identifier
 */
define('DATABASE', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

/**
 * DB character set for returned data
 */
define('CHARSET', 'UTF8');

/**
 * Client Information text for DB tracing
 */
define('CLIENT_INFO', 'HappyMarketFuntime Co.');

?>
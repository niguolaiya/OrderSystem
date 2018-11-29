<?php

/**
 * ac_db.inc.php: Database class using the PHP OCI8 extension
 * @package Oracle
 */

namespace Oracle;

require('connection.php');

/**
 * Oracle Database access methods
 * @package Oracle
 * @subpackage Db
 */
class Db {

    /**
     * @var resource The connection resource
     * @access protected
     */
    protected $conn = null;
    /**
     * @var resource The statement resource identifier
     * @access protected
     */
    protected $stid = null;
    /**
     * @var integer The number of rows to prefetch with queries
     * @access protected
     */
    protected $prefetch = 100;

}

?>
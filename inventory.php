<?php
/**
 * Created by PhpStorm.
 * User: Mitch
 * Date: 11/29/2018
 * Time: 8:18 AM
 */

/**
 * @package Inventory
 */

define('NUMRECORDSPERPAGE', 5);

$sess = session_start();
require('db_conn.php');
// Functions
/**
 * Print the main body of the page
 *
 * @param Session $sess
 * @param integer $startrow The first row of the table to be printed
 */
function printcontent($sess, $startrow) {
    echo "<div id='content'>";

    $db = new \Oracle\Db("Equipment", $sess->username);
    $sql = "SELECT employee_id, first_name || ' ' || last_name AS name,
            phone_number FROM employees ORDER BY employee_id";
    $res = $db->execFetchPage($sql, "Equipment Query", $startrow,
        NUMRECORDSPERPAGE);
    if ($res) {
        printrecords($sess, ($startrow === 1), $res);
    } else {
        printnorecords();
    }

    echo "</div>";  // content
    // Save the session, including the current data row number
    $sess->empstartrow = $startrow;
    $sess->setSession();
}
?>
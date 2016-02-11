<?php
/* FreePBX installer file
 * This file is run when the module is installed through module admin
 *
 * Note: install.sql is depreciated and may not work. Its recommended to use this file instead.
 * 
 * If this file returns false then the module will not install
 * EX:
 * return false;
 *
 */

$freepbx_conf =& freepbx_conf::create();
$set = array();
$set['value'] = '/var/spool/asterisk/monitor';
$set['defaultval'] =& $set['value'];
$set['name'] = 'Call recordings folder';
$set['description'] = 'Path to folder where call records placed by default is /var/spool/asterisk/monitor';
$set['category'] = 'GetCallRecord Module';
$set['type'] = CONF_TYPE_DIR;
$freepbx_conf->define_conf_setting('CALL_RECORDS_DIR', $set, true);
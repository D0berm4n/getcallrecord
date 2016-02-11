<?php

if (isset($_REQUEST['command']) && $_REQUEST['command'] == "getcallrecord"){
    $filename = $_REQUEST['filename'];
    $freepbx_conf =& freepbx_conf::create();
    $dir = $freepbx_conf->get('CALL_RECORDS_DIR', true);
    $file = $dir . "/" . $filename;

    if (file_exists($file)){
        $filesize = sprintf("%u", filesize($file));
        header("Content-Type: audio/wav");
        header("Content-Length: $filesize");
        header('Accept-Ranges: bytes');
        readfile($file);
    }
}
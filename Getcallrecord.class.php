<?php
/**
 * Created by IntelliJ IDEA.
 * User: maxim.ivassenko
 * Date: 02.12.14
 * Time: 15:55
 */

class Getcallrecord implements BMO {
    public function install() {}
    public function uninstall() {}
    public function backup() {}
    public function restore($backup) {}
    public function doConfigPageInit($page) {}


    public function ajaxRequest($req, &$setting) {
        if ($req == "getcallrecord") {
            $setting['authenticate'] = false;
            $setting['allowremote'] = true;
            return true;
        }

        return false; // Returning false, or anything APART from (bool) true will abort the request
    }

    public function ajaxHandler() {
        if ($_REQUEST['command'] == "getcallrecord") {
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
    }
}


<?php
include "bootstrap/init.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $trackList = getTrack($id);
}
include "tpl/tpl-tracking.php";

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$content_base = $root . "/content/";
$path = $_SERVER['REQUEST_URI'];
$filename = basename($path);

include($root . "/templates/header.php");
include($root . "/templates/nav.php");

//Figure out which navigation topic is chosen
//  code
//Include the appropriate sidebar
include($root . "/templates/sidebar.php");
?>

<div id="content-wrapper">
  <div id="content">
    
    <?php
    //Figure out what gets served
    if ($path == "/") {
      include($content_base . "index.php"); //default home page
    }
    include($content_base . $filename);
    ?>
    
  </div><!-- #content -->
</div><!-- #content-wrapper -->

<?php
include($root . "/templates/footer.php");
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$content_base = $root . "/content";
$path = $_SERVER['REQUEST_URI'];
$filename = basename($path);
$path_parts = pathinfo($root . "/content" . $path);

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
    if (is_dir($content_base . $path)) {
      //For main pages, serve the <*.php> file, since it contains further processing
      if (file_exists($content_base . $path . "/index.php")) {
        include($content_base . $path . "/index.php");
      } else {
        //For smaller pages, just serve the content found in it's <*.xml> file
        $parser = simplexml_load_file($content_base . $path . "/index.xml");
        echo "<h1>" . $parser->title . "</h1>";
        foreach ($parser->content->children() as $content) {
          echo $content->asXML();
        }
      }
    } else {
      //For other media such as images,
      //include($content_base . $path);
    }
    ?>
    
  </div><!-- #content -->
</div><!-- #content-wrapper -->

<?php
include($root . "/templates/footer.php");
?>

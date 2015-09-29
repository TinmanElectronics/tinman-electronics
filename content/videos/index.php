<h1>Videos</h1>

<?php

$video_contents = scandir($content_base . $path, SCANDIR_SORT_DESCENDING);

//Loop through each video's directory
foreach ($video_contents as $video) {
  if (preg_match("/[0-9][0-9][0-9]/", $video)) {
    echo "<div class=\"video-post\">".PHP_EOL;
    //Print a summary and thumbnail for each video
    $parser = simplexml_load_file($path_parts['dirname'] . $path . "/".$video . "/index.xml");
    echo "  <h2>" . $parser->title . "</h2>".PHP_EOL;
    echo "  <img src=\"/content"."$path/$video/thumbnail.jpg\" alt=\"video thumbnail\" />".PHP_EOL;
    echo "</div><!-- #$video -->".PHP_EOL;
  }
}

?>

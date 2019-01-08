<?php
function prepend($string, $orig_filename) {
    $content = stream_context_create();
    $orig_file = fopen($orig_filename, 'r', 1, $content);
    $temp_filename = tempnam("./temp", 'pre');
    file_put_contents($temp_filename, $string);
    file_put_contents($temp_filename, $orig_file, FILE_APPEND);
    fclose($orig_file);
    unlink($orig_filename);
    rename($temp_filename,$orig_filename);
    chmod($orig_filename,0755);
}
    $file = 'data.txt';
    chmod($file,0755);
    $date = $_POST['date'];
    $water_level = $_POST['water_level'];
    prepend($water_level."\n".$date."\n",$file);
?>

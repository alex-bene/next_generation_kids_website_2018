<?php

$lang = 'en';

$name = $_REQUEST["name"];
$content = array(
  '{{Name}}' => '',
);
$template = file_get_contents("../templates/team_member_bio_template.html");
$bio = file_get_contents("../teams/team_members/$name/$name - $lang.txt");
$sections = array_keys($content);
foreach ($sections as $key) {
  preg_match_all("/{$key}>(.*?)<\/{$key}>/is",$bio,$matches);
  $content[$key] = $matches[1][0];
}
$find = array_keys($content);
array_push ($find,'{{Link_Name}}');
$replace = array_values($content);
array_push ($replace,$name);
echo str_replace($find,$replace,$template);
?>

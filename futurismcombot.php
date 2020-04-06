<?php
$site = "http://futurism.com/feed/";
$data = file_get_contents($site);
function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }
$url= getData($data,'<guid isPermaLink="false">','</guid>');
$title = file_get_contents($url);
$baslik= getData($title,'<title>','</title>');
$detay= getData($title,'<div class="summary module">','</div>');

echo $baslik; echo '<br>';
echo $detay; echo '<br>';
?>
 
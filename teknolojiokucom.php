<?php
$site = "http://www.teknolojioku.com/export/sitemap";
$data = file_get_contents($site);
preg_match_all('/<loc.*?>(.*?)<\/loc>/si', $data, $matches); 

function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }

echo $url=$matches[1][0];
$title = file_get_contents($url);
$baslik= getData($title,'"headline": "','",');
$onyazi= getData($title,'"description": "','",');
$detay= getData($title,'"articleBody": "','",');
$detay2= getData($title,'<div class="content-text">','<div class="mceNonEditable related-news"');

echo $baslik; echo '<br>';
echo $onyazi; echo '<br>';
echo $detay; echo '<br>';
?>
 
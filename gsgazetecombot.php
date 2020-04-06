<?php
$site = "http://gsgazete.com/yandex_news.xml";
$data = file_get_contents($site);
function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }

$item= getData($data,'<item>','</item>');
$url= getData($item,'<link>','</link>');
$baslik= getData($item,'<title><![CDATA[',']]></title>');
$spot= getData($item,'<description><![CDATA[',']]></description>');
$title = file_get_contents($url);
$detay= getData($title,'<div id="newstext" class="clearfix page-content content-detail">','<div data-hsm="banner" data-hsid="349" class="reklam reklam136 text-center">');
$resim_div = getData($title,'<div class="clearfix newspic">','</span>');
$resim = getData($resim_div,'<img src="','"');
echo $baslik; echo '<br>';
echo $resim; echo '<br>';
echo $spot; echo '<br>';
echo $detay; echo '<br>';
?>
 
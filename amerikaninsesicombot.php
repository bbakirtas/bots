<?php
$site = "http://www.amerikaninsesi.com";
$data = file_get_contents($site);
function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }



$url_div= getData($data,'<div class="media-block has-img size-2">','<div class="thumb thumb16_9">');
$url = getData($url_div,'<a href="','"');
$url = $site.$url;
$title = file_get_contents($url);
$baslik= getData($title,'<meta content="','" property="og:title" />');
$resim_tumb= getData($title,'<div class="separator">','</figure>');
$resim = getData($resim_tumb,'<img src="','"');
$detay = getData($title,'<div class="wsw">','<h3 class="section-head">');
$detay = strip_tags($detay);
$detay = nl2br($detay);
$detay = str_replace('<br />', '', $detay);
$resim_format = substr($resim, -4);
$taglar_c =  getData($title,'{"@context"','}</script>');
$taglar = getData($taglar_c,'"keywords":"','"');
echo 'Başlık : '.$baslik; echo '<br>';
echo 'Haber Detay : '.$detay; 


$posts = array('Baslik'=> $baslik, 'Detay'=> $detay); 
$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($posts));
fclose($fp);
?>
 
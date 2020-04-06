<?php
$site = "http://www.businessinsider.com";
$data = file_get_contents($site);
function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }
$url= getData($data,'<h1 class="overridable"><a class="title" href="','"');
$title = file_get_contents($url);
$baslik= getData($title,'<meta property="og:title" content="','"');
$spot= getData($title,'<meta property="og:description" content="','"');
$resim = getData($title,'<meta property="og:image" content="','"');
$amp = getData($title,'<link href="','"');
$ampkaynak = file_get_contents($amp);
$detay = getData($ampkaynak,'<section class="article-content">','<section class="see-also-links">');
echo 'Başlık : '.$baslik; echo '<br>';
echo 'Spot : ' .$spot; echo '<br>';
echo 'Haber Resmi : ' .$resim; echo '<br>';
echo 'Haber Detay : '.$detay; echo '<br>';
?>
 
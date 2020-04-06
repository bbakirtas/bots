<?php set_time_limit(0);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }

$site = "http://www.free-css.com/free-css-templates";
$data = file_get_contents($site);
preg_match_all('/<li>.*?>(.*?)<\/li>/si', $data, $download); 
$dosya = fopen('dosya.txt', 'a');
foreach($download as $d)
 {
 for ($i = 17; $i <= 28; $i++) {
 $sitegelen= getData($d[$i],'<figure><a href="','"');	
 $sitegelen='http://www.free-css.com'.$sitegelen;
$verim = file_get_contents($sitegelen);
 $baslik= getData($verim,'<h1><span>','</span></h1>');	
 $resim= getData($verim,'<img src="/assets/images/free-css-templates/page','" alt="');	
 $indirlink = getData($verim,'<a rel="nofollow" href="','"');
 $demo1= getData($verim,'<li class="demo"><a onclick="','">Live Demo</a></li>');	
 $demo = getData($demo1,'href="','"');	
$resim = 'https://www.free-css.com/assets/images/free-css-templates/page'.$resim;
 $indirlink=$sitegelen;
 $demo = 'https://www.free-css.com'.$demo;
 if (!empty($baslik))
{
$dosya_veri  = "Ücretsiz Bootstrap Web Tasarım - ".$baslik."
Demo : [url]".$demo."[/url]
İndirme Linki : [url]".$indirlink."[/url]
[img]".$resim."[/img]\n\n";
fwrite($dosya, $dosya_veri);
}
} 
}
fclose($dosya);
 ?>
</body>
 
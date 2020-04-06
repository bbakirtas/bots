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
$site = "http://www.usatoday.com/news-sitemap.xml";
$data = file_get_contents($site);
preg_match_all('/<url>.*?>.*?<\/url>/si', $data, $download); 
foreach($download as $d)
 { 
$sitegelen= getData($d[3],'<loc>','</loc>');	
$verim = file_get_contents($sitegelen);


$baslik= getData($verim,'"headline": "','"');	
$spot= getData($verim,'"description": "','"');	
$resim= getData($verim,'"thumbnailUrl": "','?width');	
$detay= getData($verim,'<p class="speakable-p-1 p-text">','<strong>MORE:');	
//$detay = strip_tags($detay);
//$detay = nl2br($detay);
//$detay = str_replace('<br />', '', $detay);

echo $baslik; echo '<br>';
echo $resim; echo '<br>';
echo $spot; echo '<br>';
echo $detay; echo '<br>'; 
}

 ?>
</body>
 
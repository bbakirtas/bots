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
$site = "http://www.unilad.co.uk/";
$data = file_get_contents($site);
preg_match_all('/<h2 class="header3">.*?>.*?<\/h2>/si', $data, $download); 
foreach($download as $d)
 { 
$sitegelen= getData($d[0],'<a href="','"');	

$verim = file_get_contents($sitegelen);
$spot= getData($verim,'<meta name="description" content="','"');	
$resim= getData($verim,'<meta property="og:image" content="','"');	
$baslik= getData($verim,'<meta property="og:title" content="','"');	
$detay= getData($verim,'<div class="article-content">','<div class="article-footer">');	

echo $baslik; echo '<br>';
echo $resim; echo '<br>';
echo $spot; echo '<br>';
echo $detay; echo '<br>'; 
}

 ?>
</body>
 
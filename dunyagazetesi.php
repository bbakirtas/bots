<?php set_time_limit(0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
$site = "http://www.dunya.com/rss?dunya";
$data = file_get_contents($site);
preg_match_all('/<item>.*?>.*?<\/item>/si', $data, $download); 
foreach($download as $d)
 {
 $toplam = count ($d);
 $toplam = 2;
 for ($i = 0; $i <= $toplam; $i++) {
 
$sitegelen= getData($d[$i],'<link>','</link>');
$verim = file_get_contents($sitegelen);

 $baslik= getData($verim,'<meta property="og:title" content="','"');	
 $spot= getData($verim,'<meta property="og:description" content="','"');	
 $resim = getData($verim,'<link rel="image_src" href="','?v=');
 $detay = getData($verim,'<div class="artc-cnt">','<div class="tags">');
 $detay = strip_tags($detay);
$detay = nl2br($detay);
$detay = str_replace('<br />', '', $detay);
$detay = trim(preg_replace('/\s+/',' ', $detay));
$taglar = getData($verim,'<div class="tags">','</div>');




$taglar = strip_tags($taglar);
$taglar = nl2br($taglar);
$taglar = str_replace('<br />', '', $taglar);
$taglar = trim(preg_replace('/\s+/',' ', $taglar));



?>
<?php echo $baslik;?><br>
<?php echo $spot;?><br>
<?php echo $resim;?><br>
<?php echo $detay;?><br><br>
<?php 
}
}
 ?>
</body>
 </html>
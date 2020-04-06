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
$site = "http://sanalkurs.net/php-mysql_dersleri";
$data = file_get_contents($site);
preg_match_all('/<div class="col-sm-4 col-xs-6">.*?>.*?<\/div>/si', $data, $download); 
foreach($download as $d)
 {
 //$toplam = count ($d);
 //for ($i = 0; $i <= $toplam; $i++) {

  $sitegelen= getData($d[0],'<a href="','" class="relative">');	
$verim = file_get_contents($sitegelen);
 $baslik= getData($verim,'<h1 class="panel-title">','</h1>');	
 $resim= getData($verim,'<meta property="og:image" content="','"');	
  $demo_div= getData($verim,'<div class="single-buttons">','<i class="fa fa-eye">');	
 $iframe= getData($verim,'<iframe','</iframe>');
 $video	=getData($iframe,'src="','"');
 $icerik= getData($verim,'<div class="text">','</div>');	

 $icerik = strip_tags($icerik);
 $icerik = nl2br($icerik);
$icerik = str_replace('<br />', '', $icerik);
?>
<?php echo $baslik;?><br>
[Video URL] : <?php echo $video;?><br>
[İçerik]<?php echo $icerik;?><br><br>
<?php } 
//} ?>
</body>
 



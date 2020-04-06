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
$site = "https://bootstrapmade.com/page/3/";
$data = file_get_contents($site);
preg_match_all('/<div class="col-md-6">.*?>.*?<\/div>/si', $data, $download); 
foreach($download as $d)
 {
 $toplam = count ($d);
 for ($i = 0; $i <= $toplam; $i++) {

 $sitegelen= getData($d[$i],'<a href="','" rel="bookmark"');	
$verim = file_get_contents($sitegelen);
 $baslik= getData($verim,'<h1 style="display: inline-block; line-height: 36px;">','</h1>');	
 $resim= getData($verim,'<meta property="og:image" content="','"');	
  $demo_div= getData($verim,'<div class="single-buttons">','<i class="fa fa-eye">');	
 $demo= getData($demo_div,'<a href="','"');	

?>
<strong>Ücretsiz Bootstrap Web Tasarım - <?php echo $baslik;?></strong><br>
Demo :  <a href="<?php echo $demo;?>" target="_blank"> Demo </a><br>
İndirme Linki : <a href="<?php echo $sitegelen;?>" target="_blank"> İndir</a><br>
<a href="<?php echo $demo;?>" target="_blank"><img border="0" data-original-height="800" data-original-width="711" height="320" src="<?php echo $resim;?>" width="284" /></a><br><br>
<?php } 
} ?>
</body>
 



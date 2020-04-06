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
$site = "https://cssauthor.com/jquery-scrolling-plugins/";
$data = file_get_contents($site);
preg_match_all('/<h3>.*?>.*?<\/h3>/si', $data, $download); 
//print_r($download);
foreach($download as $d)
 {

  $toplam = count ($d);
  //echo $toplam;
 for ($i = 0; $i <= $toplam; $i++) {
 	//$sitegelen= getData($d[$i],'href="','"');	
//$verim = file_get_contents($sitegelen);
 $baslik= getData($d[$i],'<h3>','</h3>');	
 $resim= getData($d[$i],'<img','alt=');	
  $resim_yeni= getData($resim,'data-lazy-src="','"');	
 $indirlink = getData($d[$i],'<a class="btn-source" href="','"');
 $demo= getData($d[$i],'<a class="btn-url" href="','"');		
?>




<strong><?php echo $baslik;?></strong><br>
Demo :  <a href="<?php echo $demo;?>" target="_blank"> Demo </a><br>
İndirme Linki : <a href="<?php echo $indirlink;?>" target="_blank"> İndir</a><br>
<a href="<?php echo $demo;?>" target="_blank"><img border="0" data-original-height="800" data-original-width="711" height="320" src="http:<?php echo $resim_yeni;?>" width="450" /></a><br><br>



<?php } } ?>
</body>
 
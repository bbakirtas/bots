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
$site = "http://www.themezy.com/free-website-templates?page=1";
$data = file_get_contents($site);
$datam= getData($data,'<ul class="grid items">','</ul>');
preg_match_all('/<li>.*?>.*?<\/li>/si', $datam, $download); 
//print_r($download);
foreach($download as $d)
 {
 $toplam = count ($d);
 for ($i = 0; $i <= $toplam; $i++) {
 $sitegelen= getData($d[$i],'<a href="','"');
 $sitegelen ="http://www.themezy.com$sitegelen";	
$verim = file_get_contents($sitegelen);
$baslik= getData($verim,'<h1 class="resource-name">','</h1>');	
 $resim= getData($d[$i],'data-cfsrc="','"');
 $demo= getData($verim,'<a href="/demos/','" class="resource-preview" title="View Demo">');		
 $demo1 = "http://www.themezy.com/demos/$demo";	
?>





<strong><?php echo $baslik;?></strong><br>
Demo :  <a href="<?php echo $demo1;?>" target="_blank"> Demo </a><br>
İndirme Linki : <a href="<?php echo $sitegelen;?>" target="_blank"> İndir</a><br>
<a href="<?php echo $demo1;?>" target="_blank"><img border="0" data-original-height="800" data-original-width="711" height="320" src="<?php echo $resim;?>" width="284" /></a><br><br><br><br>



<?php } } ?>
</body>
 
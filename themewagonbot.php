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
$site = "http://themewagon.com/theme_tag/free/";
$data = file_get_contents($site);
preg_match_all('/<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 theme-card-wrap">.*?>(.*?)<\/div>/si', $data, $download); 

foreach($download as $d)
 {
 echo $toplam = count ($d);
 for ($i = 0; $i <= $toplam; $i++) {
 $sitegelen= getData($d[$i],'href="','"');	
 

 $verim = file_get_contents($sitegelen);
 $baslik= getData($verim,'<h1 itemprop="name" class="template-title">','</h1>');
 $resim= getData($verim,'data-lazy-src="','"');	
 $indirlink = getData($verim,'<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-icon-left vc_btn3-color-green" href="','"');
 $demo= getData($verim,'<a class="live-preview-area" target="_blank" href="','"');		
 if (!empty($baslik))
{
?>


<strong>Ücretsiz Web Tasarımlar - <?php echo $baslik;?></strong><br>
Demo :  <a href="<?php echo $demo;?>" target="_blank"> Demo </a><br>
İndirme Linki : <a href="<?php echo $sitegelen;?>" target="_blank"> İndir</a><br>
<a href="<?php echo $demo;?>" target="_blank"><img border="0" data-original-height="800" data-original-width="711" height="320" src="<?php echo $resim;?>" width="284" /></a><br><br>





<?php 
}
} 
} 
?>
</body>
 
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
$site = "http://colorlib.com/wp/templates/";
$data = file_get_contents($site);
preg_match_all('/<div class="portfolio-entry-readmore-wrap entry-readmore-wrap wpex-clr">.*?>.*?<\/div>/si', $data, $download); 
foreach($download as $d)
 {
 $toplam = count ($d);
 for ($i = 0; $i <= $toplam; $i++) {
 $sitegelen= getData($d[$i],'href="','"');	
$verim = file_get_contents($sitegelen);
 $baslik= getData($verim,'<h1 id="portfolio-single-title" class="single-post-title entry-title">','</h1>');	
 $resim= getData($verim,'srcset="','"'); 
 $resim1= getData($resim,'h','1200w');	
 $indirlink = getData($verim,'<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-icon-left vc_btn3-color-green" href="','"');
 $demo= getData($verim,'<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-icon-left vc_btn3-color-purple" href="','"');		
?>

<strong>Ücretsiz HTML Tasarımlar - <?php echo $baslik;?></strong><br>
Demo :  <a href="<?php echo $demo;?>" target="_blank"> Demo </a><br>
İndirme Linki : <a href="<?php echo $indirlink;?>" target="_blank"> İndir</a><br>
<a href="<?php echo $demo;?>" target="_blank"><img border="0" data-original-height="800" data-original-width="711" height="320" src="h<?php echo $resim1;?>" width="284" /></a><br><br>



<?php } } ?>
</body>
 
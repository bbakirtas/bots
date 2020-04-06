<?php

set_time_limit(0);

function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }
$site = "http://www.codeproject.com/Tags/PHP";
$data = file_get_contents($site);
preg_match_all('/<div class="content-list-item">.*?>.*?<\/table>/si', $data, $download); 
//print_r($download);
foreach($download as $d)
 {
 //$toplam = count ($d);
 //for ($i = 0; $i <= $toplam; $i++) {
 $sitegelen= getData($d[0],'href="','"');	
 $sitegelen='http://www.codeproject.com'.$sitegelen;
$verim = file_get_contents($sitegelen);
 $baslik= getData($verim,'<h1 id="portfolio-single-title" class="single-post-title entry-title">','</h1>');	
 $resim= getData($verim,'data-lazy-src="','"');	
 $indirlink = getData($verim,'<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-icon-left vc_btn3-color-green" href="','"');
 $demo= getData($verim,'<div id="contentdiv" class="text">','<h2>Share</h2>');	
	
 $demo = str_replace('src="/', 'src="http://www.codeproject.com/', $demo);
?>
<?php echo $demo;?><br><br>
<?php }
// } ?>

 
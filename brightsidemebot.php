<?php
set_time_limit(0);

function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }
 //for ($b = 1; $b <= 2; $b++) {
$site = "http://brightside.me/thebest/page1/";
$data = file_get_contents($site);
preg_match_all('/<h3 class="al-title">.*?>.*?<\/h3>/si', $data, $download); 
//print_r($download);
foreach($download as $d)
 {
 	$sayi = 1;
 $toplam = count ($d);
 for ($s = 0; $s <= $toplam; $s++) {
 $sitegelen= getData($d[$s],'href="','"');	
 $sitegelen='http://www.brightside.me'.$sitegelen;
$verim = file_get_contents($sitegelen);
$baslik= getData($verim,'<meta property="og:title" content="','" />'); 


preg_match_all('/<div id=".*?>.*?<\/span>/si', $verim, $gc); 
foreach($gc as $a)
 {
$toplama = count($a);
for ($i = 1; $i <= $toplama; $i++) {
	$sayi++;
echo $resimler= getData($a[$i],'<img src="','"'); 
echo '<br>';

 }

 }

}

}

//}
?>

 
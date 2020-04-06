<?php
ini_set('max_execution_time', 3000);
$ins_page = 'silagencoglu';
$tarih = date('d-m-Y');
function scrape_insta($username) {
	$insta_source = file_get_contents('http://instagram.com/'.$username.'');
	$shards = explode('window._sharedData = ', $insta_source);
	$insta_json = explode(';</script>', $shards[1]); 
	$insta_array = json_decode($insta_json[0], TRUE);
	return $insta_array;
}
function BetweenStr($InputString, $StartStr, $EndStr=0, $StartLoc=0) {
    if (($StartLoc = strpos($InputString, $StartStr, $StartLoc)) === false) { return; }
    $StartLoc += strlen($StartStr);
    if (!$EndStr) { $EndStr = $StartStr; }
    if (!$EndLoc = strpos($InputString, $EndStr, $StartLoc)) { return; }
    return substr($InputString, $StartLoc, ($EndLoc-$StartLoc));
}



function get_first_word($str)
{
 return (preg_match('/(\S)*/', $str, $matches) ? $matches[0] : $str);
}

function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }
$site = "https://www.instagram.com/p/BniUYMXgBjh/";
$data = file_get_contents($site);
$baslik= getData($data,'<title>','</title>');   


//Do the deed
$results_array = scrape_insta($ins_page);
//An example of where to go from there
$latest_array =  $results_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
$instagram_latest = array();
foreach ( $latest_array as $image_data ) {
		$image = $image_data['node'];

		  $instagram_latest[] = array(
                    'description' => $image['edge_media_to_caption']['edges'][0]['node']['text'],
                    'link'        => '//instagram.com/p/BniUYMXgBjh',
                    'time'        => $image['taken_at_timestamp'],
                    'thumbnail'   => $image['thumbnail_src'],
                    'media_preview' => $image['media_preview']
                );

 $dosya_adi_link =  $image['display_url']; 
 $text =  $image['edge_media_to_caption']['edges'][0]['node']['text']; 
 $data_id =  $image['id']; 
$kaynaksayfa =  BetweenStr($text,"@"," ");
$otheruser= get_first_word($kaynaksayfa); 
$textim = str_replace('▫', '', $text);


echo $kaynaksayfa;
echo '<br>';
echo $text;
echo '<br>';
//echo $data_id;
echo '<br>';
}
?>
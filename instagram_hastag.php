<?php

ini_set('max_execution_time', 500);
 function getData($data,$startTag,$finishTag){
 $data= explode($startTag,$data);
 $data= $data[1];
 $data= explode($finishTag,$data);
 $data= $data[0];
 return $data;
 }
 function scrape_insta_hash($tag) {
	$insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); // instagrame tag url
	$shards = explode('window._sharedData = ', $insta_source);
	$insta_json = explode(';</script>', $shards[1]); 
	$insta_array = json_decode($insta_json[0], TRUE);
	return $insta_array; // this return a lot things print it and see what else you need
}



$tag = 'love'; // tag for which ou want images 
$results_array = scrape_insta_hash($tag);
//$limit = 7; //previous was only limit to 7 images
$limit = 56; // provide the limit thats important because one page only give some images.
$image_array= array(); // array to store images.
	for ($i=0; $i < $limit; $i++) { 
		//previous code to get images from json 	
		//$latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];	
		//new code to get images from json 	
		$latest_array = $results_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'][$i]['node'];
	 	 $image_data  = '<a href="'.$latest_array['display_url'].'"><img src="'.$latest_array['thumbnail_src'].'" width="50px" height="50px"></a>'; // thumbnail and same sizes 
	 	echo $text =  $latest_array['edge_media_to_caption']['edges'][0]['node']['text']; 

	 	 if (!empty($latest_array['thumbnail_src']))
	 	 {	

	 	  $vt_link = $latest_array['display_url'];

	 	 	echo $image_data;

			}






	 	 }
	 	
	 	//$image_data  = '<img src="'.$latest_array['display_src'].'">'; actual image and different sizes 
		array_push($image_array, $image_data);
	

?>
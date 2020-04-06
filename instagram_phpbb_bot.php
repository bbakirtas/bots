<?php set_time_limit(0);
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


define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpbb_admin_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/message_parser.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup('common');
$gname = request_var('gname', ''); 
$steamid = request_var('steamid', '');
$realname = request_var('realname', '');
$age = request_var('age', '');
$gender = request_var('gender', '');
$location = request_var('location', '');
$games = request_var('games', '');
$often = request_var('often', '');
$ever = request_var('ever', '');
$why = request_var('why', '');
$offer = request_var('offer', '');
$willing = request_var('willing', '');
$active = request_var('active', '');
$other = request_var('other', '');


 

$results_array = scrape_insta($ins_page);
//An example of where to go from there
$latest_array =  $results_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
$instagram_latest = array();
foreach ( $latest_array as $image_data ) {
            $image = $image_data['node'];

              $instagram_latest[] = array(
                    'description' => $image['edge_media_to_caption']['edges'][0]['node']['text'],
                    'link'        => '//instagram.com/p/' . $image['shortcode'],
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



$message = "
$text
[img]".$dosya_adi_link."[/img]
";
$forum = 18; //hangi forumda olacağını burdaki id ile belirliyorsunuz 
 
$time = time();
$rawsubject = "Sıla Gençoğlu Instagram Paylaşımları"; // Konu Başlığı
$my_subject   = utf8_normalize_nfc($rawsubject, '', true);
$my_text   = utf8_normalize_nfc($message, '', true);
 

$poll = $uid = $bitfield = $options = '';
 
generate_text_for_display($my_subject, $uid, $bitfield, $options, false, false, false);
generate_text_for_storage($my_text, $uid, $bitfield, $options, true, true, true);
 
$data = array(
       'forum_id'      => $forum,
       'icon_id'      => false,
 
       'enable_bbcode'      => true,
       'enable_smilies'   => true,
       'enable_urls'      => true,
       'enable_sig'      => true,
 
       'message'      => $my_text,
       'message_md5'   => md5($my_text),
               
       'bbcode_bitfield'   => $bitfield,
       'bbcode_uid'      => $uid,
 
       'post_edit_locked'   => 0,
       'topic_title'      => $my_subject,
       'notify_set'      => false,
       'notify'         => false,
       'post_time'       => 0,
       'forum_name'      => '',
       'enable_indexing'   => true,
 
);
 
submit_post('post', $my_subject, $user->data['username'], POST_NORMAL, $poll, $data);
$redirect_url = append_sid("{$phpbb_root_path}/viewforum.$phpEx?f=$forum", false, true, $user->session_id);
meta_refresh(2, $redirect_url);
}

trigger_error('Message Posted' . '<br /><br />Taking you back to the forum ' . sprintf('<a href="' . $redirect_url . '">', '</a>'));
?>
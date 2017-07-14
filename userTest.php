<?php
header("Content-Type:text/html");
function scrape_insta_hash($url) {

    $insta_source = file_get_contents($url); // instagrame tag url
    $shards = explode('window._sharedData = ', $insta_source);
    $insta_json = explode(';</script>', $shards[1]); 
    $insta_array = json_decode($insta_json[0], TRUE);
    return $insta_array; 

}


//   /?__a=0&max_id=J0HWWcjxgAAAF0HWWcdeAAAAFiYA
$tag = $_GET['t']; 
$tag.= isset($_GET['max_id']) ? "/?__a=0&amp;max_id=".$_GET['max_id'] : '';
$url="https://www.instagram.com/explore/tags/".$tag;

echo "URL:".$url."<br>";

$results_array = scrape_insta_hash($url);
$limit = 30; 
$insta_array= array(); 
$image_array= array(); 


#시간비교{
// print_r( $results_array['entry_data']['TagPage'][0]['tag']['media']['page_info']['end_cursor'] );
// $pr = date("Y-m-d H:i:s", $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][0]['date']);
// $ne = date("Y-m-d H:i:s", $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][1]['date']);
// print_r( $pr." )  "  );
// print_r( $pr > $ne );
// print_r(  "  ( ".$ne );
#}
print_r( $results_array['entry_data']['TagPage'][0]['tag']['media']['page_info']['end_cursor'] );

for ($i=0; $i < $limit; $i++) { 
    @$latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];
    array_push($insta_array, $latest_array);
    //  $image_data  = '<img src="'.$latest_array['thumbnail_src'].'">';
    //  $image_data  = '<img src="'.$latest_array['display_src'].'">'; 
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
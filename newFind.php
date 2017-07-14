<?php

//user id 기준 
// $user=array("somin_jj", "seongh78");
// $baseUrl = "https://www.instagram.com/$user[1]/?__a=1";
// $url = $baseUrl;
// while(1) {
//     $json = json_decode(file_get_contents($url));
//     // $json2 = (file_get_contents($url));
//     // print_r($json2);
//     print_r($json->user->media->nodes);
//     if(!$json->user->media->page_info->has_next_page) break;
//     $url = $baseUrl.'&max_id='.$json->user->media->page_info->end_cursor;
// }




//tag 기준 
$tag = "스킨멜로우";
$baseUrl = "https://www.instagram.com/explore/tags/스킨멜로우/?__a=1";
$url = $baseUrl;
 
// //  $json = json_decode(file_get_contents($url));
// //  print_r($json);
 
 $cc =0;
while($cc<10) {
    $cc++;
    $json = json_decode(file_get_contents($url));
    print_r($json->tag->media->nodes);
    echo "<hr>";
    // print_r($json);
    // if(!$json->tag->media->page_info->has_next_page) break;
    // $url = $baseUrl.'&max_id='.$json->tag->media->page_info->end_cursor;
    if(!$json->tag->media->page_info->has_next_page) break;
      
    $url = $baseUrl.'&max_id='.$json->tag->media->page_info->end_cursor;
    // echo $json->tag->media->count;
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
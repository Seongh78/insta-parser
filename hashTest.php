<?php 

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



echo "<hr>";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    
    
    
    
    <div class="col-md-8 col-md-offset-2">
        
        <h5><?=count($insta_array)?></h5>
        <?php 
        $cnt=1;
        foreach ($insta_array as $image) { 
        ?>
        <div class="media" style="border-bottom:1px solid #ddd; padding:10px;">
          <div class="media-left media-top">
            <a href="#">
              <img class="media-object" width="100" height="100" src="<?=$image['thumbnail_src']?>" alt="...">
            </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading">[<?=$cnt++?>] <?=json_encode($image['owner']['id'])?> <small>[<?=date("Y-m-d  H:i:s", $image['date'])?>]</small></h4>
            <p><?=$image['caption']?></p>
          </div>
        </div>
        <?php 
        } 
        ?>
        
        
    </div>
    
    
    
    
    
    
</body>
</html>
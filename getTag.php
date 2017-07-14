<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <h1>인스타 데이터</h1>
    <div id="instaPics"></div>  
    
    
<div id="sb_instagram" class="sbi sbi_col_6" style="width:100%; padding-bottom: 10px;"
    data-id="5724646239" data-num="12" data-res="high" data-cols="6"
    data-options='{&quot;sortby&quot;: &quot;none&quot;, &quot;headercolor&quot;: &quot;&quot;, &quot;imagepadding&quot;: &quot;5&quot;}'>
    <div class="sb_instagram_header" style="padding: 10px; padding-bottom: 0; display: none"></div>
    <div id="sbi_images" style="padding: 5px;"><div class="sbi_loader fa-spin"></div></div>
    <div id="sbi_load"></div>
</div>


<script type="text/javascript">
    var sb_instagram_js_options = {"sb_instagram_at":"5724646239.9d9122e.a5ae1cff90fa492e8e8c19369f1583b9"};
</script>
<script src='sb-insta.js'></script>

    

<script type="text/javascript">


    var tag= "제주도";
    var count=10;
    var token= "5724646239.9d9122e.a5ae1cff90fa492e8e8c19369f1583b9";
    
    //내 게시글
    // var url= "https://api.instagram.com/v1/users/self/media/recent/?access_token=" + token + "&count=" + count;
    
    //서치
    // var url= "https://api.instagram.com/v1/tags/search?q=snowy&access_token="+token;
    var url= "https://www.instagram.com/explore/tags/$tag/?__a=1";
    
    // var url= "https://api.instagram.com/v1/tags/"+tag+"?code="+token;
    
    /*$.ajax({
        type: 'get',
        dataType: "jsonp",  
        cache: false,
        url: url,
        success: function(resp){
            console.log(resp);
        }
    });*/


</script>

  </body>
</html>
<!---->

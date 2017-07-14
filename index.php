<?php
getAccessToken($_GET['code']);


function getAccessToken($c){
    if($c) {
        $code = $c;
        $url = "https://api.instagram.com/oauth/access_token";
        $access_token_parameters = array(
                'client_id'     =>     '9d9122ef3e5f4f4dba853e67ea9c4a99',
                'client_secret' =>     'a8dc875158ce432fb2ae8c975ed641a1',
                'grant_type'    =>     'authorization_code',
                'redirect_uri'  =>     'https://php-study-seongh78.c9users.io/',
                'code'          =>     $code
        );
        
        // print_r($access_token_parameters);
        
        $curl = curl_init($url);    // we init curl by passing the url
        curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
        curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
        $result = curl_exec($curl);   // to perform the curl session
        curl_close($curl);   // to close the curl session
    
        $arr = json_decode($result,true);
        echo "access_Token: ".$arr['access_token']; // display the access_token
        echo "<br>";   
        echo "user_name : ".$arr['user']['username'];   // display the username
    }
}


// function curl_get($sUrl){
//     $aCURLOPTs = array(
//             CURLOPT_URL => $sUrl,
//             CURLOPT_HEADER => 0, //결과 값에 통신 header 출력 여부
//             CURLOPT_FRESH_CONNECT => 1, //연결 방식 (연결 시 cache 있을 시 사용 한다면 - 0 , 아니면(새로연결)- 1)
//             CURLOPT_RETURNTRANSFER => 1, //return 된 결과물에 따른 처리방식(ex: 1-변수저장, 0-출력)
//             CURLOPT_SSL_VERIFYPEER => 0 //https 사용 여부
//     );
//     $hResURL = curl_init();
//     curl_setopt_array($hResURL, ($aCURLOPTs));
//     try {
//         $response = curl_exec($hResURL);
//     } catch (exception $e) {
//         error_log(print_r($e,true));
//     }
//     curl_close ($hResURL);
//     return $response;
// }



?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <h1>insta p</h1>
    <div id="instaPics"></div> 
    
    
    
<script type="text/javascript">


    var tag= "제주도";
    var count=10;
    var token= "5724646239.9d9122e.a5ae1cff90fa492e8e8c19369f1583b9";
    
    //내 게시글
    // var url= "https://api.instagram.com/v1/users/self/media/recent/?access_token=" + token + "&count=" + count;
    
    //서치
    var url= "https://api.instagram.com/v1/tags/search?q=snowy&access_token="+token;
    
    // var url= "https://api.instagram.com/v1/tags/"+tag+"?code="+token;
    
    $.ajax({
        type: 'get',
        dataType: "jsonp",  
        cache: false,
        url: url,
        success: function(resp){
            console.log(resp);
        }
    });


</script>

  </body>
</html>

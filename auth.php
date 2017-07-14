<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <h1>인스타인증페이지</h1>
    
    <button id="OauthClick" type="button" name="button">Access</button>

    <script type="text/javascript">
    $("#OauthClick").click(function() {
      // window.open('https://api.instagram.com/oauth/authorize/?client_id=9d9122ef3e5f4f4dba853e67ea9c4a99&redirect_uri=https://php-study-seongh78.c9users.io/&response_type=code&scope=likes+comments+relationships+basic');
      // window.open('https://api.instagram.com/oauth/authorize/?client_id=9d9122ef3e5f4f4dba853e67ea9c4a99&redirect_uri=https://php-study-seongh78.c9users.io/&response_type=code');
      document.location.href=('https://api.instagram.com/oauth/authorize/?client_id=9d9122ef3e5f4f4dba853e67ea9c4a99&redirect_uri=https://php-study-seongh78.c9users.io/&response_type=code&scope=basic+likes+comments+relationships');
    });
    </script>

  </body>
</html>
<!---->

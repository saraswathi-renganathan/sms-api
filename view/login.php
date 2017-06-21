<?php 
  include_once '../admin/controller/common_functions.php';
  login_page_session_check();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <script src="../js/jquery-2.2.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
  <script src="../js/login.js"></script>
  <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=58019786"></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88660059-2', 'auto');
      ga('send', 'pageview');

    </script>

</head>
<body>
  <div id="login-button">
    <img src="../img/login-w-icon.png">
    </img>
  </div>
  <div id="container">
    <h1>Log In</h1>
    <span class="close-btn">
      <img src="../img/circle_close_delete_-128.png"></img>
    </span>

    <form action="../controller/login_controller.php" method="post">
    <?php 
        if(isset($_GET['type'])){
          if($_GET['type'] == "login_error"){
            echo '<p style="color: whitesmoke;text-align: center;font-family: monospace;">Login Failed!</p>';
         }
       } 
       ?>
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Log in">
    </form>
  </div>


</body>
</html>